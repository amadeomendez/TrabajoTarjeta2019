<?php

namespace TrabajoTarjeta;

class PuntoRecarga implements PuntoRecargaInterface{

  public function recarga(TarjetaInterface $tarjeta, $monto) {
    // Chequea si es alguno de los valores aceptados que no cargan dinero extra
    if ($monto == 10 || $monto == 20 || $monto == 30 || $monto == 50 || $monto == 100) {
      $tarjeta->sumarSaldo($monto);
      return true;
    }
    // Chequea si es alguno de los que sí cargan extra
    if ($monto == 1119,90) {
      $this->sumarSaldo($monto + 180,10);
      return true;
    }
    if ($monto == 2114,11) {
      $this->sumarSaldo($monto + 485,89);
      return true;
    }
    // Si no es ninguno de esos valores entonces no es un valor aceptado y hay que retornar false
    return false;
  }

}
