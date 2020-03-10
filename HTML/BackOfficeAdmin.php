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

<body onload="LoadTecnicoTable(); GetTecnicos(); GetConteudo(); OnLoad(); CreateAccount(); ChangeGeralPassword();">
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
                        <h5 id="InfoAlert" class="m-0">
                            </p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-4 mb-4">BackOffice Admin</h1>
            </div>

            <div class="col-12 col-md-6 mb-4">
                <div class="color">
                    <form action="../Handlers/BackOfficeAdminHandlers.php?action=AddContent" method="post" enctype="multipart/form-data">
                        <h3>Adicionar Conteúdo</h3>
                        <div class="row">
                            <div class="col">
                                <p>Titulo</p>
                            </div>
                            <div class="col"> <input type="text" name="Titulo" id="Titulo" placeholder="Titulo" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>Descricao</p>
                            </div>
                            <div class="col"><input type="text" name="Descricao" id="Descricao" placeholder="Descricao" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>Escolha o tipo de operadora</p>
                            </div>
                            <div class="col">
                                <select id="TypeContent" name="TypeContent" required>
                                    <option value="0">MEO</option>
                                    <option value="1">Vodafone</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">

                                <input type="file" name="InputFile[]" id="InputFile" class="inputfile" multiple="multiple" required>
                                <label for="InputFile">Choose a file</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Enviar" name="submit" onclick="AddContent();">
                            </div>
                        </div>



                    </form>
                </div>

            </div>


            <div class="col-12 col-md-6 mb-4">
                <div class="color">
                    <form id="CreateAccountForm">
                        <h3> Adicionar conta de um Técnico </h3>

                        <div class="row">
                            <div class="col">
                                <p> Nome </p>
                            </div>
                            <div class="col">
                                <input type="text" id="NomeTecnico" placeholder="Nome" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p> Email </p>
                            </div>
                            <div class="col">
                                <input type="email" id="EmailTecnico" placeholder="Email" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p> Password </p>
                            </div>
                            <div class="col">
                                <input type="password" id="PasswordTecnico" placeholder="Password" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <button type="submit">Criar Conta</button>
                            </div>
                        </div>


                    </form>
                </div>

            </div>


            <div class="col-12 col-lg-6 mb-4">
                <div class="color">
                    <form id="ChangeGeralPasswordForm">
                        <h3> Alterar passe Geral </h3>

                        <div class="row">
                            <div class="col">
                                <p>Nova Password</p>
                            </div>
                            <div class="col">
                                <input type="password" id="PasswordGeral" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit">Alterar Password</button>
                            </div>
                        </div>



                    </form>
                </div>

            </div>


            <div class="col-12 col-lg-6 mb-4">
                <div class="color">
                    <h3> Adicionar Conteúdo Excell </h3>

                    <a href='../Files/FibraOticaExcell.xlsx' target="_blank">Download</a>

                    <input type="file" id="files" class="inputfile" name="files" accept=".xlsx, .xls, .csv" />
                    <label for="files">Choose a file</label>
                </div>

            </div>

            <div class="col-12 mb-4">
                <h3> Editar Apagar Técnicos </h3>

                <div class="row">
                    <div class="col-12">
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


            <div class="col-12 mb-4">
                <h3> Editar Apagar Conteúdo </h3>

                <div class="row">
                    <div class="col-12">
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading">
                                <h3 class="panel-title">Conteúdo</h3>
                                <div class="pull-right">
                                    <button class="btn btn-light btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr class="filters">
                                        <th><input type="text" class="form-control" placeholder="Titulo" disabled></th>
                                        <th><input type="text" class="form-control" placeholder="Descrição" disabled></th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyConteudos">

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>


                <!-- The Modal -->
                <div class="modal fade" id="EditConteudo">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 id="TituloConteudo" class="modal-title"></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <label class="m-0">Titulo</label>
                                <input class="w-100 mb-4" type="text" id="EditTituloConteudo" placeholder="Titulo...">
                                <br>
                                <label class="m-0">Descrição</label>
                                <input class="w-100" type="text" id="EditDescricaoConteudo" placeholder="Descrição...">
                            </div>

                            <div>
                                <div id="EditImgDiv" class="overflow-auto" style="display: -webkit-box;">

                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer d-block">
                                <form action="../Handlers/BackOfficeAdminHandlers.php?action=AddImgs" method="post" enctype="multipart/form-data">
                                    <input type="file" name="InputFile[]" id="InputFile" multiple="multiple" required>
                                    <input type="hidden" name="Id" id="idHidden">
                                    <input type="submit" value="Confirmar" name="submit">
                                </form>
                                <div class="d-flex mt-3">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="EditConteudo();">Editar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
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