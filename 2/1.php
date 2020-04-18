<?php
if(isset($_POST["done"]))
{
        $str= $_POST["sometext"];

//$str="Hello world";
function conv($strochka,$from=0)
{
    $line=str_split($strochka);
    $ans='';
    $counter=0;
    for ($i=$from;$i<count($line);$i++)
    {
        if ($line[$i]=='h')
        {
            yield '4';
            $counter++;
        }else  if ($line[$i]=='l'){
            yield '1';
            $counter++;
        }else if ($line[$i]=='e'){
            yield '3';
            $counter++;
        }else if ($line[$i]=='o'){
            yield '0';
            $counter++;
        }else{yield $line[$i];}
        $ans.=$line[$i];
    }

    yield '<br/>'."Total changes :".$counter;
}
    foreach (conv($str) as $val) {
        echo ($val);
    }
}
 ?><br/>
<a href="index.php">Home</a>
