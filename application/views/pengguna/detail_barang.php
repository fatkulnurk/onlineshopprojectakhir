<td valign="top" colspan="2">
    <?php
    foreach($data->result_array() as $brg)
    {

    ?>
    <!-- BREADCRUMB -->
    <div class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="<?php echo base_url();?>pengguna">Beranda</a></li>
            <li><a href="<?php  echo base_url().'pengguna/kategori/'.$brg['id_produk']; ?>"><?php echo $brg['nama_produk'] ?> </a></li>
            <li class="is-active"><a href="" aria-current="page"><?php echo $brg['nama_barang']?></a></li>
        </ul>
    </div>
    <!-- BREADCRUM gagal
<font style="color : #666666; font-size: 12px; font-family: Verdana, Geneva, Arial, Helvetica, Sans-Serif;" ><a href="<?php echo base_url();?>pengguna">Beranda</a> &gt; 
<a href="<?php  echo base_url().'pengguna/kategori/'.$brg['id_produk']; ?>"><?php echo $brg['nama_produk'] ?> </a>&gt;
	<?php echo $brg['nama_barang']?> </font><br>
	-->
    <?php if($this->session->flashdata('message')){?>
        <p class='flashdata'> <?php echo $this->session->flashdata('message');?> </p>
    <?php } ?>
</td>
<tr>
    <td valign="top" class="has-text-centered">
        <img src="<?php echo base_url().'images/'.$brg['gambar'] ?>" class="gambar"/> &nbsp; &nbsp;&nbsp;
    </td>

    <?php echo form_open('pengguna/add_keranjang');
    echo form_hidden('id_barang',$brg['id_barang']);
    echo form_hidden('harga',$brg['harga']);
    echo form_hidden('nama_barang',$brg['nama_barang']);
    echo form_hidden('gambar',$brg['gambar']);
    echo form_hidden('keterangan',$brg['keterangan']);
    echo form_hidden('stok',$brg['stok']);
    ?>
    <td valign="top" >
        <div class="nama"><strong><?php echo $brg['nama_barang'];?> </strong></div>
        <table class="table">
            <tr><td>Harga </td><td>:</td><td><b>Rp <?php  echo number_format($brg['harga'],2,',','.');  ?></b></td></tr>
            <tr><td valign="top">Kategori</td><td valign="top">:</td><td><?php echo $brg['nama_produk'] ?></td></tr>
            <tr><td valign="top">Stok</td><td valign="top">:</td><td><?php echo $brg['stok'] ?> </td></tr>
            <tr><td valign="top">Keterangan</td><td valign="top">:</td><td><?php echo $brg['keterangan'] ?></td></tr>
        </table>
        <!--
        <div class="keterangan">
            <table class="table">
                <tr><td>Harga </td><td>:</td><td><b>Rp <?php  echo number_format($brg['harga'],2,',','.');  ?></b></td></tr>
                <tr><td valign="top">Kategori</td><td valign="top">:</td><td><?php echo $brg['nama_produk'] ?></td></tr>
                <tr><td valign="top">Stok</td><td valign="top">:</td><td><?php echo $brg['stok'] ?> </td></tr>
                <tr><td valign="top">Keterangan</td><td valign="top">:</td><td><?php echo $brg['keterangan'] ?></td></tr>
            </table>
        </div>
        -->
        <center>
            <?php if ($brg['stok']==0){
                echo "<div class='soldb'></div>";
            }
            else{?>
        </center>
        Jumlah Qty :<br/> <?php $qty=array('name'=>'qty',
            'id'=>'qty',
            'class'=>'input is-info',
            'size'=>'2',
            'onKeyPress'=>'return numbersonly(this, event)',
            'value'=>'1');
        echo form_input($qty);?>
        <br/>
        <?php echo "".form_submit('submit','Beli Sekarang', 'class="button is-info"'). br(3); }?>
        <?php echo form_close(); ?>
        <div id="subcontent-left" >
            <p><b>SHARE :</b></p>
            <p class="has-text-centered">
                <br>
                <a class="button is-danger is-rounded">
                    <span class="icon is-small">
                      <i class="fa fa-google-plus"></i>
                    </span><span>Gplus</span>
                </a>
                <a class="button is-link is-rounded">
                    <span class="icon is-small">
                      <i class="fa fa-facebook"></i>
                    </span><span>Facebook</span>
                </a>
                <a class="button is-info is-rounded">
                    <span class="icon is-small">
                      <i class="fa fa-twitter"></i>
                    </span><span>Twitter</span>
                </a>
                <br>
            </p>
        </div>
        <div id="subcontent-left" valign="bottom">
            <p><b>Butuh bantuan.</b></p>
            <p>Kami Selalu Siap menjawab pertanyaan anda.
                <br/>
                Hubungi Kami lewat menu contact jika butuh bantuan.
            </p
        </div>
    </td></tr>
<?php  } ?>

<tr><td  colspan ="2" valign="top" >
        <!-------------------------SLIDE BARANG----------------------------------------------->
        <link href="<?php echo base_url();?>asset/slideshow/amazon_scroller.css" rel="stylesheet" type="text/css"></link>
        <script type="text/javascript" src="<?php echo base_url();?>asset/slideshow/amazon_scroller.js"></script>
        <script language="javascript" type="text/javascript">

            $(function() {
                $("#amazon_scroller1").amazon_scroller({
                    scroller_title_show: 'enable',
                    scroller_time_interval: '4000',
                    scroller_window_background_color: "none",
                    scroller_window_padding: '10',
                    scroller_border_size: '0',
                    //scroller_border_color: '#000',
                    scroller_images_width: '150',
                    scroller_images_height: '100',
                    scroller_title_size: '12',
                    scroller_title_color: 'black',
                    scroller_show_count: '5',
                    directory: 'images'
                });
            });
        </script>



        <div class="nama-content"><strong>PILIHAN LAIN</strong></div>
        <div id="amazon_scroller1" class="amazon_scroller">
            <div class="amazon_scroller_mask">

                <ul>

                    <?php foreach($semuabarang->result_array() as $b)
                    {
                        ?>
                        <li>
                            <a href="<?php echo base_url().'pengguna/detail_barang/'.$b['id_barang'] ?>">
                                <div class="barang_slide">
                                    <p style="text-align:center; margin:0px auto;"><img src="<?php echo base_url().'images/'.$b['gambar']?>" width="125" height="150" align="middle" /></p>
                                    <p style="text-align:center;  height:40px; margin:0px auto; "><strong><?php echo $b['nama_barang']; ?> </strong>
                                        <br/><br>Rp<?php echo number_format($b['harga'],2,',','.');
                                        ?></p></div></a>
                        </li>

                        <?php
                    }
                    ?>

                </ul>

            </div>
            <ul class="amazon_scroller_nav">
                <li></li>
                <li></li>
            </ul>
            <div style="clear: both"></div>
        </div>

        <!-------------------------------------------------------------Komentar barang------------------------------------------------------------>
        <div class="nama-content"><strong>KOMENTAR DARI PELANGGAN</strong></div>
        <table class="table is-fullwidth is-bordered is-striped" width="100%">
            <tr>
                <th>No.</th>
                <th>Komentar tentang Barang</th>
                <th>Member</th>
                <th>Date</th>
            </tr>
            <?php if(!$data1->result_array()){ ?>
                <tr><td colspan="4" align="center">Tidak ada komentar</td></tr>
            <?php } else {
                $baris=1;
                foreach($data1->result_array() as $komen) {
                    if($baris%2==0) { $warna = '#F5F5F5'; }
                    else { 	$warna ='#EBEBEB'; }
                    ?>
                    <tr bgcolor="<?php echo $warna; ?>"><td><?php echo $baris; ?></td>
                        <td><?php echo $komen['komentar']; ?></td>
                        <td><?php echo $komen['nama_user'] ?></td>
                        <td align="center"><?php echo tgl_indo($komen['tgl_komentar']); ?></td></tr>
                    <?php $baris++; } } ?>

        </table>
        <?php
        if($this->session->userdata('is_logged_in') == true) {
            echo form_open('pengguna/komentar_add_exe');
            foreach($data->result_array() as $id)	{
                echo form_hidden('id_barang',$id['id_barang']);
            }
            foreach($query1->result_array() as $id)	{
                echo form_hidden('id_user',$id['id_user']);
            }
            echo form_hidden('id_brng',$id_brng);
            $today = date("Y-m-d H:i:s");
            echo form_hidden('tgl_komentar',$today);
            echo form_textarea('komentar','','class=inputan-txt');
            echo '<br>'.form_submit('kirim','KIRIM','class=tmbl');
            echo form_close();
        }
        ?>

    </td></tr>
</table>
	
