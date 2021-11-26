<?php
  class Carta {
    // atributos
    public $nome;
    public $imagem;
    public $potencia;
    public $motor;
    public $velocidade_maxima;
    public $tempo_zero_cem;
    public $peso;

    // construtor
    function __construct($nome, $imagem, $potencia, $motor, $velocidade_maxima, $tempo_zero_cem, $peso){
      $this->nome = $nome;
      $this->imagem = $imagem;
      $this->potencia = $potencia;
      $this->motor = $motor;
      $this->velocidade_maxima = $velocidade_maxima;
      $this->tempo_zero_cem = $tempo_zero_cem;
      $this->peso = $peso; 
    }

    // métodos
    function getNome(){
      return $this->nome;
    }

    function setNome($nome){
      $this->nome = $nome;
    }

    function getImagem(){
      return $this->imagem;
    }

    function setImagem($imagem){
      $this->imagem = $imagem;
    }

    function getPotencia(){
      return $this->potencia;
    }

    function setPotencia($potencia){
      $this->potencia = $potencia;
    }

    function getMotor(){
      return $this->motor;
    }

    function setMotor($motor){
      $this->motor = $motor;
    }

    function getVelocidadeMaxima(){
      return $this->velocidade_maxima;
    }
    function setVelocidadeMaxima($velocidade_maxima){
      $this->velocidade_maxima = $velocidade_maxima;
    }
    function getTempoZeroCem(){
      return $this->tempo_zero_cem;
    }
    function setTempoZeroCem($tempo_zero_cem){
      $this->tempo_zero_cem = $tempo_zero_cem;
    }
    function getPeso(){
      return $this->peso;
    }
    function setPeso($peso){
      $this->peso = $peso;
    }
  }
?>