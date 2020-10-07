<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Ver Cadastro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <?php
        include_once('functions.php');

        foreach (cadastro($_GET['id']) as $dados) {
        ?>
            <div class="form-group">
                <p><strong>Nome</strong>: <?php echo $dados['nome'] ?></p>
            </div>
            <div class="form-group">
                <p><strong>E-mail</strong>: <?php echo $dados['email'] ?></p>
            </div>

            <div class="form-group">
                <p><strong>CPF</strong>: <?php echo $dados['cpf'] ?></p>
            </div>

            <div class="form-group">
                <p><strong>Telefone</strong>: <?php echo $dados['telefone'] ?></p>
            </div>

            <div class="form-group">
                <p><strong>Data de Nascimento</strong>: <?php echo $dados['data_nascimento'] ?></p>
            </div>

            <div class="form-group">
                <p><strong>Intevalo de Doação</strong>: <?php echo $dados['itvl_doacao']; ?></p>
            </div>

            <div class="form-group">
                <p><strong>Valor da Doação</strong>: <?php echo $dados['valor_doacao'] ?></p>
            </div>

            <div class="form-group">
                <p><strong>Forma de Pagamento</strong>: <?php echo $dados['forma_pagamento']; ?></p>
            </div>

            <div class="form-group">
                <p><strong>Endereço</strong>: <?php echo $dados['endereco'] ?></p>
            </div>
            <div class="form-group">
                <p><strong>Data de Cadastro</strong>: <?php echo date('d/m/Y H:i', strtotime($dados['data_cadastro'])) ?></p>
            </div>
        <?php
        }
        ?>
    </div>
</div>