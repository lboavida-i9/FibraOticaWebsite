function Login() {
    $("#Loader").show();
    $.post('../Handlers/LoginTecnicoHandlers.php?action=Login' +
    '&Email=' + $("#EmailTxt").val() +
    '&Password=' + $("#PasswordTxt").val(), function (response) {
        $("#Loader").hide();
        if (response == 'success')
            window.location = '../HTML/BackOfficeTecnico.php';
        else
            alert(response);
    });
}