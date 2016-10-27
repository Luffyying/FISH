<?php
    class Calendar{
        private $year;//当前的年。
        private $month;//当前的月。
        private $start_weekday;//当月的第一点对应的时周几。
        private $days;//当月一共多少天。
        function __construct(){
            $this -> year = isset($_GET["year"]) ? $_GET["year"] : date("Y");
            $this -> month = isset($_GET["month"]) ? $_GET["month"] : date("m");

            $this -> start_weekday = date("w", mktime(0, 0, 0, $this->month, 1, $this->year));
            $this -> days = date("t", mktime(0, 0, 0, $this->month, 1, $this->year));

        }

        function out(){
            echo '<table align="center">';
            $this -> changeDate();
            $this -> weekList();
            $this -> dayList();
            echo '</table>';
        }

        private function weekList(){
            $week = array('日','一','二','三','四','五','六');

            echo '<tr>';
            for($i=0; $i<count($week); $i++) { 
                echo '<th>'.$week[$i].'</th>';
                
            }
            echo '</tr>';
        }

        private function dayList(){
            echo '<tr>';
            //输出空格（当前月第一天前面要空出来）    
            for ($j=0; $j < $this->start_weekday; $j++) echo '<td><div class="single_day">&nbsp;</div><hr><div class="single_price"></div></td>';
                

            for ($k=1; $k < $this->days; $k++) { 
                $j++;

                if($k == date('d')){
                    echo '<td class="fontb"><div class="single_day">'.$k.'</div><hr><div class="single_price">￥218</div></td>';
                }else{
                    echo '<td><div class="single_day">'.$k.'</div><hr><div class="single_price">￥218</div></td>';
                }

                if($j%7 == 0){
                    echo '</tr><tr>';
                }
            }
            //后面几个空格
            while($j%7!==0){
                echo '<td><div class="single_day">&nbsp;</div><hr><div class="single_price"></div></td>';
                $j++;
            }

            echo '</tr>';
        }

        private function prevYear($year, $month){
            $year = $year - 1;
            if ($year < 1970) {
                $year = 1970;
            }
            return "year = {$year}&month={$month}";
        }
        private function prevMonth($year, $month){
            if ($month == 1) {
                $year = $year -1;
                if ($year < 1970) {
                    $year = 1970;
                }
                $month = 12;
            }else{
                $month--;
            }
            return "year = {$year}&month={$month}";

        }
        private function nextYear($year, $month){
            $year = $year + 1;
            if ($year > 2030) {
                $year = 2030;
            }

            return "year = {$year}&month={$month}";
        }
        private function nextMonth($year, $month){
            if($month ==12){
                $year++;
                if ($year > 2030) {
                    $year = 2030;
                }
                $month = 1;
            }else{
                $month++;
            }
            return "year = {$year}&month={$month}";
        }

        private function changeDate(){
            echo '<tr>';
            echo '<td class="changeBar"> <a class="changeMonth" href="welcome/house_detail?'.$this->prevMonth($this->year, $this->month).'">'.'<'.'</a> </td>';
            echo '<td class="changeBar">&nbsp;</td>';
            echo '<td class="changeBar" colspan="3">'.$this->year.'年'.$this->month.'月'.'</td>';
            echo '<td class="changeBar">&nbsp;</td>';
            echo '<td class="changeBar"> <a class="changeMonth" href="welcome/house_detail?'.$this->nextMonth($this->year, $this->month).'">'.'>'.'</a> </td>';
            echo '</tr>';
        }


    }
?>              