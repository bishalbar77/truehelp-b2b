<?php

//fetch.php;

$data = array();

if(isset($_GET["query"]))
{
 $connect = new PDO("mysql:host=truehelp.cs0fysp8nud0.ap-south-1.rds.amazonaws.com; dbname=truehelp_dev", "truehelp", "4Hf-ZJJ-W6f-zXn");

 $query = "
 SELECT first_name FROM employees 
 WHERE country_name LIKE '".$_GET["query"]."%' 
 ORDER BY first_name ASC 
 LIMIT 15
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row["first_name"];
 }
}

echo json_encode($data);

?>