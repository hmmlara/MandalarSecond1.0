<?php 
include_once __DIR__ . "/../../model/Report.php";

if(isset($_GET['type'])){
    if($_GET['type'] == 0){
        echo $Report_model->Total_Posts_in_each_category();
    }
    
    if($_GET['type'] == 1){
        echo $Report_model->Total_Sold_Out_Posts_in_each_category();
    }
    if($_GET['type'] == 3){
        echo $Report_model->Total_Posts_in_each_sub_category();
    }
}
