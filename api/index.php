<?php
// meninclude semua class
require __DIR__.'/vendor/autoload.php';

// membuat objek baru
$app = new Slim\App;

// container untuk database
$container['db'] = function(){ 
        $servername = "localhost:9806";
        $username = "root";
        $password = "";
        $dbname = "tugaskelompokwdw";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        GLOBAL $conn;
        return $conn;
};

// KONEKSI KE DATABASE
$servername = "localhost:9806";
$username = "root";
$password = "";
$dbname = "tugaskelompokwdw";

// try connect
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}


// routing -> ketika dihalaman home
$app->get('/',function($request,$response){
    include 'index-home.php';
});

// api kategori
$app->get("/kategori/[{id}/]", function ($request,$response,$args){
    GLOBAL $conn;
    if(!empty($args['id'])){
        $dump = json_encode($conn->query("SELECT * FROM barang WHERE id_produk=$args[id]")->fetchAll(PDO::FETCH_ASSOC));
        echo htmlentities($dump);
    }else{
        $dump = json_encode($conn->query("SELECT * FROM produk")->fetchAll(PDO::FETCH_ASSOC));
        echo htmlentities($dump);
    }
});

//api list produk
$app->get("/produk/[{id}/]", function ($request,$response,$args){
    GLOBAL $conn;
    if(!empty($args['id'])){
        $dump = json_encode($conn->query("SELECT * FROM barang WHERE id_barang=$args[id]")->fetchAll(PDO::FETCH_ASSOC));
        echo htmlentities($dump);
    }else{
        $dump = json_encode($conn->query("SELECT * FROM barang")->fetchAll(PDO::FETCH_ASSOC));
        echo htmlentities($dump);
    }
});


// $app->get("/aka",function($request,$response){
//     $datas = $this->db->query("SELECT * FROM BARANG")->FetchAll(PDO::)
// });

$app->run();