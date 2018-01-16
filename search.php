<html>
<head>

    <title> BuyFish - Pencarian</title>
    <!-- Css Bulma & fontawesome-->
    <link rel="stylesheet" type="text/css" href="http://localhost/teen25/asset/bulma/style.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/teen25/asset/font-awesome/css/font-awesome.css">

    <!-- Costum css -->
    <link rel="stylesheet" type="text/css" href="http://localhost/teen25/asset/css/style.css"  />

    <!-- bulma costum
            background-image: radial-gradient(circle 78px at left, #16d9e3 0%, #31bfe4 47%, #46aef7 100%);
     -->
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,300italic,500,700) !important;
        body{
            background: #e3e3e3;
        }
        .herohead{
            width: 100% !important;
        }
        .heroheadnew{

            background-image: linear-gradient(-20deg, #b721ff 0%, #207dfd 80%);
            background: #03a0ed;
            width: 100% !important;
        }
        .bannergoblok{
            z-index: 692;
            float:left;
            margin-left:-43px;
        }
        .opopadding{
            padding-left: 18px;
        }
        .form-search{
            background-color: #0c8fea;
            color: white !important;
            border:white solid 1px;
            width: 100%;
            border-radius: 25px;
        }
        .form-search:hover{
            border:white solid 1px !important;
            color: white;

        }


        hero.is-small .hero-body {
            padding-bottom: 0rem;
            padding-top: 0.4rem;
        }
        .hero.is-small > .hero-body {
            padding-bottom: 0rem;
            padding-top: 0.49rem;
        }
        #subcontent-left{
            background: #e3e3e3;
            border: none;
        }
    </style>

    <!-- js import -->
    <script src="http://localhost/teen25/asset/css/ddmenu.js" type="text/javascript"></script>
    <link rel="shortcut icon" href="http://localhost/teen25/asset/img/icon.png" />
    <script src="http://localhost/teen25/asset/css/jquery.validate.js"></script>

    <script src="http://localhost/teen25/asset/js/jquery.min.js" type="text/javascript"></script>


    <script>
        $(document).ready(function(){
            $("#formku").validate();
        });
    </script>

    <style type="text/css">
        label.error {
            color: red; padding-left: .5em;
        }
    </style>
    <script>

        var emailfilter = /^\w+[\+\.\w\-]*@([\w\-]+\.)*\w+[\w\-]*\.([a-z]{2,4}|\d+)$/ig;

        function checkmail(e) {
            var checkval = emailfilter.test(e.value);
            if (checkval == false) {
                alert("ID Email tidak valid!");
                e.select();
            }
            return checkval;
        }

    </script>

    <SCRIPT TYPE="text/javascript">
        <!--
        // copyright 1999 Idocs, Inc. http://www.idocs.com
        // Distribute this script freely but keep this notice in place
        function numbersonly(myfield, e, dec)
        {
            var key;
            var keychar;

            if (window.event)
                key = window.event.keyCode;
            else if (e)
                key = e.which;
            else
                return true;
            keychar = String.fromCharCode(key);

// control keys
            if ((key==null) || (key==0) || (key==8) ||
                (key==9) || (key==13) || (key==27) )
                return true;

// numbers
            else if ((("0123456789").indexOf(keychar) > -1))
                return true;

// decimal point jump
            else if (dec && (keychar == "."))
            {
                myfield.form.elements[dec].focus();
                return false;
            }
            else
                return false;
        }

        //-->
    </SCRIPT>



</head>
<body>

<nav class="navbar">
    <section class="hero herohead is-link is-small">
        <div class="hero-body">
            <div class="columns">
                <div class="column is-2 has-text-centered">
                    <a href="http://localhost/teen25/"><img src="http://localhost/teen25//asset/images/logo.png"></a>
                </div>
                <div class="column is-6">
                    <form action="http://localhost/teen25/search.php" method="get">
                        <div class="field has-addons has-addons-centered">
                            <div class="control is-expanded is-outlined">
                                <input class="input is-white form-search" name="query" type="text" placeholder="Masukan nama produk...">
                            </div>
                            <p class="control">
                                <input type="submit" class="button is-grey form-search-button" value="Search">
                            </p>
                        </div>
                    </form>
                </div>
                <div class="column is-2 has-text-right is-hidden-tablet-only is-hidden-mobile">
                    <a href="http://localhost/teen25/" class="button is-light">
                        <span class="icon is-large">
                          <i class="fa fa-gift"></i>
                        </span>
                    </a>
                    <a class="button" href="http://localhost/teen25/pengguna/keranjang">
                        <span class="icon is-small">
                          <i class="fa fa-shopping-bag"></i>
                        </span>
                    </a>
                </div>
                <div class="column is-2 has-text-right is-hidden-tablet-only is-hidden-mobile">
                    <a href="http://localhost/teen25/pengguna_akun/akun" class="button is-info is-rounded">admin</a>                            <a href="http://localhost/teen25/pengguna_akun/logout" class="button is-light">Log Out</a>
                </div>
            </div>
        </div>
    </section>
</nav>
<nav class="navbar herohead is-link is-small">
    <div id="navbarExampleTransparentExample" class="navbar-menu container">
        <div class="navbar-start">
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="">
                    <strong>
                    <span class="icon is-small">
                        <i class="fa fa-tasks"></i>
                    </span>
                        KATEGORI
                    </strong>
                </a>
                <div class="navbar-dropdown">
                    <a class="navbar-item" href="http://localhost/teen25/pengguna/kategori/3">Ikan Hias</a>
                    <a class="navbar-item" href="http://localhost/teen25/pengguna/kategori/13">Ikan Tambak</a>
                    <a class="navbar-item" href="http://localhost/teen25/pengguna/kategori/14">Ikan Ternak</a>
                    <a class="navbar-item" href="http://localhost/teen25/pengguna/kategori/33">Ikan Unik</a>
                </div>
            </div>
            <a class="navbar-item" href="http://localhost/teen25/pengguna_akun/konfirm_pembayaran/">
                <strong>
                <span class="icon is-small">
                    <i class="fa fa-whatsapp"></i>
                </span> KONFIRMASI
                </strong>
            </a>
            <a class="navbar-item" href="http://localhost/teen25/pengguna/pengiriman">
                <strong>
                <span class="icon is-small">
                    <i class="fa fa-truck"></i>
                </span> PENGIRIMAN
                </strong>
            </a>
            <a class="navbar-item" href="http://localhost/teen25/pengguna/carapembayaran">
                <strong>
                <span class="icon is-small">
                    <i class="fa fa-money"></i>
                </span> CARA BAYAR
                </strong>
            </a>
            <a class="navbar-item" href="http://localhost/teen25/">
                <strong>
                <span class="icon is-small">
                    <i class="fa fa-rss"></i>
                </span> RSS
                </strong>
            </a>
        </div>
    </div>
</nav>

<section class="section content container">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tugaskelompokwdw";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if(isset($_GET['query'])){
    $keynya = $_GET['query'];
    $sql = "SELECT * from barang WHERE nama_barang LIKE '%$keynya%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
// output data of each row
        while($row = $result->fetch_assoc()) {
            echo '
        <div class="columns">
            <div class="column is-3 has-text-centered"><img src="http://localhost/teen25/images/'.$row["gambar"].'" height="120px" width="120px"></div>
            <div class="column is-6">
                <a href="index.php?id=7"><h2 class="title is-4">'.$row["nama_barang"].'</h2></a>
                <p>
                    <div class="columns">
                        <div class="column is-6">
                            <strong>STOK</strong> : '.$row["stok"].' <br/>
                            <strong>TANGGAL</strong> : '.$row["tgl"].' <br/>
                        </div>
                        <div class="column is-6"> 
                            <strong>KETERANGAN</strong> :'.$row["keterangan"].' <br/>
                        </div>
                    </div>
                </p>
            </div>
            <div class="column is-3">
                 <strong>Rp</strong> : '.$row["harga"].' <br/>
                 <strong><i class="fa fa-map-marker"></i> </strong> ID, Surabaya <br/>
                 <br>
                 <p class="has-text-centered">
                    <a href="http://localhost/teen25/pengguna/detail_barang/'.$row["id_barang"].'" class="button is-info is-fullwidth"> <span class="icon"><i class="fa fa-shopping-bag"></i></span><span>Belanja</span></a>
                 </p>
            </div>
        </div>
        <hr>
        ';
        }
    } else {
        echo "Hasil tidak ada ...";
    }
}else{

}


$conn->close();
?>
</section>
<?php
include "application/views/pengguna/footer.php";