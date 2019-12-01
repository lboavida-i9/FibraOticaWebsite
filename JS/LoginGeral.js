function LoadJs() {
    $('form').on('submit', function (e) {
        e.preventDefault();

        $("#Loader").show();
        $.post('../Handlers/LoginGeralHandlers.php?action=Login' +
            '&Password=' + $("#PasswordTxt").val(), function (response) {
                $("#Loader").hide();
                if (response == 'success') {
                    window.location = '../HTML/BackOfficeGeral.php';
                    $("#InfoAlert").html("<strong>Info: </strong> Logado com successo!");
                    $("#InfoAlertDiv").addClass("show");
                    $("#InfoAlertDiv").addClass("hide");
                }
                else {
                    $("#InfoAlert").html("<strong>Info: </strong>" + response);
                    $("#InfoAlertDiv").addClass("show");
                    $("#InfoAlertDiv").addClass("hide");
                }
            });
    });
}