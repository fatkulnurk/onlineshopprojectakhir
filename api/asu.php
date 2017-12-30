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
    $url = $_SERVER['HTTP_HOST']."/teen25";
    echo '
        <!HTML DOCTYPE>
        <html>
            <head>
                <title>Open Api</title>
                <!-- Css Bulma & fontawesome-->
                <link rel="stylesheet" type="text/css" href="http://localhost/teen25/asset/bulma/style.css"> 
                <style>
      @import url(https://fonts.googleapis.com/css?family=Roboto:400,300italic,500,700);
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        
        body {
            background-image: linear-gradient(40deg, #f5576c 0%, #f093fb 100%);
            letter-spacing: 1px;
            color: #FFFFFF;
        }
        
        .temizle {
            clear: both;
        }
        
        #kapsa {
            width: 100%;
            max-width: 800px;
            margin: 15px auto 15px auto;
            opacity: 0.9;
        }
        
        #ust {
            background: #CEF3DD;
            height: 30px;
            line-height: 30px;
            border-radius: 15px 15px 0 0;
            padding-right: 10px;
            padding-left: 14px;
        }
        
        #baslik {
            display: inline-block;
            color: darkslategrey;
        }
        
        #islem {
            float: right;
        }
        
        #y {
            background: #03d544;
            width: 12px;
            height: 12px;
            border-radius: 100%;
            display: inline-block;
            margin: 0 2px;
            cursor: pointer;
        }
        
        #s {
            background: #ffbe03;
            width: 12px;
            height: 12px;
            border-radius: 100%;
            display: inline-block;
            margin: 0 2px;
            cursor: pointer;
        }
        
        #k {
            background: #ff4545;
            width: 12px;
            height: 12px;
            border-radius: 100%;
            display: inline-block;
            margin: 0 2px;
            cursor: pointer;
        }
        /* Orta Kısım */
        
        #no {
            width: 41px;
            background: #263238;
            text-align: right;
            padding: 7px 10px 7px 0;
            float: left;
            color: #cdd3de;
        }
        
        .numara {
            display: block;
        }
        
        #satir {
            background: #1B2225;
            color: #cdd3de;
            display: inline-block;
            padding: 7px 10px;
            width: calc(100% - 41px);
        }
        
        .yorum {
            color: #98A8B5;
            font-weight: 400;
            display: block;
        }
        
        .yorum a {
            text-decoration: none;
            border-bottom: 1px dotted;
            color: aquamarine;
            font-weight: 400;
            font-style: italic;
        }
        
        .cl {
            color: #8EDCF5;
        }
        
        .id {
            color: #F3A5F7;
        }
        
        .beyaz {
            color: #cccccc;
        }
        
        .secici {
            color: #CDFF8E;
        }
        
        .ozellik {
            color: #FFFFFF;
        }
        
        .onemli {
            color: #FFA9A9;
            font-style: italic;
        }
        
        #alt {
            background: #CEF3DD;
            height: 30px;
            line-height: 30px;
            border-radius: 0 0 15px 15px;
            padding-right: 10px;
            text-align: center;
        }
        
        #alt a {
            margin-left: 5px;
            border-bottom: 1px dotted;
            text-decoration: none;
            color: #213738;
        }
    </style>
            </head>
            <body>
            <div class="columns">
            <div class="column is-2">
            </div>
            <div class="column is-8">
        ';
    echo '
        <div class="hero">
            <div class="hero-body has-text-centered">
            <h1 class="title is-1">Open Api</h1>
            <h2 class="subtitle is-4">Semua yang anda butuhkan tersedia.</h2> 
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
            </div>
        </div>
    <div class="content">
  <h2>Semua Produk</h2> 
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices eleifend gravida, nulla nunc varius lectus, nec rutrum justo nibh eu lectus. Ut vulputate semper dui.</p>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices eleifend gravida, nulla nunc varius lectus, nec rutrum justo nibh eu lectus. Ut vulputate semper dui.</p>
  <pre>http://'.$url.'/api/produk/</pre>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices eleifend gravida, nulla nunc varius lectus, nec rutrum justo nibh eu lectus. Ut vulputate semper dui.</p>
  
  <h2>Detail Produk</h2> 
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices eleifend gravida, nulla nunc varius lectus, nec rutrum justo nibh eu lectus. Ut vulputate semper dui.</p>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices eleifend gravida, nulla nunc varius lectus, nec rutrum justo nibh eu lectus. Ut vulputate semper dui.</p>
  <pre>http://'.$url.'/api/produk/{id}/</pre>
  
  
  <h2>Kategori</h2>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices eleifend gravida, nulla nunc varius lectus, nec rutrum justo nibh eu lectus. Ut vulputate semper dui.</p>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices eleifend gravida, nulla nunc varius lectus, nec rutrum justo nibh eu lectus. Ut vulputate semper dui.</p>
  <pre>http://'.$url.'/api/kategori/</pre>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices eleifend gravida, nulla nunc varius lectus, nec rutrum justo nibh eu lectus. Ut vulputate semper dui.</p>
  
  <h2>Produk Berdasarkan Kategori</h2> 
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices eleifend gravida, nulla nunc varius lectus, nec rutrum justo nibh eu lectus. Ut vulputate semper dui.</p>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices eleifend gravida, nulla nunc varius lectus, nec rutrum justo nibh eu lectus. Ut vulputate semper dui.</p>
  <pre>http://'.$url.'/api/kategori/{id}/</pre>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices eleifend gravida, nulla nunc varius lectus, nec rutrum justo nibh eu lectus. Ut vulputate semper dui.</p>
  
  <h2>Top Item</h2> 
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices eleifend gravida, nulla nunc varius lectus, nec rutrum justo nibh eu lectus. Ut vulputate semper dui.</p>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices eleifend gravida, nulla nunc varius lectus, nec rutrum justo nibh eu lectus. Ut vulputate semper dui.</p>
  <pre>Coming Soon</pre>
  
  <h2>Contoh Program</h2> 
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices eleifend gravida, nulla nunc varius lectus, nec rutrum justo nibh eu lectus. Ut vulputate semper dui.</p>
  <div id="kapsa">

        <div id="ust"> 
            <div id="islem">
                <div id="y"></div>
                <div id="s"></div>
                <div id="k"></div>
            </div>
            <div class="temizle"></div>
        </div>

        <div id="orta">

            <div id="no">
                <span class="numara">1</span>
                <span class="numara">2</span>
                <span class="numara">3</span>
                <span class="numara">4</span>
                <span class="numara">5</span>
                <span class="numara">6</span>
                <span class="numara">7</span>
                <span class="numara">8</span>
                <span class="numara">9</span>
                <!--
                <span class="numara">10</span>
                <span class="numara">11</span>
                <span class="numara">12</span>
                <span class="numara">13</span>
                <span class="numara">14</span>
                <span class="numara">15</span>
                <span class="numara">16</span>
                <span class="numara">17</span>
                <span class="numara">18</span>
                <span class="numara">19</span>
                <span class="numara">20</span>
                <span class="numara">21</span>
                <span class="numara">22</span>
                <span class="numara">23</span>
                <span class="numara">24</span>
                <span class="numara">25</span>
                <span class="numara">26</span>
                <span class="numara">27</span>
                <span class="numara">28</span>
                <span class="numara">29</span>
                <span class="numara">30</span>
                <span class="numara">31</span>
                <span class="numara">32</span>
                <span class="numara">33</span>
                -->


            </div>

            <div id="satir">
                <span class="secici">$string</span> = <span class="cl">file_get_contents("<span><span class="beyaz">http://'.$url.'/api/{yang-anda-mau}</span><span class="cl">");</span>
                <br/>
                <span class="secici">$json_a</span> = json_decode(<span class="secici">$string, true</span>);
                <br/>
                foreach (<span class="ozellik">$json_a as $key => $val</span>) { <br/>
                if(is_array(<span class="ozellik">$val</span>)) { 
                <br/>
                    <span class="secici">&nbsp;&nbsp;&nbsp;echo "$key:\n"; </span>
                    <br/>
                } else { 
                <br/>
                     <span class="ozellik">&nbsp;&nbsp;&nbsp;echo "$key => $val\n";</span>
                     <br/>
                } 
                <br/> 
                <br/>
            <!--
                <span class="yorum">/*<br>&nbsp;&nbsp;&nbsp; Here Is My Profile -> <a href="https://codepen.io/codery">Yasin Softaoğlu</a> <br>*/</span>
                <br>
                <span class="cl">.kisisel</span>
                <br>
                <span class="beyaz">{</span>
                <br>

                <span class="secici">&nbsp;&nbsp;&nbsp;ad</span> <span class="beyaz">:</span>
                <span class="ozellik">&nbsp;Yasin</span><span class="beyaz">;</span>
                <br>


                <span class="secici">&nbsp;&nbsp;&nbsp;soyad</span> <span class="beyaz">:</span>
                <span class="ozellik">&nbsp;Softaoğlu</span><span class="beyaz">;</span>
                <br>


                <span class="secici">&nbsp;&nbsp;&nbsp;yas</span> <span class="beyaz">:</span>
                <span class="ozellik">&nbsp;19</span><span class="beyaz">;</span>
                <br>

                <span class="secici">&nbsp;&nbsp;&nbsp;hayat</span> <span class="beyaz">:</span>
                <span class="ozellik">&nbsp;aile <span class="onemli">!important</span></span><span class="beyaz">;</span>
                <br>
                <span class="beyaz">}</span>
                <br>
                <br>

                <span class="cl">.egitim</span>
                <br>
                <span class="beyaz">{</span>
                <br>

                <span class="secici">&nbsp;&nbsp;&nbsp;konum</span> <span class="beyaz">:</span>
                <span class="ozellik">&nbsp;manisa</span><span class="beyaz">;</span>
                <span class="yorum" style="display:inline-block;">&nbsp;/* Memleket Aydın */</span>
                <br>

                <span class="secici">&nbsp;&nbsp;&nbsp;okul</span> <span class="beyaz">:</span>
                <span class="ozellik">&nbsp;cbü</span><span class="beyaz">;</span>
                <br>

                <span class="secici">&nbsp;&nbsp;&nbsp;bolum</span> <span class="beyaz">:</span>
                <span class="ozellik">&nbsp;<font color="#D6FF00">"Yazılım Mühendisliği"</font></span><span class="beyaz">;</span>
                <br>

                <span class="beyaz">}</span>  
                <span class="id">#en-sevdigim-soz</span>
                <br>
                <span class="beyaz">{</span>
                <br>

                <span class="secici">&nbsp;&nbsp;&nbsp;content</span> <span class="beyaz">:</span>
                <span class="ozellik">&nbsp;<font color="#D6FF00">"Your future is created by what you do today not tomorrow."</font></span><span class="beyaz">;</span>
                <br>

                <span class="beyaz">}</span>
                -->

            </div>

            <div class="temizle"></div>
        </div>

    ';
    echo '</div></div class="column is-2"></div></div>';
    echo '
        <footer class="footer has-text-centered has-text-black">
            <p>&copy; 2017 Open Api, dibuat menggunakan SlimFramework</p>
        </footer>
            </body>
        </html>
';
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

$app->run();