<form method="post" action="index.php">
    <p>Enter pattern</p>
    <p><b>Example:</b>++++[->+++++++++++++>++++++++++++<<]>.>++.</p>
    <input type="text" name="pattern" placeholder="Pattern">
    <button type="submit" name="GO">GO</button>
</form>

<?php

if(isset($_POST['GO'])){
    $source=$_POST['pattern'];
//$source = "++++++++++[>+++++++>++++++++++>+++>+<<<<-]>++.>+.+++++++..+++.>++.<<+++++++++++++++.>.+++.------.--------.>+.>.";
    $source = array_values(array_filter(preg_split('//', $source)));


    $chain = array(0);
    $cell = 0;
    $brackets = 0;
    for ($i = 0; $i < count($source); ++$i) {
        switch ($source[$i]) {
            case "+" :
                // увеличиваем значение текущей ячейки
                $chain[$cell]++;
                break;
            case "-" :
                // уменьшаем значение текущей ячейки
                $chain[$cell]--;
                break;
            case "." :
                // выводим символ
                print chr($chain[$cell]);
                break;
            case "," :
                // считать символ из STDIN
                $chain[$cell] = ord(fgetc(STDIN));
                break;
            case ">" :
                // переход к следующей ячейке
                $cell++;
                if (!isset($chain[$cell])) {
                    $chain[$cell] = 0;
                }
                break;
            case "<" :
                // переход к предыдущей ячейке
                $cell--;
                if (!isset($chain[$cell])) {
                    $chain[$cell] = 0;
                }
                break;
            case "[" :
                // начало цикла
                if (!$chain[$cell]) {
                    $brackets = 1;
                    while ($brackets) {
                        $i++;
                        if ($source[$i] == "[") {
                            // был открыт вложенный цикл
                            $brackets++;
                        } else if ($source[$i] == "]") {
                            // цикл закрыт
                            $brackets--;
                        }
                    }
                }
                break;
            case "]" :
                // конец цикла
                if ($chain[$cell]) {
                    $brackets = 1;
                    while ($brackets) {
                        $i--;
                        if ($source[$i] == "]") {
                            // был закрыт вложенный цикл
                            $brackets++;
                        } else if ($source[$i] == "[") {
                            // цикл открыт
                            $brackets--;
                        }
                    }
                }
                break;
        }
    }
}
