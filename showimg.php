<?php
require_once "pdo.php";

$name=$_GET['username']??NULL;
$stmt = $pdo->prepare("SELECT * FROM dishes where id = :xyz");
$stmt->execute(array(":xyz" => $name));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$imgdata = $row['image'];

header("content-type: image/PNG");
echo $imgdata;
    


?>