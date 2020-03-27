<?php
if(isset($_POST["done"]))
{
        $str= $_POST["sometext"];

//$str="Hello world";
function conv($strochka)
{
    $line=str_split($strochka);
    $ans='';
    $counter=0;
    for ($i=0;$i<count($line);$i++)
    {
        if ($line[$i]=='h')
        {
            $line[$i]='4';
            $counter++;
        }
        if ($line[$i]=='l'){
            $line[$i]='1';
            $counter++;
        }
        if ($line[$i]=='e'){
            $line[$i]='3';
            $counter++;
        }
        if ($line[$i]=='o'){
            $line[$i]='0';
            $counter++;
        }
        $ans.=$line[$i];
        $total_change_num=$counter;
    }
    return array($ans,$counter);
}
$res=conv($str);
//print_r( $res);

echo "Converted string: $res[0] <br/> Changes: $res[1]";
}
 ?><br/>
<a href="index.html">Home</a>