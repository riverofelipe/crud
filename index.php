<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastro</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-3.5.1.min.js"></script>

</head>

<body>

    <div class="container">
        <div class="row justify-content-center" id="form-content">
            <?php
            require_once('assets/include/functions.php');
            if (!empty($_POST)) {
                if (validar() == '200') {
                    echo '<div class="alert alert-success" role="alert">Enviado com Sucesso!</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Erro ao Enviar</div>';
                }
            } else {
            ?>
                <div class="col-5">
                    <div class="card p-2 my-3">
                        <div class="bg-info my-3">
                            <h3 class="text-center text-white py-3">Cadastro de Doação</h3>
                        </div>
                        <form method="POST" id="form_anunciante">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control" name="nome" required>
                            </div>
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>

                            <div class="form-group">
                                <label>CPF</label>
                                <input type="text" class="form-control" name="cpf" required>
                            </div>

                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" class="form-control" name="telefone" required>
                            </div>

                            <div class="form-group">
                                <label>Data de Nascimento</label>
                                <input type="date" class="form-control" name="data_nascimento" required>
                            </div>

                            <div class="form-group">
                                <label>Intevalo de Doação</label>
                                <select class="form-control" name="itvl_doacao" required>
                                    <option value="1" value="único">Único</option>
                                    <option value="2" value="bimestral">Bimestral</option>
                                    <option value="3" value="semestral">Semestral</option>
                                    <option value="3" value="anual">Anual</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Valor da Doação</label>
                                <input type="text" class="form-control" name="valor_doacao" required>
                            </div>

                            <div class="form-group">
                                <label>Forma de Pagamento</label>
                                <select class="form-control" name="forma_pagamento" required>
                                    <option value="1" value="débito">Débito</option>
                                    <option value="2" value="crédito">Crédito</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Endereço</label>
                                <input type="text" class="form-control" name="endereco" required>
                            </div>
                            <button type="submit" class="btn btn-info btn-block">Enviar</button>
                        </form>
                    </div>
                </div>
                <script type="text/javascript">
                    jQuery('#form_anunciante').submit(function(e) {
                        e.preventDefault();
                        jQuery.post('index.php', jQuery(this).serialize())
                            .done(function(data) {
                                jQuery('#form-content').fadeOut('slow', function() {
                                    jQuery('#form-content').fadeIn('slow').html(data);
                                });
                            })
                            .fail(function() {
                                alert('Ajax Submit Failed ...');
                            });
                    });
                </script>
            <?php
            }
            ?>
        </div>
    </div>


</body>

</html>