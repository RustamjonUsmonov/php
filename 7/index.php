<link rel="stylesheet" href="css/bootstrap.min.css">
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col text-center ">
            <form class=" text-center mb-3 mt-3 form-group " action="index.php" method="post">
                <h3>Enter domain address</h3>
                <b>Example: <i>www.google.com</i></b><br/>
                <p>It may take some time, please wait...</p>
                <input type="text" class="mb-1 mt-1 container form-control text-center" name="domain" placeholder="Domain here"><br/>
                <div class="row">
                    <div class="col">
                        <input type="radio" name="way" value="ping">
                        <label for="ping">Ping</label>
                    </div>
                    <div class="col">
                        <input type="radio" name="way" value="tracert">
                        <label for="tracert">Tracert</label>
                    </div>
                </div>
                <button class="btn btn-outline-success mb-3" type="submit" name="submit" >Submit</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
<?php
if(isset($_POST['submit']))
{
    $selected_radio = @$_POST['way'];
    $host=trim($_POST['domain']);
    if($host==''){
        ?><div class="container alert alert-danger mt-3 ">Enter hostname</div><hr><?php
    }else if(empty($selected_radio)){
        ?><div class="container alert alert-danger mt-3 ">Select method</div><hr><?php
    }else{
        function ping($ip_ad){
            $ip=escapeshellarg ($ip_ad);
            exec("ping $ip",$arr);
            return $arr;
        }
        function tracert($ip_ad){
            $ip=escapeshellarg ($ip_ad);
            exec("tracert $ip",$arr);
            return $arr;
        }
        if ('ping' == $_POST['way']) {
            $pin=ping($host);
            if(count($pin)<9){
                ?><div class="container alert alert-danger mt-3 ">Ping request could not find host <?php echo $host?>. Please check the name and try again.</div><hr><?php
            }
            else{
                $q=explode('[',$pin[1]);
                $w=$q[1];
                $e=explode(']',$w);  $ip_address=$e[0];
                echo '<div class="alert-info alert"><b> IP Address:  '.$ip_address.'</b></div>';
                $ar=explode('(',ping($host)[8]);
                $tmp=$ar[1];
                $ar2=explode('%',$tmp);
                $percentage = 100-intval($ar2[0]);
                echo '<div class="alert-success alert">Successful: '.$percentage.'%</div>';
            }
        }else if ('tracert' == $_POST['way']) {
            $tra=tracert($host);
            if(count($tra)<25||count($tra)>31){
                ?><div class="container alert alert-danger mt-3 ">Ping request could not find host <?php echo $host?>.</div><hr><?php
            }else{
                $q=explode('[',$tra[1]);
                $w=$q[1];
                $e=explode(']',$w);  $r=$e[0];

                $myArr=array();
                for ($i=4;$i<29;$i++){
                    $temporary=explode(' ',$tra[$i]);
                    if(end($temporary)!='out.'){
                        array_push($myArr,end($temporary));
                    }
                }
                ?><div class="alert-success alert"><b> IP : <?php echo $r?> <b></div><?php
                $final=implode(' ',$myArr);
                echo '<div class="alert-info alert"> List of ip:  '.$final.'</div>';
            }
        }
    }
}
?>

