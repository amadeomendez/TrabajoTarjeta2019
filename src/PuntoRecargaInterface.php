<?php

namespace TrabajoTarjeta;

interface PuntoRecargaInterface
{

  /**
   *  Recibe una tarjeta y un monto a cargar, lo carga en la tarjeta. Hay dos montos que vienen con un bono de carga extra.
   */
  public function recarga(TarjetaInterface $tarjeta, $monto);
}
