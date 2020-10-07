<?php
$h1 = 'Lista de Cadastro';
include('assets/include/header.php');
?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Data de Cadastro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once('assets/include/functions.php');
                    foreach (list_cadastro() as $dados) {
                    ?>
                        <tr>
                            <th><?php echo $dados['id']; ?></th>
                            <td><?php echo $dados['nome']; ?></td>
                            <td><?php echo $dados['email']; ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($dados['data_cadastro'])); ?></td>
                            <td>
                                <button class="btn btn-primary btn-sm" onclick="$('#modalGeral').load('assets/include/ver-cadastro.php?id=<?php echo $dados['id'] ?>'); return false;" data-toggle="modal" data-target="#modal-geral">
                                    <i class="float-left material-icons">visibility</i>
                                </button>
                                <button class="btn btn-info btn-sm" onclick="$('#modalGeral').load('assets/include/editar.php?id=<?php echo $dados['id'] ?>'); return false;" data-toggle="modal" data-target="#modal-geral">
                                    <i class="float-left material-icons">create</i>
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="$('#modalGeral').load('assets/include/excluir.php?id=<?php echo $dados['id'] ?>'); return false;" data-toggle="modal" data-target="#modal-geral">
                                    <i class="float-left material-icons">delete</i>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-geral">
    <div class="modal-dialog modal-lg" role="document">
        <div id="modalGeral"></div><!-- mostrar conteudo -->
    </div>
</div>
<?php
include('assets/include/footer.php');
?>