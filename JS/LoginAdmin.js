function Login() {
    $("#Loader").show();
    $.post('../Handlers/LoginAdminHandlers.php?action=Login' +
    '&Email=' + $("#EmailTxt").val() +
    '&Password=' + $("#PasswordTxt").val(), function (response) {
        $("#Loader").hide();
        if (response == 'success')
            window.location = '../HTML/BackOfficeAdmin.php';
        else
            alert(response);
    });
}