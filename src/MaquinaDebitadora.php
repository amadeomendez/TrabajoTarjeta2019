<?php

namespace TrabajoTarjeta;

class MaquinaDebitadora implements MaquinaDebitadoraInterface {

  protected $colectivo;
  protected $tarjeta;
  protected $tiempo;
  protected $precioBase;

  protected $precio;

  public function __construct(ColectivoInterface $colectivo, $tiempo, $precio) {
    $this->colectivo = $colectivo;
    $this->tiempo = $tiempo;
    $this->precioBase = $precio;
  }

  public function escanearTarjeta(TarjetaInterface $tarjeta) {
    $this->tarjeta = $tarjeta;
    $this->precio = $tarjeta->metodo->valorBoleto($precioBase);
    return ($this->puedePagar($tarjeta));
  }

  public function precioBaseCheck($cant) {
    if( ($cant * $this->precioBase) <= $this->tarjeta->obtenerSaldo() ){
      return true;
    }
    else {
      return false;
    }
  }

  public function precioCheck($cant) {
    if( ($cant * $this->precio) <= $this->tarjeta->obtenerSaldo() ){
      return true;
    }
    else {
      return false;
    }
  }

  public function plusCheck() {
    if ($this->tarjeta->obtenerPlus() == 0 ){
      return false;
    }
    else {
      return true;
    }
  }

  public function plusPago(TarjetaInterface $tarjeta) {
    $cantPlus = $tarjeta->obtenerPlus();
    if($this->plusCheck()){
      if($this->precioBaseCheck($cantPlus)){
        $tarjeta->restarSaldo($cantPlus * $this->precioBase);
        $tarjeta->restarPlus($cantPlus);
      }
    }
  }

  public function distintosColectivosCheck() {
    if($this->tarjeta->obtenerUltimoBoleto() == null){
      return true;
    }
    else {
      $ultimoColectivo = $this->tarjeta->obtenerUltimoBoleto()->obtenerColectivo();
      if($ultimoColectivo !== null) {
        if ($this->colectivo == $ultimoColectivo) {
          return false;
        }
        else {
          return true;
        }
      }
      else {
        return false;
      }
    }
  }

  public function diferenciaNecesaria() {
    $dia = date("D",$this->tiempo);
    $hora = date("H", $this->tiempo);
    if ($hora>=22 || $hora<=6) { // Si es de noche hay mas tiempo
      return 120;
    } else {
      if ($dia == "Sat") { // Si es sabado depende si es de mañana o tarde
        if ($hora<14 && !($this->esFeriado())) { // Aunque tambien puede ser feriado un sabado y entonces hay mas tiempo a la mañana tambien
          return 60;
        } else {
          return 120;
        }
      }
      if ($dia == "Sun") { // Los domingos tambien hay mas tiempo
        return 120;
      }
      //if($this->esFeriado()) // Y los otros días depende si es feriado
      //  return 90;
      //else
      //  return 60;
      return 60; // Por ahora no manejamos los feriados
    }
  }

  public function trasbordoCheck() {
    if ($this->distintosColectivosCheck()) {
      $actual = $this->tiempo;
      $anterior = $this->tarjeta->obtenerUltimoBoleto()->obtenerFecha();
      $diferencia = (($actual) - ($anterior));
      // La diferencia que devuelve está en minutos, por eso multiplico por 60
      if ($diferencia < ($this->diferenciaNecesaria($actual) * 60) ) {
        return true;
      }
      else {
        return false;
      }
    }
    else {
      return false;
    }
  }

  public function esFeriado() {
    return false;
  }

  public function puedePagar(TarjetaInterface $tarjeta) {
    $this->plusPago($tarjeta);
    if ( $this->trasbordoCheck() ) {
      $tarjeta->guardarUltimoBoleto(new Boleto(0.0, $colectivo, $tarjeta, $tiempo));
      return true;
    }
    else {
      if ( $this->precioCheck(1) ) {
        $tarjeta->metodo->postViaje();
        $tarjeta->guardarUltimoBoleto(new Boleto($precio, $colectivo, $tarjeta, $tiempo));
        $tarjeta->restarSaldo($precio);
        return true;
      }
      else {
        if($tarjeta->obtenerPlus() < 2){
          $tarjeta->guardarUltimoBoleto(new Boleto(0.0, $colectivo, $tarjeta, $tiempo));
          $tarjeta->sumarPlus();
          return true;
        }
        else {
          return false;
        }
      }
    }
  }

      //dios santo querido
}
