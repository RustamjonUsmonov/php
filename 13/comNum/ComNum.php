<?php


namespace comNum;


class ComNum
{
    public float $real;
    public float $complex;

    function __construct($x, $y)
    {
        $this->real = $x;
        $this->complex = $y;
    }

    function __toString()
    {
        return $this->real . " + " . $this->complex . "*i";
    }

    function get_real():float
    {
        return $this->real;
    }

    function get_complex(): float
    {
        return $this->complex;
    }

    function set_real(float $real): void
    {
        $this->real=$real;
    }

    function set_complex(float $complex): void
    {
        $this->complex=$complex;
    }

    function add(ComNum $num): void
    {
        $this->real = $this->real + $num->get_real();
        $this->complex = $this->complex + $num->get_complex();
    }

    function sub(ComNum $num): void
    {
        $this->real = $this->real - $num->get_real();
        $this->complex = $this->complex - $num->get_complex();
    }

    function mult(ComNum $num): void
    {
        $r = $this->real;
        $c = $this->complex;
        $this->real = ($this->real)*($num->get_real())-($this->complex)*$num->get_complex();
        $this->complex = ($r)*($num->get_complex())+($c)*$num->get_real();
    }

    function div(ComNum $num): void
    {
        $r = $this->real;
        $c = $this->complex;
        if ($num->complex!=0 && $num->real!=0) {
            $this->real = ($this->real*$num->get_real()+$this->complex*$num->get_complex())/(pow($num->get_complex(),2)+pow($num->get_real(),2));
            $this->complex = (-$r*$num->get_complex()+$c*$num->get_real())/(pow($num->get_complex(),2)+pow($num->get_real(),2));
        }
        else{
            echo('Zero Division');
        }
    }

    function abs(): float
    {
        return sqrt(pow($this->real,2)+pow($this->complex,2));
    }


}