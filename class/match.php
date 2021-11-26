<?php
  class Partida {
    // atributos
    public $data;
    public $status;

    // construtor
    function __construct($data, $status){
      $this->data = $data;
      $this->status = $status;
    }

    // métodos
    function getData(){
      return $this->data;
    }

    function setData($data){
      $this->data = $data;
    }

    function getStatus(){
      return $this->status;
    }

    function setStatus($status){
      $this->status = $status;
    }
  }
?>