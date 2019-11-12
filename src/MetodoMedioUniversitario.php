<?php

namespace TrabajoTarjeta;

class MetodoMedioUniversitario implements MetodoInterface {

  private $mediosUsados = 0;

  public function valorBoleto($precioBase){
    if ($this->mediosUsados <= 2) {
      return ($precioBase / 2.0);
    }
    else {
      return $precioBase;
    }
  }

  public function postViaje(){

  }

}
