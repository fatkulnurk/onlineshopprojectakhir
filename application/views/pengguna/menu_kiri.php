<tr><td valign="top" rowspan="3" width="190px">
	<div id="content-left">
	
	<!--------------------------------POLLING----------------------------->
	<div id="subcontent-left">
	<div class="nama-content"><strong>POLLING</strong></div>
	<?php echo form_open('pengguna_polling/pilih_polling'); ?>

		<table>
		<?php foreach($query4->result_array() as $poll) { ?>
		<tr><td colspan=2><?php echo $poll['pertanyaan']; ?>
		<?php echo form_hidden('id_polling',$poll['idtanya']);?></td></tr>
		<?php } ?>
		
		<?php 
		$total=0;
		$ttle=0;
		foreach($query2->result_array() as $poll) {
		$ttle += $poll['jumlah'];
		}
		$ttl=$ttle;

		foreach($query2->result_array() as $poll) {
		$total += $poll['jumlah'];
		$nomor=$poll['nomor'];
		if($poll['jumlah']>0){
		$persen = sprintf("%01.1f",($poll['jumlah']/$ttl)*100);
		} else { $persen=0; }
		?>
		<tr><td>
		<?php if(!$lihatip->result_array()) { 
		echo form_radio('nomor',$poll['nomor']);
		
	 } 
	 echo '<font size="2px">'.$poll['jawaban']; ?></td><td><?php echo $poll['jumlah']." ($persen%)"; 
	}?> 
	</td></tr>

		<tr><td><i>Jumlah pemilih</i></td><td><i><?php  echo $total; ?></i></td></tr>
</font>
		</table>
		<?php if(!$lihatip->result_array()) {
	echo form_submit('pilih','Pilih','class=tmbl-red');
	 }?>
	<?php echo form_close(); ?>
	<p>Polling sebelumnya : </p>
	<ul>
	<?php foreach($query3->result_array() as $poll){ ?>
	<li>
	<a href="<?php echo base_url().'pengguna_polling/polling_sebelumnya/'.$poll['idtanya']?>"><?php echo $poll['pertanyaan']; ?></a>
	 <?php
	 }?>
	 </li>
	 </ul>
	 </div>
	
<!-------------------------------------Barang baru------------------------------------->

<script src="<?php echo base_url();?>asset/slideshow/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>asset/slideshow/s3Slider.js" type="text/javascript"></script>
	
	<div id="subcontent-left">
	<div class="nama-content"><strong>BARANG BARU</strong></div>
	
	<script type="text/javascript">
        $(document).ready(function() {
       $('#BUS-slider').s3Slider({
          timeOut: 3000
       });
    });
    </script>
	    <style>
    #BUS-slider {
       height: 200px;
       position: relative;
       overflow: hidden;
       margin-left: 0;
    }
    #BUS-sliderContent {
       width: 550px;
       position: absolute;
       top: 0;
       margin-left: 0;
    }
    .BUS-sliderImage {
       float: left;
       position: relative;
       display: none;  top: 0;
       border:1px solid #ddd;
    }
    .BUS-sliderImage span {
    position: absolute;
        font: 10px/15px sans-serif,Arial, Helvetica;
        padding: 10px 10px;
        background-color: #000;
        color: #fff;
        filter:'alpha(opacity=70)';
        -moz-opacity: .5;
        -khtml-opacity: .5;
        opacity: .5;
        text-align:justify;
    }
    .BUS-sliderImage span a {
    text-decoration:underline;
    color:#FE6602;
    }
    .clear {
       clear: both;
    }
    .top {
        top: 0;
        left: 0;
        width: 550px !important;
        height: 70px;
    }
    .bottom {
        bottom: 0;
        left: 0;
        width: 220px !important;
        height:50px;
    }
    .left {
        left: 0;
        top: 0;
        width: 110px !important;
        height: 335px;
    }
    .right {
        right: 0;
        bottom: 0;
        width: 110px !important;
        height: 315px;
    }
    </style>
    <br />
<div id="BUS-slider">
<div id="BUS-sliderContent">
<?php foreach($barangbaru->result_array() as $new) { ?>
<div class="BUS-sliderImage">
    <img src="<?php echo base_url().'images/'.$new['gambar']?>" width="220" />
	<a href="<?php echo base_url().'pengguna/detail_barang/'.$new['id_barang']?>">
	<span class="bottom"><h3><?php echo $new['nama_barang']; ?> </h3>

	</span></a>
    </div>
	<?php } ?>
</div>
</div>
	
	
	</div>
	
 
 <!---------------------------------------------------BUKU TAMU------------------------------------------------------->
	<div id="subcontent-left">
	<div class="nama-content"><strong>TESTIMONIAL PENGUNJUNG</strong></div>
	<br><?php 
		if (!$bukutamu->result_array()) {
		echo"<font color='red'>Data Tidak Tersedia</font>";
		}
		else {
		foreach($bukutamu->result_array() as $tamu) { ?>
		<div class="buku-tamu">
		<div class="bukutamu-nama"><?php echo $tamu['nama']; ?> </div>
		<?php echo $tamu['komentar']; ?>
		<p align="right"> <i><?php echo $tamu['tgl']; ?></i></p>
		</div><br>
		<?php }} ?>
		<a href="<?php echo base_url();?>pengguna/bukutamu">
		<?php echo form_button("","Isi Testimonial","class=tmbl-red");
		 ?> </a>
		 
	</div>
	 </div>
 </td>