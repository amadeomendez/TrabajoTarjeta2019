<?php

namespace TrabajoTarjeta;

class MetodoMedioUniversitario implements MetodoInterface {

  public function valorBoleto($precioBase){
    return ($precioBase / 2.0);
  }

  public function postViaje(){

  }

}
