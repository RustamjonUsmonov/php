<?php
$text=$_POST['textarea'];//getting text

echo ($text);//printing text gained
echo '<hr>';

$arr = explode('/',$text );//dividing into sentences and pushing to array
$init=count($arr);// saving the number of sentences given by user

for ($m=0;$m<$init;$m++)
{
    $ns=explode(" ",$arr[$m]);//dividing sentences into words and pushing to array
    $re=array_reverse($ns);// reversing arrays of words
    $impl = implode(' ',$re); //converting back to string, in order to get reversed sentences
    array_push($arr,$impl);//pushing reversed sentences to array with normal sentences
}
//print_r($arr);echo ' arr<hr> ';
//echo '<b>'.count($arr).'    </b>';

$temp=array();
$notSortedTemp=array();
for ($i=0;$i<count($arr);$i++)
{
    //getting second word of each sentence and pushing to array
    array_push($temp,explode(' ',$arr[$i])[1]);
    //same as line above, I used it for comparing in order to print
    array_push($notSortedTemp,explode(' ',$arr[$i])[1]);
}
//print_r($temp);echo '<hr>';

sort($temp);// sorting array with second words

/*now I have sorted array, and for each  word in this array
I compare it with not sorted*/
for ($j=0;$j<count($temp);$j++)
{
    for ($l=0;$l<count($temp);$l++)
    {
        /*when sorted_second_word_array element finds it self in the array
        with not_sorted_second_word_array, prints out the sentence in which was found*/
        if ($temp[$j]==$notSortedTemp[$l])
        {
            echo $arr[$l]."<br/>";
        }
    }
}