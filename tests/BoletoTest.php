<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase {

    public function testBoleto() {
        $precio = 32.50;
        $tiempo = new TiempoFalso(0);
        $metodo = new MetodoNormal;
        $colectivo = new Colectivo("K", "Empresa genérica", 3);
        $this->assertEquals($colectivo, null);
        $maquina = new MaquinaDebitadora($colectivo, $tiempo, $precio);
        $tarjeta = new Tarjeta(100.0, $metodo);
        $validate = $maquina->escanearTarjeta($tarjeta);
        $this->assertEquals($validate, true);
        $this->assertEquals($tarjeta->obtenerUltimoBoleto()->obtenerColectivo(), $colectivo);
        $this->assertEquals($tarjeta->obtenerUltimoBoleto()->obtenerTarjeta(), $tarjeta);
        $this->assertEquals($tarjeta->obtenerUltimoBoleto()->obtenerValor(), $valor);
        $this->assertEquals($tarjeta->obtenerUltimoBoleto()->obtenerTipoTarjeta(), get_class($tarjeta));
        $this->assertEquals($tarjeta->obtenerUltimoBoleto()->obtenerFecha(), $tiempo->time());
    }

}
