function GetContent() {
    $("#Loader").show();
    $.post('../Handlers/BackOfficeGeralHandlers.php?action=GetContent', function (response) {
        JSON.parse(response).forEach(element => {
            element = element[0];
            $("#Content").append(
                "<div id='DivParent_" + element.id + "'>" +
                "<h1>" + element.nome + "</h1>" +
                "</div>"
            );

            element.Conteudo.forEach(e => {
                var teste = WichType(e.nomedoficheiro);
                switch (teste) {
                    case TypeExtensionEnum.jpg:
                        $("#DivParent_" + element.id).append("<img src='../Files/FilesSended/" + e.nomedoficheiro + "' alt='" + element.nome + " image'>");
                        break;
                    case TypeExtensionEnum.png:
                        $("#DivParent_" + element.id).append("<img src='../Files/FilesSended/" + e.nomedoficheiro + "' alt='" + element.nome + " image'>");
                        break;
                    case TypeExtensionEnum.gif:
                        $("#DivParent_" + element.id).append("<img src='../Files/FilesSended/" + e.nomedoficheiro + "' alt='" + element.nome + " image'>");
                        break;
                    case TypeExtensionEnum.pdf:
                        $("#DivParent_" + element.id).append("<a href='../Files/FilesSended/" + e.nomedoficheiro + "'>Link para o pdf</a>");
                        break;
                    case TypeExtensionEnum.mp4:
                        $("#DivParent_" + element.id).append("<video width='400' controls><source src='../Files/FilesSended/" + e.nomedoficheiro + "' type='video/mp4'></video>");
                        break;
                    case TypeExtensionEnum.xlsx:
                        $("#DivParent_" + element.id).append("<a href='../Files/FilesSended/" + e.nomedoficheiro + "'>Link para o Excell</a>");
                        break;
                    default:
                        $("#DivParent_" + element.id).append("<a href='../Files/FilesSended/" + e.nomedoficheiro + "'>Link para o Ficheiro</a>");
                }
            });

            $("#DivParent_" + element.id).append("<p>" + element.descricao + "</p>");
        });
        $("#Loader").hide();
    });
}

function WichType(ContentName) {
    return ContentName.substr((ContentName.lastIndexOf('.') + 1));
}

var TypeExtensionEnum = {
    jpg: "jpg",
    png: "png",
    gif: "gif",
    pdf: "pdf",
    mp4: "mp4",
    xlsx: "xlsx"
};