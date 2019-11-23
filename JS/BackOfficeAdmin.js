function CreateAccount() {
    $("#Loader").show();
    $.post('../Handlers/BackOfficeAdminHandlers.php?action=CreateAccount', { 'EmailTecnico': $("#EmailTecnico").val(), 'PasswordTecnico': $("#PasswordTecnico").val(), 'NomeTecnico': $("#NomeTecnico").val() }, function (response) {
        alert(response);

        $("#EmailTecnico").val("");
        $("#PasswordTecnico").val("");

        $("#Loader").hide();

        $("#tbodyTecnicos").empty();
        GetTecnicos();
    });
}

function ChangeGeralPassword() {
    $("#Loader").show();
    $.post('../Handlers/BackOfficeAdminHandlers.php?action=ChangeGeralPassword', { 'PasswordGeral': $("#PasswordGeral").val() }, function (response) {
        alert(response);
        $("#Loader").hide();
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
                "<td id='ButtonsTecnico_" + element.id + "'> <button onclick='EditTecnico(" + element.id + ");'>Edit</button> <button onclick='DeleteTecnico(" + element.id + ");'>Del</button> </td>" +
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

function EditTecnico(id) {

}

function DeleteTecnico(id) {
    $("#Loader").show();
    $.post('../Handlers/BackOfficeAdminHandlers.php?action=DeleteTecnico', { 'IdTecnico': id }, function (response) {
        alert(response);

        $("#Loader").hide();

        $("#tbodyTecnicos").empty();
        GetTecnicos();        
    });
}