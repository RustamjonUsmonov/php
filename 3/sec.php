<?php
$text=$_POST['textarea'];//getting text

echo ($text);//printing text gained
echo '<hr>';

$arr = explode('/',$text );//dividing into sentences and pushing to array
$init=count($arr);// saving the number of sentences given by user

$arr2=array();
for ($m=0;$m<$init;$m++)
{
    $ns=explode(" ",$arr[$m]);//dividing sentences into words and pushing to array
    shuffle($ns);// shuffle arrays of words

    $impl = implode(' ',$ns); //converting back to string, in order to get reversed sentences
    array_push($arr2,$impl);//pushing reversed sentences to array with normal sentences
    array_push($arr2,$arr[$m]);

}

$temp=array();
$notSortedTemp=array();
for ($i=0;$i<count($arr2);$i++)
{
    //getting second word of each sentence and pushing to array
    array_push($temp,explode(' ',$arr2[$i])[1]);
    //same as line above, I used it for comparing in order to print
    array_push($notSortedTemp,explode(' ',$arr2[$i])[1]);
}
sort($temp);// sorting array with second words

/*now I have sorted array, and for each  word in this array
I compare it with not sorted*/
for ($j=0;$j<count($temp);$j++)
{
    for ($l=0;$l<count($temp);$l++)
    {
        /*when sorted_second_word_array element finds it self in the array
        with not_sorted_second_word_array, prints out the sentence in which was found */
        if ($temp[$j]==$notSortedTemp[$l])
        {
            echo $arr2[$l]."<br/>";
            $notSortedTemp[$l]='';
            break;
        }
    }
}

