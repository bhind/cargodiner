<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/<?php echo $this->config->item('jquery_theme'); ?>/jquery-ui-1.10.1.custom.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/fbbutton.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/common.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.10.1.custom.min.js"></script>
<script type="text/javascript">
<!--
	$(function() {
		$('.jqbutton').button();
	});
//-->
</script>
<title>main menu - </title>
</head>
<body>
	<?php include('header.php'); ?>
	<h1>main menu</h1>
	<p>
	<a class='jqbutton' href='<?php echo base_url(); ?>accounts/add'>add accounts</a>
</body>
</html>