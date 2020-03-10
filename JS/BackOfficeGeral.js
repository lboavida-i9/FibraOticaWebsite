function GetContent() {
    $("#Loader").show();
    $.post('../Handlers/BackOfficeGeralHandlers.php?action=GetContent', function (response) {
        JSON.parse(response).forEach(element => {
            $("#Content").append(
                "<div id='DivParent_" + element.id + "' class='row'>" +
                "<h1 style='width: 100%;'>" + element.nome + "</h1>" +
                "</div>"
            );

            element.Conteudo.forEach(nomedoficheiro => {
                var teste = WichType(nomedoficheiro);
                switch (teste) {
                    case TypeExtensionEnum.jpg:
                        $("#DivParent_" + element.id).append("<div class='col-12 col-md-6'> <img style='margin-bottom: 50px; width: 100%;' src='../Files/FilesSended/" + nomedoficheiro + "' alt='" + element.nome + " image'> </div>");
                        break;
                    case TypeExtensionEnum.png:
                        $("#DivParent_" + element.id).append("<div class='col-12 col-md-6'> <img style='margin-bottom: 50px; width: 100%;' src='../Files/FilesSended/" + nomedoficheiro + "' alt='" + element.nome + " image'> </div>");
                        break;
                    case TypeExtensionEnum.gif:
                        $("#DivParent_" + element.id).append("<div class='col-12 col-md-6'> <img style='margin-bottom: 50px; width: 100%;' src='../Files/FilesSended/" + nomedoficheiro + "' alt='" + element.nome + " image'> </div>");
                        break;
                    case TypeExtensionEnum.pdf:
                        $("#DivParent_" + element.id).append("<a href='../Files/FilesSended/" + nomedoficheiro + "'>Link para o pdf</a>");
                        break;
                    case TypeExtensionEnum.mp4:
                        $("#DivParent_" + element.id).append("<video class='col-12 col-md-6' style='margin-bottom: 50px; width: 100%;' controls><source src='../Files/FilesSended/" + nomedoficheiro + "' type='video/mp4'></video>");
                        break;
                    case TypeExtensionEnum.xlsx:
                        $("#DivParent_" + element.id).append("<a class='col-12 col-md-6' style='margin-bottom: 50px; width: 100%;' href='../Files/FilesSended/" + nomedoficheiro + "'>Link para o Excell</a>");
                        break;
                    default:
                        $("#DivParent_" + element.id).append("<a class='col-12 col-md-6' style='margin-bottom: 50px; width: 100%;' href='../Files/FilesSended/" + nomedoficheiro + "'>Link para o Ficheiro</a>");
                }
            });

            $("#DivParent_" + element.id).append("<p class='col-12 col-md-6' style='margin-bottom: 50px; width: 100%;'>" + element.descricao + "</p>");
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