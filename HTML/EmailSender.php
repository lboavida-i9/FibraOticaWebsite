<html>
    <head>
        <script src="https://smtpjs.com/v3/smtp.js"></script>   
        <?php
            include_once "Content/_header.html";
        ?>
    </head>
    <body>
        <script>
            Email.send({
                Host : "smtp.gmail.com",
                Port : "587",
                EnableSsl : true,
                Username : "sadasdasdasdasdnn@gmail.com",
                Password : "Miguel9177",
                To : 'luis.128.b@gmail.com',
                From : "luis2.128.b80@gmail.com",
                Subject : "This is the subject",
                Body : "And this is the body"
            }).then(
                message => alert(message)
            );
            
        </script>
        <?php
            include_once "Content/_scripts.html";
        ?>
    </body>
</html>