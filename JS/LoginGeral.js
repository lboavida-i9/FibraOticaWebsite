function Login() {
    $("#Loader").show();
    $.post('../Handlers/LoginGeralHandlers.php?action=Login' +
    '&Password=' + $("#PasswordTxt").val(), function (response) {  
        $("#Loader").hide();     
        if (response == 'success')
            window.location = '../HTML/BackOfficeGeral.php';
        else
            alert(response);
    });
}