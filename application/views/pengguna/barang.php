<td valign="top" height="60">
<?php if($this->session->flashdata('message')){?>
<p class='flashdata'> <?php echo $this->session->flashdata('message');?> </p>
<?php } ?>
    <!-- Start urut -->
    <!--
    <section class="is-content">
        <div class="columns">
            <div class="column is-6">
                <?php echo form_open('pengguna/barang').'Atur berdasarkan ';
                $options = array( 'tgl DESC' => 'Barang baru',
                    'stok ASC'  => 'Popularitas',
                    'harga ASC'    => 'Harga terendah',
                    'harga DESC'   => 'Harga tertinggi',

                );

                echo form_dropdown('urut', $options,set_value('urut'), 'class="qty"').
                    form_submit('submit','Urutkan','class=tmbl-ijo').
                    form_close();
                ?>
            </div>
            <div class="column is-6 has-text-right" id="halaman">
                <?php echo $paginator;?>
            </div>
        </div>
    </section>
    <!-- End urut -->
<br/>
    <section class="is-content">
        <div class="columns">
            <div class="column is-3 has-text-centered">
                <div class="control">
                    <p class="button">HOT</p>
                    <p class="button">BUY 2 GET 4</p>
                </div>
            </div>
            <div class="column is-7">
                <div class="field has-addons">
                    <div class="control is-expanded has-icons-left">
                        <div class="select is-info is-fullwidth">
                             <?php echo form_open('pengguna/barang').'';
                            $options = array( 'tgl DESC' => 'Barang baru',
                                              'stok ASC'  => 'Popularitas',
                                              'harga ASC'    => 'Harga terendah',
                                              'harga DESC'   => 'Harga tertinggi',

                                            );

                            echo form_dropdown('urut', $options,set_value('urut'), '').
                                '
                              </div>
                                <div class="icon is-small is-left">
                                  <i class="fa fa-tasks"></i>
                                </div>
                              </div>
                              <div class="control">'.
                                 form_submit('submit','Urutkan','class="button is-info"').
                                 form_close().'</div>
                            ';
                            ?><!--
            <div class="column is-4 has-text-centered" id="halaman">
                    <?php echo $paginator;?>
            </div>
            -->
        </div>
    </section>
</td></tr>
<td valign="top">

<?php 
	if (empty($data)){
	echo"<font color='red'>Data Tidak Tersedia</font>";
	}
	else {
	$no = 1;
	foreach($data->result_array() as $brg)
	{
?>

<div class="barang">
<?php echo form_open('pengguna/add_keranjang'); 
		  echo form_hidden('id_barang',$brg['id_barang']);
		  echo form_hidden('harga',$brg['harga']);
		  echo form_hidden('nama_barang',$brg['nama_barang']);
		  echo form_hidden('gambar',$brg['gambar']);
		  echo form_hidden('keterangan',$brg['keterangan']);
		  echo form_hidden('stok',$brg['stok']);
?>
<a href="<?php echo base_url().'pengguna/detail_barang/'.$brg['id_barang'] ?>">
<p style="text-align:center; margin:0px auto; "><strong>
<img src="<?php echo base_url().'images/'.$brg['gambar']?>" class="image is-128x128" />
<?php echo form_hidden('qty','1');
	if ($brg['stok']==0){ //jika stok habis
	echo br(2). $brg['nama_barang'].br(1)."<div class='sold' align='center'>". br(1)."Rp". number_format($brg['harga'],2,',','.')."</div></strong></p></a>";
		} //------
	else { echo  br(2)."".
				$brg['nama_barang'].br(2)."Rp ". number_format($brg['harga'],2,',','.')."<strong></p></a><br>".
			form_submit('submit','Beli', 'class="button is-info tmbl"'); }?>
		<?php echo form_close(); ?>
</div>
<?php }  } ?>
</td></tr>
<tr><td valign="top" align="center"><div id="halaman" class="content"><?php echo $paginator;?></div>
</td></tr>
	</table>
