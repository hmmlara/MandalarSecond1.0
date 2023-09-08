<?php
include_once __DIR__ . "/../vendor/db.php";

class Report
{
    private $connection = "";

    public function __construct()
    {
        $this->connection = Database::connect();
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function Total_Posts_in_each_category()
    {
        $sql = "SELECT COUNT(*) AS post_count, category.name 
        FROM post
        JOIN sub_category ON post.sub_category_id = sub_category.id
        JOIN category ON sub_category.category_id = category.id
        GROUP BY category.name;";

        $statement = $this->connection->prepare($sql);

        if ($statement->execute()) {
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $datalist = [];
            $cat_name_list = [];
            foreach ($result as $key => $value) {
                $cat_name_list[] = $value['name'];
            }
            foreach ($result as $key => $value) {
                # code...
                $datalist[] = $value['post_count'];
            }
            $dataResult = json_encode(array("data" => $datalist, "name" => $cat_name_list));
            return $dataResult;
        }
    }

    public function Total_Sold_Out_Posts_in_each_category()
    {
        $sql = "
        SELECT COUNT(*) AS post_count, category.name 
        FROM post
        JOIN sub_category ON post.sub_category_id = sub_category.id
        JOIN category ON sub_category.category_id = category.id
        WHERE post.status = 'sold_out'
        GROUP BY category.name";

        $statement = $this->connection->prepare($sql);

        if ($statement->execute()) {
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $datalist = [];
            $cat_name_list = [];
            foreach ($result as $key => $value) {
                $cat_name_list[] = $value['name'];
            }
            foreach ($result as $key => $value) {
                # code...
                $datalist[] = $value['post_count'];
            }
            $dataResult = json_encode(array("data" => $datalist, "name" => $cat_name_list));
            return $dataResult;
        }
    }

    public function Total_Posts_in_each_sub_category()
    {
        $sql = "SELECT COUNT(*) AS post_count, sub_category.name 
        FROM post
        JOIN sub_category ON post.sub_category_id = sub_category.id
        GROUP BY sub_category.name;";

        $statement = $this->connection->prepare($sql);

        if ($statement->execute()) {
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $datalist = [];
            $cat_name_list = [];
            foreach ($result as $key => $value) {
                $cat_name_list[] = $value['name'];
            }
            foreach ($result as $key => $value) {
                # code...
                $datalist[] = $value['post_count'];
            }
            $dataResult = json_encode(array("data" => $datalist, "name" => $cat_name_list));
            return $dataResult;
        }
    }
}

$Report_model = new Report();

// echo "<pre>";
// var_dump($Report_model->Total_Sold_Out_Posts_in_each_category());
// echo "<pre>";