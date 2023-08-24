<?php

class Usuario{
    private $nome;
    private $senha;
    private $email;    
    private $pdo;

    public function __construct(){
        $caminho = "mysql:dbname=usuario;host=localhost";
        $usuario = "root";
        $senha   = "";

        try {
            $this->pdo = new PDO($caminho, $usuario, $senha);
        } catch (\Throwable $th) {
            echo "<h2>Banco de dados Indisponivel, tente mais tarde!";
        }
    }

    public function getEmail(){
        return $this->email;
    }

    public function getNome(){
        return $this->nome;
    }
    public function getSenha(){
        return $this->senha;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function insertUser($email, $senha, $nome, $nivel = 1){
        # 1º passo: criar variavel com uma consulta SQL, colocando apelidos para os parametros:
        $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha = :s, level = :l";

        # 2º passo: acessar o metodo prepare passando a consulta criada acima
        $sql = $this->pdo->prepare($sql);

        # 3º passo: Para cada apelido, usar o metodo bindValue para encapsular os parametros:
        $sql->bindValue(":n",$nome);
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",$senha);
        $sql->bindValue(":l",$nivel);

        # 4º passo executar o comando:
        return $sql->execute();    
    }

    function checkUser($email){
        $sql = "SELECT * FROM usuarios where email = :e";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":e" , $email);

        if($sql->rowCount() > 0){
                return $sql->fetch();
        }else{
            return false;
        } 
    }

    function checkUserPass($email, $senha){
       $sql = "SELECT * FROM usuarios where email = :e AND senha = :s";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":e" , $email);
        $sql->bindValue(":s" , $senha);

        if($sql->rowCount() > 0){
                return $sql->fetch();
        }else{
            return false;
        }            
        
    }
}   










