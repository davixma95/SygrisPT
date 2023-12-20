<?php

require_once './tresenraya.php'; // Ajusta la ruta según tu estructura de carpetas

use PHPUnit\Framework\TestCase;

class TresEnRayaTest extends TestCase {
    public function testJuegoNoTerminado() {
        $board = [
            [0, 0, 1],
            [0, 1, 2],
            [2, 1, 0]
        ];
        $this->assertEquals(-1, boardState($board));
    }

    public function testEmpate() {
        $board = [
            [1, 2, 1],
            [2, 1, 2],
            [2, 1, 2]
        ];
        $this->assertEquals(0, boardState($board));
    }

    public function testGananLasX() {
        $board = [
            [1, 0, 1],
            [2, 1, 2],
            [1, 2, 1]
        ];
        $this->assertEquals(1, boardState($board));
    }

    public function testGananLasO() {
        $board = [
            [2, 0, 1],
            [2, 1, 2],
            [2, 2, 1]
        ];
        $this->assertEquals(2, boardState($board));
    }
}
?>
<!-- FUENTES

https://ricardogeek.com/como-realizar-pruebas-unitarias-con-phpunit/

https://programadorwebvalencia.com/cursos/testing/unit-testing/

https://blogprog.gonzalolopez.es/articulos/pruebas-unitarias-con-phpunit.html



-->
