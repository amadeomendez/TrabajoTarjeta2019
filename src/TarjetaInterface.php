<?php

namespace TrabajoTarjeta;

interface TarjetaInterface {

  /*
  * Devuelve el saldo de la tarjeta.
  */
  public function obtenerSaldo();

  /*
  * Devuelve la cantidad de viajes plus que debe. No debería jamás ser mayor a 2.
  */
  public function obtenerPlus();

  /*
  * Devuelve el último boleto emitido.
  */
  public function obtenerUltimoBoleto();

  /*
  * Toma el boleto generado por la máquina debitadora y lo almacena en la variable ultimoBoleto.
  */
  public function guardarUltimoBoleto(BoletoInterface $boleto);

  /*
  * Toma un monto de dinero y se lo suma al saldo actual.
  */
  public function sumarSaldo($monto);

  /*
  * Suma un viaje plus.
  */
  public function sumarPlus();

  /*
  * Toma un monto de dinero y se lo resta al saldo actual.
  */
  public function restarSaldo($monto);

  /*
  * Resta una cantidad de viajes plus. No debería jamás ser mayor a 2.
  */
  public function restarPlus($monto);
}
