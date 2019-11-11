<?php

namespace TrabajoTarjeta;

interface MaquinaDebitadoraInterface {

  /**
   * Paga un viaje en el colectivo con una tarjeta en particular.
   *
   * @param TarjetaInterface $tarjeta
   *
   * @return BoletoInterface|FALSE
   *  El boleto generado por el pago del viaje. O FALSE si no hay saldo
   *  suficiente en la tarjeta.
   */
  public function pagarCon(TarjetaInterface $tarjeta);

  /**
   * Retorna "normal" si puede pagar normalmente,
   * "plus" si paga con un viaje plus,
   * "paga un plus" si paga con saldo y ademas abona un plus,
   * "paga dos plus" si abona dos,
   * "transbordo normal" si usa transbordo,
   * "transbordo y paga un plus" si usa transbordo y tambien paga un plus,
   * "transbordo y paga dos plus" si paga dos,
   * o "no" en caso contrario.
   * Luego, si puede pagar, baja el saldo o los viajes plus de la tarjeta dependiendo del caso.
   *
   * @param string string int
   *
   * @return string
   */
  public function puedePagar($linea, $empresa, $numero);

  /**
   * Checkea si se cumplen las opciones necesarias para el vieje plus y devuelve true o false segun el caso.
   *
   * @param ColectivoInterface
   *
   * @return bool
   */
  public function trasbordoPermitido($colectivo);

  /**
   * Se fija el tiempo necesario para hacer un transbordo segun el dia o si es feriado o no.
   *
   * @param TiempoInterface
   *
   * @return int
   */
  function diferenciaNecesaria($tiempo);


  /**
   * Se fija si es feriado y retorna true o false segun el caso.
   *
   * @return bool
   */
  function esFeriado();

}
