<?php

class Usuario{
    private $id;
    private $email;
    private $senha;
    private $nivel;
    private $pdo;

    function __construct(){
        $dsn  = "mysql:dbname=login_modular;host = localhost";
        $user = "root";
        $pass = "";

        try {
            $this->pdo = new PDO($dsn,$user,$pass);
          
        } catch (\Throwable $th) {
            echo "<h2>Nao consegui conectar. Tente mais tarde!";
        }
    }


    public function getId(){
        return $this->id;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getNivel(){
        return $this->nivel;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function setNivel($nivel){
        $this->nivel = $nivel;
    }

    public function incluirUsuario($email, $senha,$nivel){
        $sql = "INSERT INTO usuarios SET email = :e, senha = :s, nivel = :n";
        
        $sql = $this->pdo->prepare($sql);
        
        $sql->bindValue(":e", $email);
        $sql->bindValue(":n", $nivel);
        $sql->bindValue(":s", $senha);

        return $sql->execute();

    }
}










