<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/<?php echo $this->config->item('jquery_theme'); ?>/jquery-ui-1.10.1.custom.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/fbbutton.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/common.css" />
<style type="text/css">
	body {
		background-color: #666666;
	}
</style>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.10.1.custom.min.js"></script>
<script type="text/javascript">
<!--
	$(function() {
		$('.jqbutton').button();
	});
//-->
</script>
<title>welcome - login</title>
</head>
<body>
	<img src='<?php echo base_url(); ?>images/file000393733815_s.jpg' title='motif' />
	<br>
	<button type='button' class='fbbutton' onclick='javascript:document.location.href="<?php echo base_url(); ?>auth/login";' style='font-size: 12pt; position: absolute; top: 16px; left: 16px;'>login with facebook</button>
	<img src='<?php echo base_url(); ?>images/freefont_logo_null_free_w.png' title='title' style='position: absolute; top: 192px; left: 40px; filter: alpha(opacity=50); -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=50)"; -moz-opacity: 0.5; opacity: 0.5;' />
	<img src='<?php echo base_url(); ?>images/freefont_logo_null_free.png' title='title' style='position: absolute; top: 200px; left: 48px;' />
</body>
</html>