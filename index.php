<?php

ini_set('display_errors', 0);
ini_set('display_startup_erros', 0);
error_reporting(E_ALL);

include 'conexao.php';


$atualizar = isset($_POST['teste']) ? $_POST['teste'] : 'nada';

if ($atualizar == '1') {

    $serie = $_POST['serie'];
    $capitulo = $_POST['capitulo'];
    $nome = $_POST['nome'];
    $assunto = $_POST['assunto'];
    $listar = $_POST['listar'];
    $listarCap = $_POST['listarCap'];

    $recebendo_cadastro_livro = "INSERT INTO conteudos_livros
        VALUES(null, '$serie','$capitulo','$nome', '$assunto', '0')";
    $query_cadastro_livro = mysqli_query($conn, $recebendo_cadastro_livro);

    header('location: index.php?listar=' . $listar . '&listarCap=' . $listarCap);
}

if ($atualizar == '2') {

    $id = $_POST['id'];
    $serie = $_POST['serie'];
    $capitulo = $_POST['capitulo'];
    $nome = $_POST['nome'];
    $assunto = $_POST['assunto'];
    $listar = $_POST['listar'];
    $listarCap = $_POST['listarCap'];

    $recebendoLivro = "UPDATE conteudos_livros 

                        SET 
                        serie = '$serie',
                        capitulo = '$capitulo',
                        nome = '$nome',
                        assunto = '$assunto'

                        WHERE id= '$id'";

    $queryLivro = mysqli_query($conn, $recebendoLivro);

    header("location: index.php?listar=" . $listar . '&listarCap=' . $listarCap);
}

if ($atualizar == '3') {

    $idproposta = $_POST['id'];
    $listar = $_POST['listar'];
    $listarCap = $_POST['listarCap'];

    $deletardellLivro = "DELETE FROM conteudos_livros

                    WHERE id= '$idproposta'";

    $querydellLivro = mysqli_query($conn, $deletardellLivro);

    header("location: index.php?listar=" . $listar . '&listarCap=' . $listarCap);
}

if ($atualizar == '4') {

    $id = $_POST['id'];
    $chekin = $_POST['chekin'];
    $listar = $_POST['listar'];
    $listarCap = $_POST['listarCap'];

    $recebendoLivro = "UPDATE conteudos_livros 

                        SET 
                        chekin = '$chekin'

                        WHERE id= '$id'";

    $queryLivro = mysqli_query($conn, $recebendoLivro);

    header("location: index.php?listar=" . $listar . '&listarCap=' . $listarCap);
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>Livros</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- table -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="http://app.ufac.br/cap/Admin2023/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <script>
        function redirectPage(v) {
            document.location.href = 'index.php?listar=' + v;
        }
    </script>

</head>

<body>

    <div class="container mt-3">

        <div class="text-right">
            <!-- Button to Open the Modal -->
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Novo Cadastro
            </a>
        </div>
        <hr>

        <select class="form-control selectpicker" name="part" data-live-search="true" onChange="redirectPage(this.value)">
            <option value="Select Part">Selecione Turma</option>
            <?php

            $olhandocap = "SELECT DISTINCT serie
                                        FROM conteudos_livros
                                        GROUP BY serie
                                        ORDER BY serie asc
                                        ";
            $query_cap = mysqli_query($conn, $olhandocap);

            while ($listacaps = mysqli_fetch_array($query_cap)) { ?>

                <option value="<?php echo $listacaps['serie']; ?>" data-tokens="<?php echo $listacaps['serie']; ?>"><?php echo "  Turma: " . $listacaps['serie'];  ?></option>

            <?php } ?>

        </select>

        <hr>

        <?php

        // recebendo seleções 

        $selecao = isset($_GET['listar']) ? $_GET['listar'] : '10';
        $selecao_cap = isset($_GET['listarCap']) ? $_GET['listarCap'] : '1';

        ?>

        <div class="row">

            <div class="col">
                <h3><?php echo "Turma:<b> " . $selecao . "</b><br> "; ?></h3>
            </div>

            <div class="col">
                <div class="btn-group">
                    <b class="mr-2">Capítulos: </b>
                    <?php

                    $query_sepa = " SELECT DISTINCT capitulo
                        FROM conteudos_livros
                        WHERE serie = '$selecao' 
                        GROUP BY capitulo
                         ";

                    $buscar_cadastros_sepa = mysqli_query($conn, $query_sepa);

                    while ($retorno_cadastros_sepa = mysqli_fetch_array($buscar_cadastros_sepa)) {

                        $capitulos_listagem = $retorno_cadastros_sepa['capitulo'];
                    ?>

                        <a href="index.php?listar=<?php echo $selecao; ?>&listarCap=<?php echo $capitulos_listagem; ?>" class="btn <?php if ($capitulos_listagem == $selecao_cap) {
                                                                                                                                        echo "btn-dark";
                                                                                                                                    } else {
                                                                                                                                        echo "btn-info";
                                                                                                                                    } ?> text-white">
                            <?php echo $retorno_cadastros_sepa['capitulo']; ?>
                        </a>

                    <?php   } ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">

                <?php

                $query_listar_nome = " SELECT *
                                FROM conteudos_livros
                                WHERE serie = '$selecao' and capitulo = '$selecao_cap'
                                ";

                $buscar_nome = mysqli_query($conn, $query_listar_nome);

                $retorno_nome = mysqli_fetch_array($buscar_nome);

                echo $retorno_nome['nome']

                ?>

            </div>
        </div>

        <!-- The Modal Novo Cadastro-->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Novo Cadastro</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="index.php" method="POST">
                            <div class="form-group">
                                <label>Turma</label>
                                <select class="form-control " name="serie">
                                    <option value="">Selecione uma turma</option>
                                    <?php

                                    $olhandoevento = "SELECT *
                                        FROM turmas
                                        ORDER BY id asc
                                        ";
                                    $query_evento = mysqli_query($conn, $olhandoevento);

                                    while ($listaeventos = mysqli_fetch_array($query_evento)) { ?>

                                        <option value="<?php echo $listaeventos['turma'] ?>"><?php echo "-> " . $listaeventos['turma']; ?></option>

                                    <?php } ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Capítulo:</label>
                                <select class="form-control " name="capitulo">
                                    <option value="">Selecione um Capítulo</option>
                                    <?php

                                    $olhandocapitulos = "SELECT *
                                        FROM capitulos
                                        ORDER BY id asc
                                        ";
                                    $query_capitulos = mysqli_query($conn, $olhandocapitulos);

                                    while ($listacapituloss = mysqli_fetch_array($query_capitulos)) { ?>

                                        <option value="<?php echo $listacapituloss['id'] ?>"><?php echo "-> " . $listacapituloss['nome']; ?></option>

                                    <?php } ?>

                                </select>

                            </div>
                            <div class="form-group">
                                <label>Nome do Capítulo</label>
                                <input type="text" name="nome" class="form-control ">
                            </div>
                            <div class="form-group">
                                <label>Assunto</label>
                                <input type="text" name="assunto" class="form-control ">
                            </div>

                            <input type="hidden" name="teste" value="1">
                            <input type="hidden" name="listar" value="<?php echo $selecao; ?>">
                            <input type="hidden" name="listarCap" value="<?php echo $selecao_cap; ?>">

                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <br>



        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Assuntos</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody id="myTable">

                <?php

                $query_listar = " SELECT *
                                FROM conteudos_livros
                                WHERE serie = '$selecao' and capitulo = '$selecao_cap'
                                ORDER BY capitulo desc ";

                $buscar_cadastros = mysqli_query($conn, $query_listar);

                while ($retorno_cadastros = mysqli_fetch_array($buscar_cadastros)) {


                ?>

                    <tr>

                        <td><?php echo $retorno_cadastros['assunto']; ?></td>


                        <td>

                            <div class="row">

                                <div class="col">
                                    <form action="index.php" method="post">

                                        <input type="hidden" name="id" value="<?php echo $retorno_cadastros['id']; ?>">
                                        <input type="hidden" name="teste" value="4">
                                        <input type="hidden" name="listar" value="<?php echo $selecao; ?>">
                                        <input type="hidden" name="listarCap" value="<?php echo $selecao_cap; ?>">

                                        <?php if ($retorno_cadastros['chekin'] == '0') { ?>
                                            <input type="hidden" name="chekin" value="1">
                                            <button type="submit" class="btn btn-danger btn-sm"><i class='fas fa-thumbs-down'></i></button>
                                        <?php } else { ?>
                                            <input type="hidden" name="chekin" value="0">
                                            <button type="submit" class="btn btn-success btn-sm"><i class='fas fa-thumbs-up'></i></button>
                                        <?php } ?>



                                    </form>
                                </div>


                                <div class="col">
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#n<?php echo $retorno_cadastros['id']; ?>">
                                        <i class='fas fa-edit'></i>
                                    </button>
                                </div>


                                <div class="col">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dup<?php echo $retorno_cadastros['id']; ?>">
                                        2x
                                    </button>
                                </div>


                                <div class="col">
                                    <form action="index.php" method="post">

                                        <input type="hidden" name="id" value="<?php echo $retorno_cadastros['id']; ?>">
                                        <input type="hidden" name="teste" value="3">
                                        <input type="hidden" name="listar" value="<?php echo $selecao; ?>">
                                        <input type="hidden" name="listarCap" value="<?php echo $selecao_cap; ?>">

                                        <button type="submit" class="btn btn-danger btn-sm"><i class='fas fa-trash'></i></button>

                                    </form>
                                </div>
                            </div>

                        </td>

                    </tr>


                    <!-- The Modal Duplicar-->
                    <div class="modal" id="dup<?php echo $retorno_cadastros['id']; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Duplicando cadastros</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">

                                    <form action="index.php" method="post">

                                        <div class="form-group">
                                            <label>Turma</label>
                                            <select class="form-control " name="serie">
                                                <option value="">Selecione uma turma</option>
                                                <?php

                                                $olhandotuma = "SELECT *
                                                                    FROM turmas
                                                                    ORDER BY id asc
                                                                    ";
                                                $query_tuma = mysqli_query($conn, $olhandotuma);

                                                while ($listatumas = mysqli_fetch_array($query_tuma)) { ?>

                                                    <option value="<?php echo $listatumas['turma'] ?>" <?php if (($listatumas['turma']) == ($retorno_cadastros['serie'])) {
                                                                                                            echo "selected";
                                                                                                        } ?>><?php echo "-> " . $listatumas['turma']; ?></option>

                                                <?php } ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Capítulo:</label>
                                            <select class="form-control " name="capitulo">
                                                <option value="">Selecione um Capítulo</option>
                                                <?php

                                                $olhandocapitulos2 = "SELECT *
                                                                        FROM capitulos
                                                                        ORDER BY id asc
                                                                        ";
                                                $query_capitulos2 = mysqli_query($conn, $olhandocapitulos2);

                                                while ($listacapitulos2s = mysqli_fetch_array($query_capitulos2)) { ?>

                                                    <option value="<?php echo $listacapitulos2s['id'] ?>" <?php if (($listacapitulos2s['id']) == ($retorno_cadastros['capitulo'])) {
                                                                                                                echo "selected";
                                                                                                            } ?>><?php echo "-> " . $listacapitulos2s['nome']; ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label>Nome do Capítulo</label>
                                            <input type="text" name="nome" class="form-control " value="<?php echo $retorno_cadastros['nome'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Assunto</label>
                                            <input type="text" name="assunto" class="form-control " value="<?php echo $retorno_cadastros['assunto'] ?>">
                                        </div>


                                        <input type="hidden" name="teste" value="1">
                                        <input type="hidden" name="listar" value="<?php echo $selecao; ?>">
                                        <input type="hidden" name="listarCap" value="<?php echo $selecao_cap; ?>">

                                        <input type="submit" value="DUPLICAR" class="btn btn-warning">

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>


                    <!-- The Modal Editar-->
                    <div class="modal" id="n<?php echo $retorno_cadastros['id']; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Editando Usuários</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">

                                    <form action="index.php" method="post">

                                        <div class="form-group">
                                            <label>Turma</label>
                                            <select class="form-control " name="serie">
                                                <option value="">Selecione uma turma</option>
                                                <?php

                                                $olhandotuma = "SELECT *
                                                                    FROM turmas
                                                                    ORDER BY id asc
                                                                    ";
                                                $query_tuma = mysqli_query($conn, $olhandotuma);

                                                while ($listatumas = mysqli_fetch_array($query_tuma)) { ?>

                                                    <option value="<?php echo $listatumas['turma'] ?>" <?php if (($listatumas['turma']) == ($retorno_cadastros['serie'])) {
                                                                                                            echo "selected";
                                                                                                        } ?>><?php echo "-> " . $listatumas['turma']; ?></option>

                                                <?php } ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Capítulo:</label>
                                            <select class="form-control " name="capitulo">
                                                <option value="">Selecione um Capítulo</option>
                                                <?php

                                                $olhandocapitulos2 = "SELECT *
                                                                        FROM capitulos
                                                                        ORDER BY id asc
                                                                        ";
                                                $query_capitulos2 = mysqli_query($conn, $olhandocapitulos2);

                                                while ($listacapitulos2s = mysqli_fetch_array($query_capitulos2)) { ?>

                                                    <option value="<?php echo $listacapitulos2s['id'] ?>" <?php if (($listacapitulos2s['id']) == ($retorno_cadastros['capitulo'])) {
                                                                                                                echo "selected";
                                                                                                            } ?>><?php echo "-> " . $listacapitulos2s['nome']; ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label>Nome do Capítulo</label>
                                            <input type="text" name="nome" class="form-control " value="<?php echo $retorno_cadastros['nome'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Assunto</label>
                                            <input type="text" name="assunto" class="form-control " value="<?php echo $retorno_cadastros['assunto'] ?>">
                                        </div>


                                        <input type="hidden" name="id" value="<?php echo $retorno_cadastros['id']; ?>">

                                        <input type="hidden" name="teste" value="2">
                                        <input type="hidden" name="listar" value="<?php echo $selecao; ?>">
                                        <input type="hidden" name="listarCap" value="<?php echo $selecao_cap; ?>">

                                        <input type="submit" value="EDITAR" class="btn btn-warning">

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>

                <?php } ?>

            </tbody>
        </table>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>


        <script>
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    lengthChange: false,
                    iDisplayLength: 50,
                });
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
        <script>
            $(function() {
                $('.selectpicker').selectpicker();
            });
        </script>


    </div>

</body>

</html>