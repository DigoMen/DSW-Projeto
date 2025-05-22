<?php
    //criar arquivo de conexão com o banco de dados
    //PDO - PHP Data Object - trabalhar com BD.
    // variáveis: host, banco, usuário, senha
    $host="localhost";
    $db="usuarios";
    $user="root";
    $password="";

    try 
    {
        $con = new PDO("mysql:host=$host;dbname=$db",$user,$password);
        echo ("Conexão ok");
    
    }
    /*$conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);*/
    catch(PDOException $e)
    {
        echo "Erro ao conectar: ".$e->getMessage();
    }
?>