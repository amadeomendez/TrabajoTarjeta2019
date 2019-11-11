<?php

namespace TrabajoTarjeta;

class MetodoMedioBoleto implements MetodoInterface {

  public function valorBoleto($precioBase){
    return ($precioBase / 2.0);
  }

  public function postViaje(){

  }

}
