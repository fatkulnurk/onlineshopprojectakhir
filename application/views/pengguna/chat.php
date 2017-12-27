<?php
$you = "aku";
?>
<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url(); ?>asset/css/chat.css" />

<div id="main_container">

<a href="javascript:void(0)" onClick="javascript:chatWith('<?php echo $you; ?>')">Chat With <?php echo $you; ?></a>
<!-- YOUR BODY HERE -->

</div>

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/chat.js"></script>
