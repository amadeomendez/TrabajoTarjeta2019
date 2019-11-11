<?php

namespace TrabajoTarjeta;

class MetodoNormal implements MetodoInterface {

  public function valorBoleto($precioBase){
    return $precioBase;
  }

  public function postViaje(){
  }

}
