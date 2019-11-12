<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class MedioBoletoEstudiantilTest extends TestCase {

    /**
     * Testea que la tarjeta solo pueda usarse cada 5 minutos
     * No tenemeos implementado eso todavía.
     */

    /*
  public function testCincoMinutos(){
      $tiempo = new TiempoFalso(0);
      $colectivo = new Colectivo("K","Empresa genérica",3,$tiempo);
      $estudiantil = new MedioBoletoEstudiantil($tiempo);
      $estudiantil->recargar(100);
      $boleto = $colectivo->pagarCon($estudiantil);
      $this->assertEquals($boleto,new Boleto($estudiantil->precio,$colectivo,$estudiantil,$tiempo->time(),"normal"));
      $tiempo->avanzar(10);
      $this->assertFalse($colectivo->pagarCon($estudiantil));
      $tiempo->avanzar(6000);
      $boleto = $colectivo->pagarCon($estudiantil);
      $this->assertEquals($estudiantil->obtenerAntTiempo(), 6010);
      $this->assertEquals($boleto,new Boleto($estudiantil-  >precio,$colectivo,$estudiantil,$tiempo->time(),"normal"));
  }
    */

    /**
     * Testea que el viaje salga la mitad de lo que sale con una tarjeta normal
     */
    public function testSaleLaMitad(){
      $precio = 32.50
      $tiempo = new TiempoFalso(0);
      $normal = new MetodoNormal;
      $estudiantil = new MetodoMedioBoleto;
      $colectivo = new Colectivo("K", "Empresa genérica", 3);
      $maquina = new MaquinaDebitadora($colectivo, $tiempo, $precio);
      $tarjetaNormal = new Tarjeta(100.0, $normal);
      $tarjetaMedio = new Tarjeta(100.0, $estudiantil);
      $validateNormal = $maquina->escanearTarjeta($tarjetaNormal);
      $validateMedio = $maquina->escanearTarjeta($tarjetaMedio);

      $this->assertEquals($validateNormal, true);
      $this->assertEquals($validateMedio, true);

      $boletoNormal = $tarjetaNormal->obtenerUltimoBoleto();
      $boletoMedio = $tarjetaMedio->obtenerUltimoBoleto();

      $this->assertEquals($boletoNormal->obtenerValor(),$boletoMedio->obtenerValor() * 2);
    }
}
