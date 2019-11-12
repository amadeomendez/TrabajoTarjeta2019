<?php

namespace TrabajoTarjeta;

interface MaquinaDebitadoraInterface {

  /*
  * Toma la tarjeta, almacena en la variable, y calcula el precio del boleto según el método.
  */
  public function escanearTarjeta(TarjetaInterface $tarjeta);

  /*
  * Chequea que pueda pagar un viaje al precio base.
  */
  public function precioBaseCheck($cant);

  /*
  * Chequea que pueda pagar un viaje al precio que se decide luego del cálculo en escanearTarjeta.
  */
  public function precioCheck($cant);

  /*
  * Chequea si tiene que pagar algún viaje plus.
  */
  public function plusCheck();

  /*
  * Paga el/los viaje(s) plus que debe, si plusCheck devuelve true.
  */
  public function plusPago(TarjetaInterface $tarjeta);

  /*
  * Se fija que los colectivos sean distintos, chequeando el colectivo actual contra el que figura en el último boleto, éste estando almacenado en la tarjeta.
  */
  public function distintosColectivosCheck();

  /*
  * Saca la diferencia máxima de horas necesarias para concretar un trasbordo.
  */
  public function diferenciaNecesaria();

  /*
  * Se fija si puede hacer un trasbordo.
  */
  public function trasbordoCheck();

  /*
  * Se fija si es feriado?
  */
  public function esFeriado();

  /*
  * Se fija si puede pagar. Devuelve true cuando se realiza un trasbordo con éxito, cuando logra pagar un boleto al precio calculado según el método, o cuando debe usar un viaje
  * plus. Devuelve false cuando no puede pagar el boleto de ninguna manera.
  */
  public function puedePagar(TarjetaInterface $tarjeta);
}
