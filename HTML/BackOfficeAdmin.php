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

<body onload="LoadTecnicoTable(); GetTecnicos(); OnLoad(); CreateAccount(); ChangeGeralPassword();">
    <?php
    include_once "Content/Navbar.html";
    include_once "Content/Loader.html";
    ?>

    <div class="container height-control">
        <!-- The Modal -->
        <div class="modal fade" id="InfoAlertDiv">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <p class="modal-title">Info:</p>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h5 id="InfoAlert" class="m-0"></p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <h1>BackOffice Admin</h1>
            <br>

            <div class="col-12 mb-4">
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
            </div>

            <form id="CreateAccountForm" class="col-12 mb-4">
                <h3> Adicionar conta de um Técnico </h3>

                <p> Nome </p>
                <input type="text" id="NomeTecnico" placeholder="Nome" required>
                <br>

                <p> Email </p>
                <input type="email" id="EmailTecnico" placeholder="Email" required>
                <br>

                <p> Password </p>
                <input type="password" id="PasswordTecnico" placeholder="Password" required>
                <br>

                <button type="submit">Criar Conta</button>
            </form>

            <div class="col-12 mb-4">
                <h3> Editar Apagar Técnicos </h3>

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

                <!-- The Modal -->
                <div class="modal fade" id="EditTecnico">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 id="NomeTecnico" class="modal-title"></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <label>Nome</label>
                                <input type="text" id="EditNomeTecnico" placeholder="Nome...">
                                <br>
                                <label>Email:</label>
                                <input type="email" id="EditEmailTecnico" placeholder="Email...">
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="EditTecnico();">Editar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <form id="ChangeGeralPasswordForm" class="col-12 mb-4">
                <h3> Alterar passe Geral </h3>

                <p>Nova Password</p>
                <input type="password" id="PasswordGeral" required>

                <button type="submit">Alterar Password</button>
            </form>

            <div class="col-12 mb-4">
                <h3> Adicionar Conteúdo Excell </h3>

                <a href='../Files/FibraOticaExcell.xlsx' target="_blank">Download</a>
                <input type="file" id="files" name="files" accept=".xlsx, .xls, .csv" />
            </div>
        </div>
    </div>
</body>
<?php
include_once "Content/_Footer.html";
?>
<?php
include_once "Content/_scripts.html";
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>

</html>