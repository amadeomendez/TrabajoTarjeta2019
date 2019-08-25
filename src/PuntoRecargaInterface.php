<?php

namespace TrabajoTarjeta;

/**
 * Esta interface tiene un único método, "recarga", que recibe una tarjeta y un monto a cargar.
 */
interface PuntoRecargaInterface
{
  public function recarga(TarjetaInterface $tarjeta, $monto);
}
