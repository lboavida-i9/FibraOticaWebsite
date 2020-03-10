function CreateAccount() {
    $('#CreateAccountForm').on('submit', function (e) {
        e.preventDefault();

        $("#Loader").show();
        $.post('../Handlers/BackOfficeAdminHandlers.php?action=CreateAccount', { 'EmailTecnico': $("#EmailTecnico").val(), 'PasswordTecnico': $("#PasswordTecnico").val(), 'NomeTecnico': $("#NomeTecnico").val() }, function (response) {

            $("#InfoAlert").html(response);
            $("#InfoAlertDiv").modal('show');

            $("#EmailTecnico").val("");
            $("#PasswordTecnico").val("");

            $("#Loader").hide();

            $("#tbodyTecnicos").empty();
            GetTecnicos();
        });
    });
}

function ChangeGeralPassword() {
    $('#ChangeGeralPasswordForm').on('submit', function (e) {
        e.preventDefault();

        $("#Loader").show();
        $.post('../Handlers/BackOfficeAdminHandlers.php?action=ChangeGeralPassword', { 'PasswordGeral': $("#PasswordGeral").val() }, function (response) {

            $("#InfoAlert").html(response);
            $("#InfoAlertDiv").modal('show');

            $("#Loader").hide();
        });
    });
}

function AddContent() {
    var TituloLength = $("#Titulo").val().length;
    var DescricaoLength = $("#Descricao").val().length;
    var InputFileLenght = $("#InputFile").get(0).files.length;

    if (TituloLength > 0 && DescricaoLength > 0 && InputFileLenght > 0) {
        $("#Loader").show();
    }
}

function GetTecnicos() {
    $("#Loader").show();
    $.post('../Handlers/BackOfficeAdminHandlers.php?action=GetTecnicos', function (response) {
        JSON.parse(response).forEach(element => {
            $("#tbodyTecnicos").append(
                "<tr>" +
                "<td id='NomeTecnico_" + element.id + "'> " + element.Nome + " </td>" +
                "<td id='EmailTecnico_" + element.id + "'> " + element.email + " </td>" +
                "<td id='ButtonsTecnico_" + element.id + "'> <button data-toggle='modal' data-target='#EditTecnico' onclick='GetCurrentTecnico(" + element.id + ", \"" + element.Nome + "\", \"" + element.email + "\");'>Edit</button> <button onclick='DeleteTecnico(" + element.id + ");'>Del</button> </td>" +
                "</tr>"
            );
            $("#Loader").hide();
        });
    });
}

function GetConteudo() {
    $("#Loader").show();
    $.post('../Handlers/BackOfficeAdminHandlers.php?action=GetConteudo', function (response) {
        JSON.parse(response).forEach(element => {
            $("#tbodyConteudos").append(
                "<tr>" +
                "<td id='TituloConteudo_" + element.id + "'> " + element.nome + " </td>" +
                "<td id='DescricaoConteudo_" + element.id + "'> " + element.descricao + " </td>" +
                "<td id='ButtonsConteudo_" + element.id + "'> <button data-toggle='modal' data-target='#EditConteudo' onclick='GetCurrentConteudo(" + element.id + ", \"" + element.nome + "\", \"" + element.descricao + "\");'>Edit</button> <button onclick='DeleteConteudo(" + element.id + ");'>Del</button> </td>" +
                "</tr>"
            );
            $("#Loader").hide();
        });
    });
}

function LoadTecnicoTable() {
    $(document).ready(function () {
        $('.filterable .btn-filter').click(function () {
            var $panel = $(this).parents('.filterable'),
                $filters = $panel.find('.filters input'),
                $tbody = $panel.find('.table tbody');
            if ($filters.prop('disabled') == true) {
                $filters.prop('disabled', false);
                $filters.first().focus();
            } else {
                $filters.val('').prop('disabled', true);
                $tbody.find('.no-result').remove();
                $tbody.find('tr').show();
            }
        });

        $('.filterable .filters input').keyup(function (e) {
            /* Ignore tab key */
            var code = e.keyCode || e.which;
            if (code == '9') return;
            /* Useful DOM data and selectors */
            var $input = $(this),
                inputContent = $input.val().toLowerCase(),
                $panel = $input.parents('.filterable'),
                column = $panel.find('.filters th').index($input.parents('th')),
                $table = $panel.find('.table'),
                $rows = $table.find('tbody tr');
            /* Dirtiest filter function ever ;) */
            var $filteredRows = $rows.filter(function () {
                var value = $(this).find('td').eq(column).text().toLowerCase();
                return value.indexOf(inputContent) === -1;
            });
            /* Clean previous no-result if exist */
            $table.find('tbody .no-result').remove();
            /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
            $rows.show();
            $filteredRows.hide();
            /* Prepend no-result row if all rows are filtered */
            if ($filteredRows.length === $rows.length) {
                $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' + $table.find('.filters th').length + '">No result found</td></tr>'));
            }
        });
    });
}

var CurrentEditingTecnico = -1;
function GetCurrentTecnico(id, Nome, Email) {
    CurrentEditingTecnico = id;
    $("#NomeTecnico").html("Edite o Técnico " + Nome + ":");
    $("#EditNomeTecnico").val(Nome);
    $("#EditEmailTecnico").val(Email);
}

var CurrentEditingConteudo = -1;
function GetCurrentConteudo(id, Nome, Descricao) {
    $("#EditImgDiv").empty();

    CurrentEditingConteudo = id;
    $("#idHidden").val(CurrentEditingConteudo);    
    $("#TituloConteudo").html("Edite o Conteudo:");
    $("#EditTituloConteudo").val(Nome);
    $("#EditDescricaoConteudo").val(Descricao);

    $.post('../Handlers/BackOfficeAdminHandlers.php?action=GetConteudoFiles', { 'id': CurrentEditingConteudo }, function (response) {
        JSON.parse(response).forEach(e => {

            switch (WichType(e.nomedoficheiro)) {
                case TypeExtensionEnum.jpg:
                    $("#EditImgDiv").prepend("<div class='position-relative background-color-div'> <img src='../Files/FilesSended/" + e.nomedoficheiro + "' class='img-slider'> <button class='top-right-0' onclick='DeleteImg(" + CurrentEditingConteudo + ", \"" +  e.nomedoficheiro + "\")'> X </button> </div>");
                    break;
                case TypeExtensionEnum.png:
                    $("#EditImgDiv").prepend("<div class='position-relative background-color-div'> <img src='../Files/FilesSended/" + e.nomedoficheiro + "' class='img-slider'> <button class='top-right-0' onclick='DeleteImg(" + CurrentEditingConteudo + ", \"" +  e.nomedoficheiro + "\")'> X </button> </div>");
                    break;
                case TypeExtensionEnum.gif:
                    $("#EditImgDiv").prepend("<div class='position-relative background-color-div'> <img src='../Files/FilesSended/" + e.nomedoficheiro + "' class='img-slider'> <button class='top-right-0' onclick='DeleteImg(" + CurrentEditingConteudo + ", \"" +  e.nomedoficheiro + "\")'> X </button> </div>");
                    break;
                case TypeExtensionEnum.pdf:
                    $("#EditImgDiv").append("<a href='../Files/FilesSended/" + e.nomedoficheiro + "'>Link para o pdf</a>");
                    break;
                case TypeExtensionEnum.mp4:
                    $("#EditImgDiv").prepend("<div class='position-relative background-color-div'> <video class='img-slider' controls><source src='../Files/FilesSended/" + e.nomedoficheiro + "' type='video/mp4'></video> <button class='top-right-0' onclick='DeleteImg(" + CurrentEditingConteudo + ", \"" +  e.nomedoficheiro + "\")'> X </button> </div>");                    
                    break;
                case TypeExtensionEnum.xlsx:
                    $("#EditImgDiv").append("<a href='../Files/FilesSended/" + e.nomedoficheiro + "'>Link para o Excell</a>");
                    break;
                default:
                    $("#EditImgDiv").append("<a href='../Files/FilesSended/" + e.nomedoficheiro + "'>Link para o Ficheiro</a>");
            }            
        });
    });
}

function WichType(ContentName) {
    return ContentName.substr((ContentName.lastIndexOf('.') + 1));
}

function DeleteImg(id, fileName) {
    $.post('../Handlers/BackOfficeAdminHandlers.php?action=DeleteImgFromEvent&id=' + id + '&file=' + fileName, function (response) {
      location.reload();
    });
}

function EditTecnico() {
    $("#Loader").show();
    $.post('../Handlers/BackOfficeAdminHandlers.php?action=EditTecnico', { 'IdTecnico': CurrentEditingTecnico, 'NomeTecnico': $("#EditNomeTecnico").val(), 'EmailTecnico': $("#EditEmailTecnico").val() }, function (response) {

        $("#InfoAlert").html(response);
        $("#InfoAlertDiv").modal('show');

        $("#Loader").hide();

        $("#tbodyTecnicos").empty();
        GetTecnicos();
    });
}

function EditConteudo() {
    $("#Loader").show();
    $.post('../Handlers/BackOfficeAdminHandlers.php?action=EditConteudo', { 'IdConteudo': CurrentEditingConteudo, 'TituloConteudo': $("#EditTituloConteudo").val(), 'DescricaoConteudo': $("#EditDescricaoConteudo").val() }, function (response) {

        $("#InfoAlert").html(response);
        $("#InfoAlertDiv").modal('show');

        $("#Loader").hide();

        $("#tbodyConteudos").empty();
        GetConteudo();
    });
}

function DeleteTecnico(id) {
    $("#Loader").show();
    $.post('../Handlers/BackOfficeAdminHandlers.php?action=DeleteTecnico', { 'IdTecnico': id }, function (response) {

        $("#InfoAlert").html(response);
        $("#InfoAlertDiv").modal('show');

        $("#Loader").hide();

        $("#tbodyTecnicos").empty();
        GetTecnicos();
    });
}

function DeleteConteudo(id) {
    $("#Loader").show();
    $.post('../Handlers/BackOfficeAdminHandlers.php?action=DeleteConteudo', { 'IdConteudo': id }, function (response) {

        $("#InfoAlert").html(response);
        $("#InfoAlertDiv").modal('show');

        $("#Loader").hide();

        $("#tbodyConteudos").empty();
        GetConteudo();
    });
}

// Excell Reader
function OnLoad() {
    $(document).ready(function () {
        $('#files').change(handleFile);
    });
}

function handleFile(e) {
    //Get the files from Upload control
    var files = e.target.files;
    var i, f;
    //Loop through files
    for (i = 0, f = files[i]; i != files.length; ++i) {
        var reader = new FileReader();
        var name = f.name;
        reader.onload = function (e) {
            var data = e.target.result;

            var result;
            var workbook = XLSX.read(data, { type: 'binary' });

            var sheet_name_list = workbook.SheetNames;
            sheet_name_list.forEach(function (y) { /* iterate through sheets */
                //Convert the cell value to Json
                var roa = XLSX.utils.sheet_to_json(workbook.Sheets[y]);
                if (roa.length > 0) {
                    result = roa;
                }
            });
            //Get the first column first cell value
            $("#Loader").show();
            $.post('../Handlers/BackOfficeAdminHandlers.php?action=ReadExcell', { 'result': result }, function (response) {

                $("#InfoAlert").html(response);
                $("#InfoAlertDiv").modal('show');

                $("#Loader").hide();
            });
        };
        reader.readAsArrayBuffer(f);
    }
}

var TypeExtensionEnum = {
    jpg: "jpg",
    png: "png",
    gif: "gif",
    pdf: "pdf",
    mp4: "mp4",
    xlsx: "xlsx"
};