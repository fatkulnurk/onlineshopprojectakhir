<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph">

            <div class="row x_title">
                <div class="col-md-6">
                    <h3>Statistik Jumlah Produk <small>Berdasarkan kategori.</small></h3>
                </div>
                <div class="col-md-6">
                </div>
            </div>

            <div class="col-xs-12">

                <div id="chartContainer">Tunggu ... data sedang di proses.</div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>

</div>
<br/>
    <script src="<?php echo base_url();?>asset/fschart/js/fusioncharts.js"></script>
    <script src="<?php echo base_url();?>asset/fschart/js/themes/fusioncharts.theme.fint.js"></script>
<script>
    FusionCharts.ready(function(){
        var revenueChart = new FusionCharts({
            "type": "column2d",
            "renderAt": "chartContainer",
            "width": "100%",
            "height": "300",
            "dataFormat": "json",
            "dataSource": {
                "chart": {
                    "caption": "Jumlah Produk Berdasarkan Kategori",
                    "subCaption": "PT. BuyFish - Indonesia",
                    "xAxisName": "Data Menurut Kategori",
                    "yAxisName": "Jumlah dalam (angka)",
                    "theme": "fint"
                },
                " data": [

                    <?php
                    $conn = mysqli_connect('localhost','root','','tugaskelompokwdw');
                    //                        $sql = "SELECT DISTINCT id_produk FROM barang";
                    $sql = "SELECT * FROM produk";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '{
                                "label": "'.$row['nama_produk'].'"';
                            $sqlrow = mysqli_query($conn,"SELECT * FROM barang WHERE id_produk=$row[id_produk];");
                            $total = mysqli_num_rows($sqlrow);
                            echo ',"value": "'.$total.'"},';
                        }
                    }
                    ?>
                ]
            }
        });

        revenueChart.render();
    })
</script>
<script src="<?php echo base_url();?>asset/fschart/js/fusioncharts.charts.js"></script>
<script src="<?php echo base_url();?>asset/fschart/js/fusioncharts.js"></script>
<script src="<?php echo base_url();?>asset/fschart/js/fusioncharts.powercharts.js"></script>
<script src="<?php echo base_url();?>asset/fschart/js/fusioncharts.gantt.js"></script>
<script src="<?php echo base_url();?>asset/fschart/js/fusioncharts.treemap.js"></script>
<script src="<?php echo base_url();?>asset/fschart/js/fusioncharts.zoomscatter.js"></script>
<script src="<?php echo base_url();?>asset/fschart/js/fusioncharts.maps.js"></script>
<script src="<?php echo base_url();?>asset/fschart/js/fusioncharts.widgets.js"></script>
<br/>
<!--
<br>
<table width="100%" >
<tr><td>
<fieldset style="border:1px dashed #666666; padding:10px; ">
<legend><font color="#666666"><b><?php echo $title; ?></b></font></legend>
<br><br>
Selamat datang kembali, <b><?php echo $this->session->userdata('username'); ?></b><br>
<br><br><br><br><br><br><br><br><br>
</fieldset>
		 </tr></td>
</table>
-->