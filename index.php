<?php
$h1 = 'Cadastro';
include('assets/include/header.php');
?>

<div class="container">
    <div class="row justify-content-center" id="form-content">
        <?php
        require_once('assets/include/functions.php');
        if (!empty($_POST)) {
            validar();
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


<?php
include('assets/include/footer.php');
?>