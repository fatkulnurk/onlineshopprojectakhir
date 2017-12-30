<?php
$servername = "localhost:9806";
$username = "root";
$password = "";
$dbname = "tugaskelompokwdw";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $stmt = $conn->prepare("SELECT * from produk");
//    $stmt->execute();
//
//    // set the resulting array to associative
//    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
//        echo $v;
//    }
    $dump = json_encode($conn->query("SELECT * FROM produk")->fetchAll(PDO::FETCH_ASSOC));
    echo $dump;
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}