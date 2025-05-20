<?php
// Configurações do banco de dados
$host = 'localhost'; // ou o endereço do seu servidor de banco de dados
$dbname = 'filmosgrafo'; // nome do banco de dados
$username = 'root'; // usuário do banco de dados
$password = ''; // senha do banco de dados

try {
    // Cria a conexão PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Configura o PDO para lançar exceções em caso de erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Configura para retornar arrays associativos por padrão
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    // Em caso de erro na conexão
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>