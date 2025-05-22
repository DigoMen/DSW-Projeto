<?php

include_once "conexao.php";
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Verifica se é OPTIONS (pré-flight do CORS)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Só continua se for POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método não permitido']);
    exit;
}

// Simular dados se não estiver recebendo (para teste)
if (empty($_POST)) {
    $_POST = json_decode(file_get_contents('php://input'), true) ?? [];
}



// Restante do seu código de cadastro...
// ... [mantenha o código de validação e inserção que você já tinha]


if($_SERVER['REQUEST_METHOD']=='POST') {
    $nome=$_POST['nome'];
    $sobrenome=$_POST['sobrenome'];
    $email=$_POST['email'];
    $senha=trim($_POST['senha']);
    //criptografando a senha
    $hash = trim(password_hash($senha, PASSWORD_DEFAULT));

    $insert=$con->prepare('INSERT INTO usuarios (nome,sobrenome,email, senha) VALUES (:nome, :sobrenome, :email, :senha)');
    $insert->bindParam('nome',$nome);
    $insert->bindParam('sobrenome',$sobrenome);
    $insert->bindParam('email',$email);
    $insert->bindParam('senha',$hash);

    //executar o insert
    if($insert->execute()){
        header('location:index.html');
    }
    else {
        header('location:index.html');
    }
}
?>