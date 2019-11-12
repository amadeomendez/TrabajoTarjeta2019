<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {

  public function testPagarConSaldo() {
    $precio = 32.50;
    $tiempo = new TiempoFalso(0);
    $metodo = new MetodoNormal;
    $colectivo = new Colectivo("K", "Empresa genérica", 3);
    $maquina = new MaquinaDebitadora($colectivo, $tiempo, $precio);
    $tarjeta = new Tarjeta(100.0, $metodo);
    $boleto = new Boleto($precio, $colectivo, $tarjeta, $tiempo);
    $maquina->escanearTarjeta($tarjeta);
    $this->assertEquals($boleto, $tarjeta->obtenerUltimoBoleto());
    $this->assertEquals($tarjeta->obtenerPlus(), 0);
  }

  public function testInfoColectivo(){
    $colectivo = new Colectivo("K", "Empresa generica", 3, new TiempoFalso(0));
    $this->assertEquals($colectivo->linea(), "K");
    $this->assertEquals($colectivo->empresa(), "Empresa generica");
    $this->assertEquals($colectivo->numero(), 3);
  }

  public function testPagarSinSaldo() {
    $precio = 32.50;
    $miSaldo = 12.50;
    $tiempo = new TiempoFalso(0);
    $metodo = new MetodoNormal;
    $colectivo = new Colectivo("K", "Empresa genérica", 3);
    $maquina = new MaquinaDebitadora($colectivo, $tiempo, $precio);
    $tarjeta = new Tarjeta($miSaldo, $metodo);
    $tarjeta->sumarPlus();
    $tarjeta->sumarPlus();
    $validate = $maquina->escanearTarjeta($tarjeta);
    $this->assertEquals($validate, false);
    /*
    $valordebido = 20 - $tarjeta->precio;
    $this->assertEquals($bondi->pagarCon($tarjeta), new Boleto($tarjeta->precio, $bondi, $tarjeta, $bondi->tiempo(), "normal"));
    $this->assertEquals($tarjeta->obtenerSaldo(), $valordebido);
    $this->assertEquals($tarjeta->obtenerPlus(), 0);
    $tiempo->avanzar(6000);
    $this->assertEquals($bondi->pagarCon($tarjeta), new Boleto(0, $bondi, $tarjeta, $bondi->tiempo(), "usa plus"));
    $this->assertEquals($tarjeta->obtenerSaldo(), $valordebido);
    $this->assertEquals($tarjeta->obtenerPlus(), 1);
    $tiempo->avanzar(6000);
    $this->assertEquals($bondi->pagarCon($tarjeta), new Boleto(0, $bondi, $tarjeta, $bondi->tiempo(), "usa plus"));
    $this->assertEquals($tarjeta->obtenerSaldo(), $valordebido);
    $this->assertEquals($tarjeta->obtenerPlus(), 2);
    $tiempo->avanzar(6000);
    $this->assertEquals($bondi->pagarCon($tarjeta), false);
    $this->assertEquals($tarjeta->obtenerSaldo(), $valordebido);
    $this->assertEquals($tarjeta->obtenerPlus(), 2);
    */
  }
}
