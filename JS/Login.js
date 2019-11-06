function Login() {
    $.post('../Handlers/LoginHandlers.php?action=Login' +
    '&Email=' + $("#EmailTxt").val() +
    '&Password=' + $("#PasswordTxt").val(), function (response) {
        if (response == 'success')
            window.location = '../HTML/BackOffice.php';
        else
            alert(response);
    });
}