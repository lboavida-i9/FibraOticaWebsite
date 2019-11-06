function GetDocuments() {
    $.post('../Handlers/LoginHandlers.php?action=GetDocuments', function (response) {
        $("#DivDocumentsGetted").html(response);
    });
}