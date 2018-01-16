<tr><td valign="top" rowspan="3" width="39px">

<!-------------------------------------Barang baru------------------------------------->

<script src="<?php echo base_url();?>asset/slideshow/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>asset/slideshow/s3Slider.js" type="text/javascript"></script>
	<div id="subcontent-left">
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
</div>
</div>


	</div>

 </td>
<div class="opopadding">

</div>