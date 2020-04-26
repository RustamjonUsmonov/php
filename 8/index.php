<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
class Calendar
{
    private $month;
    private $year;
    private $days_of_week;
    private $num_days;
    private $date_info;
    private $day_of_week;

    public function __construct($month,$year,$days_of_week=array('Sun','Mon','Tue','Wed','Th','Fr','Sat'))
    {
        $this->month=$month;
        $this->year=$year;
        $this->days_of_week=$days_of_week;
        $this->num_days=cal_days_in_month(CAL_GREGORIAN,$this->month,$this->year);
        $this->date_info=getdate(strtotime('first day of',mktime(0,0,0,$this->month,1,$this->year)));
        $this->day_of_week=$this->date_info['wday'];
    }
    public function Show()
    {
        $out='<table class="calendar">';
        $out.='<caption>'.$this->date_info['month'].' '.$this->year.'</caption>';
        $out.='<tr>';

        foreach ($this->days_of_week as $day) {
            $out.='<th class="header">'.$day.'</th>';
        }

        $out.='</tr><tr>';

        /* if($this->day_of_week>0)
         {
             $out.='<td colspan="'.$this->day_of_week.'"></td>';
         }*/
        if($this->day_of_week>0) {
            for ($i = 0; $i < $this->day_of_week; $i++) {
                $out .= '<td>' . null . '</td>';
            }
        }

        $current_day=1;
        while ($current_day<=$this->num_days)
        {
            if($this->day_of_week==7)
            {

                $this->day_of_week=0;
                $out.='</tr><tr>';
            }
            if($current_day==date('j')&&$this->date_info['mon']==date('n')&&$this->date_info['year']==date('Y') )
            {
                $out.='<td class="day"><b>'.$current_day.'<b></td>';
            }else{
                $out.='<td class="day">'.$current_day.'</td>';
            }
            $current_day++;
            $this->day_of_week++;
        }

        if($this->day_of_week!=7)
        {
            $remaining_days=7-$this->day_of_week;
            for ($i = 0; $i < $remaining_days; $i++) {
                $out .= '<td>' . null . '</td>';
            }
        }
        $out.='</tr>';
        $out.='</table>';

        echo $out;
    }
}

?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
    table {
        width: 100%; /* Ширина таблицы */
        border-collapse: collapse; /* Убираем двойную рамку между ячейками */
        text-align: center;
    }
    td {
        border: 1px solid darkgrey; /* Параметры границы */
        padding: 5px; /* Поля в ячейке */
    }
    caption {
        caption-side: top; /* Заголовок над таблицей */
        text-align: center;
    }
    th:nth-of-type(7),td:nth-of-type(7){
        color: red;
    }
    th:nth-of-type(1),td:nth-of-type(1){
        color: red;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col text-center ">
            <form class=" text-center mb-3 mt-3 form-group " action="index.php" method="get">
                <h3>Welcome To Calendar</h3>
                <input type="text" class="mb-1 mt-1 container form-control text-center" name="year" placeholder="Year"><br/>

                <select name="month" class="form-control mb-2" >
                    <option selected>Choose month</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                <button class="btn btn-outline-success mb-3 mt-3" type="submit" name="submit" value="true">Submit</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
<?php
$month = date('m');
$god=date('Y');
if (isset($_GET['submit']))
{
    $error=array();
    $month=$_GET['month'];
    $god=$_GET['year'];
    if( $month==0){
        $god--;
        $month=12;
    }
    if($month==13){$god++;$month=1;}
    if($_GET['year']=='')
    {
        $error[]='Enter year';
    }else if($_GET['month']=='Choose month')
    {
        $error[]='Choose month';
    }
    if (!empty($error)){
        echo '<div class="alert alert-danger">'.array_shift($error).'</div>';
        exit();
    }
}

?>
<div class="container ">
    <div class="row">
        <div class="col"></div>
        <div class="col text-center "><hr>
            <?php
            $calendar=new Calendar($month,$god);
            $calendar->Show();?>
            <div class="row">
                <div class="col">
                    <a href="/8/index.php?year=<?php echo $god?>&month=<?php echo ($month-1);?>&submit=true">Previous</a>
                    </div>
                <div class="col">
                    <a href="/8/index.php?year=<?php echo $god?>&month=<?php echo  ($month+1);?>&submit=true">Next</a>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>


