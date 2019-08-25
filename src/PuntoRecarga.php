<?php

namespace TrabajoTarjeta;

class PuntoRecarga implements PuntoRecargaInterface{

  public function recarga(TarjetaInterface $tarjeta, $monto) {
    //Chequea si es alguno de los valores aceptados que no cargan dinero extra
    if ($monto == 10 || $monto == 20 || $monto == 30 || $monto == 50 || $monto == 100) {
      $tarjeta->saldo += $monto;
      return true;
    }
    //Chequea si es alguno de los que sí cargan extra
    if ($monto == 510.15) {
      $this->saldo += $monto + 81.93 - ($this->plus * $this->precio);
      $this->plus = 0;
      return true;
    }
    if ($monto == 962.59) {
      $this->saldo += $monto + 221.58 - ($this->plus * $this->precio);
      $this->plus = 0;
      return true;
    }
    //Si no es ninguno de esos valores entonces no es un valor aceptado y hay que retornar false
    return false;
  }

}
