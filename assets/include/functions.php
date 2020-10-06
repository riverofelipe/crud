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
        return 200;
    } else {
        return 400;
        //var_dump( $stmt->errorInfo() );
    }
}
