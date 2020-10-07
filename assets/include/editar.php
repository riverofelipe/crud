<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Editar Cadastro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" id="form-content">
        <?php
        include_once('functions.php');
        if (!empty($_POST)) {
            update_cadastro();
        } else {
            foreach (cadastro($_GET['id']) as $dados) {
        ?>
                <form method="POST" id="form_anunciante">
                    <div class="form-group d-none">
                        <input type="text" class="form-control" name="id" value="<?php echo $dados['id'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $dados['nome'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $dados['email'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label>CPF</label>
                        <input type="text" class="form-control" name="cpf" value="<?php echo $dados['cpf'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" class="form-control" name="telefone" value="<?php echo $dados['telefone'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Data de Nascimento</label>
                        <input type="date" class="form-control" name="data_nascimento" value="<?php echo $dados['data_nascimento'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Intevalo de Doação</label>
                        <select class="form-control" name="itvl_doacao" required>
                            <option value="único" <?php echo $dados['itvl_doacao'] == 'único' ? 'selected' : '' ?>>Único</option>
                            <option value="bimestral" <?php echo $dados['itvl_doacao'] == 'bimestral' ? 'selected' : '' ?>>Bimestral</option>
                            <option value="semestral" <?php echo $dados['itvl_doacao'] == 'semestral' ? 'selected' : '' ?>>Semestral</option>
                            <option value="anual" <?php echo $dados['itvl_doacao'] == 'anual' ? 'selected' : '' ?>>Anual</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Valor da Doação</label>
                        <input type="text" class="form-control" name="valor_doacao" value="<?php echo $dados['valor_doacao'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Forma de Pagamento</label>
                        <select class="form-control" name="forma_pagamento" required>
                            <option value="débito" <?php echo $dados['forma_pagamento'] == 'débito' ? 'selected' : '' ?>>Débito</option>
                            <option value="crédito" <?php echo $dados['forma_pagamento'] == 'crédito' ? 'selected' : '' ?>>Crédito</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Endereço</label>
                        <input type="text" class="form-control" name="endereco" value="<?php echo $dados['endereco'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-info btn-block">Enviar</button>
                </form>

                <script type="text/javascript">
                    jQuery('#form_anunciante').submit(function(e) {
                        e.preventDefault();
                        jQuery.post('assets/include/editar.php', jQuery(this).serialize())
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
        }
        ?>
    </div>
</div>