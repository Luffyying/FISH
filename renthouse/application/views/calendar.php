<style>
    table{
        border:1px solid #ccc;
        width: 100%;
    }
    #calendar hr{
        border: 1px solid #ccc;
        border-top: 0;
        margin: 0;
        padding: 0;
    }
    .changeBar{
        border: none;
    }
    .changeMonth{
        /*border: none;                               */
        display: inline-block;
        font-size: 20px;
        color: black;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }
    .changeMonth:hover{
        color: black;
        background-color: #eee;
        text-decoration: none;
    }
    .fontb{
        background-color: #eee;
    }
    th{
        text-align: center;
        width: 50px;
    }
    td{
        border: 1px solid #ccc;
        text-align: center;
        /*height: 100px;*/
        width: 50px;
    }
    .single_day{
        width: 50px;
        height: 50px;
        padding-top: 15px;
    }
    .single_price{
        width: 50px;
        height: 50px;
        /*border-top: 1px solid #ccc;*/
        padding-top: 15px;
    }
</style>
<?php 
    include "calendar.class.php";
    $calendar = new Calendar;
    $calendar -> out();


?>