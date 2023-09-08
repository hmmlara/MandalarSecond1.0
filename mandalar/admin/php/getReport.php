<?php 
include_once __DIR__ . "/../../model/Report.php";

if(isset($_GET['type'])){
    if($_GET['type'] == 'total_by_cat'){
        echo $Report_model->getData("SELECT COUNT(*) AS post_count, category.name 
        FROM post
        JOIN sub_category ON post.sub_category_id = sub_category.id
        JOIN category ON sub_category.category_id = category.id
        GROUP BY category.name;");
    }
    if($_GET['type'] == 'sold_out_total_by_cat'){
        echo $Report_model->getData("SELECT COUNT(*) AS post_count, category.name 
        FROM post
        JOIN sub_category ON post.sub_category_id = sub_category.id
        JOIN category ON sub_category.category_id = category.id
        WHERE post.status = 'sold_out'
        GROUP BY category.name;");
    }
    if($_GET['type'] == 'total_by_sub_cat'){
        echo $Report_model->getData("
        SELECT COUNT(*) AS post_count, sub_category.name 
        FROM post
        JOIN sub_category ON post.sub_category_id = sub_category.id
        GROUP BY sub_category.name;");
    }
    if($_GET['type'] == "sold_out_total_by_sub_cat"){
        echo $Report_model->getData("
        SELECT COUNT(*) AS post_count, sub_category.name 
        FROM post
        JOIN sub_category ON post.sub_category_id = sub_category.id
        WHERE post.status = 'sold_out'
        GROUP BY sub_category.name;");
    }
}

// type = 0 is All Posts By Category
// type = 1 is Sold Out Posts By Category
//type = 2 is All Posts By Sub Category