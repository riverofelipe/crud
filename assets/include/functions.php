<?php
include_once('config.php');

function pdo()
{
    $bd_host = bd_host;
    $bd_username = bd_username;
    $bd_password = bd_password;
    $bd_base = bd_base;


    try {
        return $pdo = new PDO("mysql:host={$bd_host};dbname={$bd_base}", $bd_username, $bd_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        exit("Erro ao conectar-se ao banco: " . $e->getMessage());
    }
}
function validar()
{
    $pdo = pdo();

    $stmt = $pdo->prepare("INSERT INTO cadastro (nome, email, cpf, telefone, data_nascimento, itvl_doacao, valor_doacao, forma_pagamento, endereco) VALUES (:nome, :email, :cpf, :telefone, :data_nascimento, :itvl_doacao, :valor_doacao, :forma_pagamento, :endereco)");
    $stmt->execute([
        ':nome' => $_POST['nome'],
        ':email' => $_POST['email'],
        ':cpf' => $_POST['cpf'],
        ':telefone' => $_POST['telefone'],
        ':data_nascimento' => $_POST['data_nascimento'],
        ':itvl_doacao' => $_POST['itvl_doacao'],
        ':valor_doacao' => $_POST['valor_doacao'],
        ':forma_pagamento' => $_POST['forma_pagamento'],
        ':endereco' => $_POST['endereco'],
    ]);
    $result = $stmt->rowCount();
    if ($result > 0) {
        echo '<div class="alert alert-success" role="alert">Enviado com Sucesso!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Erro ao Enviar</div>';
        echo '<div class="alert alert-danger" role="alert">' . $stmt->errorInfo() . '</div>';
    }
}
function list_cadastro()
{
    $pdo = pdo();
    $stmt = $pdo->prepare("SELECT * FROM cadastro ORDER BY id DESC");
    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
}
function cadastro($id)
{
    $pdo = pdo();
    $stmt = $pdo->prepare("SELECT * FROM cadastro WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
}
function update_cadastro()
{
    $pdo = pdo();

    $stmt = $pdo->prepare("UPDATE cadastro SET nome = :nome, email = :email, cpf = :cpf, telefone = :telefone, data_nascimento = :data_nascimento, itvl_doacao = :itvl_doacao, valor_doacao = :valor_doacao, forma_pagamento = :forma_pagamento, endereco = :endereco WHERE id = :id");
    $stmt->execute([
        ":id" => $_POST['id'],
        ":nome" => $_POST['nome'],
        ":email" => $_POST['email'],
        ":cpf" => $_POST['cpf'],
        ":telefone" => $_POST['telefone'],
        ":data_nascimento" => $_POST['data_nascimento'],
        ":itvl_doacao" => $_POST['itvl_doacao'],
        ":valor_doacao" => $_POST['valor_doacao'],
        ":forma_pagamento" => $_POST['forma_pagamento'],
        ":endereco" => $_POST['endereco'],
    ]);
    $result = $stmt->rowCount();
    if ($result > 0) {
        echo '<div class="alert alert-success" role="alert">Enviado com Sucesso!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Erro ao Enviar</div>';
        echo '<div class="alert alert-danger" role="alert">' . $stmt->errorInfo() . '</div>';
    }
}
function delete()
{
    $pdo = pdo();
    $stmt = $pdo->prepare("DELETE FROM cadastro WHERE id = :id");
    $stmt->execute([':id' => $_POST['id']]);
    $result = $stmt->rowCount();
    if ($result > 0) {
        echo '<div class="alert alert-success" role="alert">Excluido com Sucesso!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Erro ao Excluir</div>';
        echo '<div class="alert alert-danger" role="alert">' . $stmt->errorInfo() . '</div>';
    }
}
