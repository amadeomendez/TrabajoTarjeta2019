<?php

namespace TrabajoTarjeta;

interface TarjetaInterface {

  public function obtenerSaldo();

  public function obtenerPlus();

  public function obtenerUltimoBoleto();

  public function guardarUltimoBoleto(BoletoInterface $boleto);

  public function sumarSaldo($monto);

  public function sumarPlus();

  public function restarSaldo($monto);

  public function restarPlus($monto);
}
