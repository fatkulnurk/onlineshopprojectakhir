<?php
// Create connection
$conn=mysqli_connect("localhost","root","","tugaskelompokwdw");


header( "Content-type: text/xml");

echo "<?xml version='1.0' encoding='UTF-8'?>
 <rss version='2.0'>
 <channel>
 <title>BF - BuyFish</title>
 <link>http://localhost/teen25</link>
 <description>RSS TOKO ONLINE IKAN TERBESAR SEINDONESIA.</description>
 <language>en-us</language>";

$sql = "SELECT * from barang";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
// output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
        <item>
           <title>".$row["nama_barang"]."</title>
           <link>http://localhost/teen25/pengguna/detail_barang/".$row["id_barang"]."</link>
           <description>".$row["keterangan"]."</description>
        </item>
           ";
    }
}

echo "</channel></rss>";
