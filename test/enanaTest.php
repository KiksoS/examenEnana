<?php

use PHPUnit\Framework\TestCase;
include './src/Enana.php';

class EnanaTest extends TestCase {
    
    public function testCreandoEnana() {
        # Se probará la creación de enanas vivas, muertas y en limbo y se comprobará tanto la vida como el estado
        $viva = new Enana("Vivisima", 25);
        $limbo = new Enana("Limbisima", 0);
        $muerta = new Enana("Morticia", -1); // Corrección aquí
        $this->assertEquals("viva", $viva->getSituacion());
        $this->assertEquals("limbo", $limbo->getSituacion());
        $this->assertEquals("muerta", $muerta->getSituacion());
    }
    
    public function testHeridaLeveVive() {
        #Se probará el efecto de una herida leve a una Enana con puntos de vida suficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es mayor que 0 y además que su situación es viva
        $Nacho = new Enana("Nacho",20);
        $Nacho->heridaLeve();
        $this->assertEquals("viva", $Nacho->getSituacion());
        $this->assertTrue($Nacho->getPuntosVida() > 0);
    }

    public function testHeridaLeveMuere() {
        #Se probará el efecto de una herida leve a una Enana con puntos de vida insuficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es menor que 0 y además que su situación es muerta
        $Pascualin = new Enana("Pascualin",9);
        $Pascualin->heridaLeve();
        $this->assertEquals("muerta", $Pascualin->getSituacion());
        $this->assertTrue($Pascualin->getPuntosVida() < 0);

    }

    public function testHeridaGrave() {
        #Se probará el efecto de una herida grave a una Enana con una situación de viva.
        #Se tendrá que probar que la vida es 0 y además que su situación es limbo
        $Carmen = new Enana("Carmen",20);
        $Carmen->heridaGrave();
        $this->assertEquals("limbo", $Carmen->getSituacion());
        $this->assertEquals(0,$Carmen->getPuntosVida());

    }
    
    public function testPocimaRevive() {
        #Se probará el efecto de administrar una pócima a una Enana muerta pero con una vida mayor que -10 y menor que 0
        #Se tendrá que probar que la vida es mayor que 0 y que su situación ha cambiado a viva
        $Francisca = new Enana("Francisca",-9);
        $Francisca->pocima();
        $this->assertEquals("viva", $Francisca->getSituacion());
        $this->assertTrue($Pascualin->getPuntosVida() > 0);

    }

    public function testPocimaNoRevive() {
        #Se probará el efecto de administrar una pócima a una Enana en el libo
        #Se tendrá que probar que la vida y situación no ha cambiado

    }

    public function testPocimaExtraLimbo() {
        #Se probará el efecto de administrar una pócima Extra a una Enana en el limbo.
        #Se tendrá que probar que la vida es 50 y la situación ha cambiado a viva.

    }
}
?>