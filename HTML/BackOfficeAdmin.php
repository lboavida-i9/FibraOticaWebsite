<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include_once "Content/_header.html";
    ?>
    <title>BackOffice Admin</title>
    <link rel="stylesheet" href="../PHP/Style.php/BackOfficeAdmin.scss">
    <script src="../JS/BackOfficeAdmin.js"></script>
</head>

<?php
include_once "../PHP/BackOfficeAdminHelper.php";
?>

<body onload="LoadTecnicoTable(); GetTecnicos();">
    <?php
    include_once "Content/Navbar.html";
    include_once "Content/Loader.html";
    ?>

    <h1>BackOffice Admin</h1>
    <br>

    <form action="../Handlers/BackOfficeAdminHandlers.php?action=AddContent" method="post" enctype="multipart/form-data">
        <h3>Adicionar Conteúdo</h3>

        <p>Titulo</p>
        <input type="text" name="Titulo" id="Titulo" placeholder="Titulo" required>
        <br>

        <p>Descricao</p>
        <input type="text" name="Descricao" id="Descricao" placeholder="Descricao" required>
        <br><br>

        <input type="file" name="InputFile[]" id="InputFile" multiple="multiple" required>
        <br><br>

        <input type="submit" value="Enviar" name="submit" onclick="AddContent();">
    </form>

    <br><br>

    <div>
        <h3> Adicionar conta de um Técnico </h3>

        <p> Nome </p>
        <input type="text" id="NomeTecnico" placeholder="Nome">
        <br>

        <p> Email </p>
        <input type="email" id="EmailTecnico" placeholder="Email">
        <br>

        <p> Password </p>
        <input type="password" id="PasswordTecnico" placeholder="Password">
        <br>

        <button onclick="CreateAccount();">Criar Conta</button>
    </div>
    <br><br>

    <div>
        <h3> Alterar passe Geral </h3>

        <p>Nova Password</p>
        <input type="password" id="PasswordGeral">

        <button onclick="ChangeGeralPassword();">Alterar Password</button>
    </div>





    <div class="container">
        <div class="row">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">Técnicos</h3>
                    <div class="pull-right">
                        <button class="btn btn-light btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th><input type="text" class="form-control" placeholder="Nome" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                        </tr>
                    </thead>
                    <tbody id="tbodyTecnicos">
 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<?php
include_once "Content/_scripts.html";
?>

</html>