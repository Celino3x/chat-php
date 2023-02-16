<?php
    include("connection/connect.php");

    if(isset($_POST["email"]) && isset($_POST["password"])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        if($email == "" || $password == ""){
            die(header("HTTP/1.0 401 Preencha todos os campos do formulário"));
        }

        $stmt = $con->prepare("SELECT id, senha, token, seguro FROM user WHERE (email LIKE ? OR usuario LIKE ?) LIMIT 1"); 
        $stmt->bind_param("ss", $email, $email);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();

        if($user && passord_verify($password, $user["senha"])){
            setcookie("ID", $user["id"], time() + (10* 365 * 24 * 60 * 60));
            setcookie("TOKEN", $user["token"], time() + (10* 365 * 24 * 60 * 60));
            setcookie("SEGURO", $user["seguro"], time() + (10* 365 * 24 * 60 * 60));
            return true;
        } else{
            die(header("HTTP/1.0 401 Senha errada"));
        }
    } else {
        die(header("HTTP/1.0 401 Formulário de Autenticação Inválido"));
    }
?>