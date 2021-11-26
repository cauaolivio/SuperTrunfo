<?php
  class Usuario {
    // atributos
    public $nome;
    public $email;
    public $senha;

    // construtor
    function __construct($nome, $email, $senha){
      $this->nome = $nome;
      $this->email = $email;
      $this->senha = $senha;
    }

    // métodos
    function getNome(){
      return $this->nome;
    }

    function setNome($nome){
      $this->nome = $nome;
    }

    function getEmail(){
      return $this->email;
    }

    function setEmail($email){
      $this->nome = $email;
    }

    function getSenha(){
      return $this->senha;
    }

    function setSenha($senha){
      $this->senha = $senha;
    }
  }
?>