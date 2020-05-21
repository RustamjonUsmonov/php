<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use comNum\ComNum;

require_once 'comNum/ComNum.php';

class ComplexNumberTest extends TestCase
{
    public function testToString()
    {
        $var = new ComNum(1, 5);
        $this->expectOutputString("1 + 5*i");
        echo $var;
    }
    public function testSum()
    {
        $var = new ComNum(1, 5);
        $second = new ComNum(2, 6);
        $var->add($second);
        $this->assertEquals(new ComNum(3,11), $var);
    }

    public function testSub()
    {
        $var = new ComNum(1, 5);
        $second = new ComNum(2, 6);
        $var->sub($second);
        $this->assertEquals(new ComNum(-1,-1), $var);
    }

    public function testMult()
    {
        $var = new ComNum(1, 5);
        $second = new ComNum(2, 6);
        echo $var;
        $var->mult($second);
        $this->assertEquals(new ComNum(-28,16), $var);
    }

    public function testDiv()
    {
        $var = new ComNum(1, 5);
        $second = new ComNum(2, 6);
        $var->div($second);
        $this->assertEquals(new ComNum(0.8,0.1), $var);
    }

    public function testGetReal(){
        $var = new ComNum(1, 5);

        $this->assertEquals(1, $var->get_real());
    }

    public function testGetComplex(){
        $var = new ComNum(1, 5);

        $this->assertEquals(5, $var->get_complex());
    }

    public function textSetReal(){
        $var = new ComNum(1, 5);
        $var->set_real(9);
        $this->assertEquals(new ComNum(9,5), $var);
    }

    public function textSetComplex(){
        $var = new ComNum(1, 5);
        $var->set_complex(9);
        $this->assertEquals(new ComNum(1,9), $var);
    }

    public function testDivO(){
        $var = new ComNum(1, 5);
        $second = new ComNum(0, 0);
        $this->expectOutputString('Zero division');
        $var->div($second);
    }


}
