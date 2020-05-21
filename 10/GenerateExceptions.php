<?php
use exceptions\Exception1;
use exceptions\Exception2;
use exceptions\Exception3;
use exceptions\Exception4;
use exceptions\Exception5;

class GenerateExceptions
{
    public function f1($x){
        if ($x <= 0){
            $this -> generateException("Значение должно быть больше 0"."\n");
        }else {
            $this->generateException("Значение больше 0"."\n");
        }

    }
    public function f2($x){
        if($x == 8){
            $this -> generateException("Значение не дожно равняться 8"."\n");
        } else{
            $this->generateException("Значение не равно 8"."\n");
        }

    }
    public function f3($x){
        if($x%5 == 0){
            $this -> generateException("Значение не дожно быть ккратно 5"."\n");
        } else{
            $this->generateException("Значение не кратно 5"."\n");
        }
    }
    public function f4($x){
        if($x == 4){
            $this -> generateException("Значение не дожно равняться 4"."\n");
        } else{
            $this->generateException("Значение не равно 4"."\n");
        }
    }

    public function generateException($str){
        $num = random_int(1, 5);
        switch ($num){
            case 1:
                throw new Exception1("Сработало 1 исключение:"."\n".$str);
                break;
            case 2:
                throw new Exception2("Сработало 2 исключение:"."\n".$str);
                break;
            case 3:
                throw new Exception3("Сработало 3 исключение:"."\n".$str);
                break;
            case 4:
                throw new Exception4("Сработало 4 исключение:"."\n".$str);
                break;
            case 5:
                throw new Exception5("Сработало 5 исключение:"."\n".$str);
                break;
            default:
                echo "Error"."\n";
        }

    }

}