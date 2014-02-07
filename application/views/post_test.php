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
<title>post - test</title>
</head>
<body>
	<?php include('header.php'); ?>
	<h1>post test</h1>
	<form method='POST' action='<?php echo base_url(); ?>post_test/post'>
		<textarea name='post_message' rows='5' cols='10'></textarea>
		<p>
		<input type='submit' class='jqbutton' value='post'/>
	</form>
	<p>
	<a class='jqbutton' href='<?php echo base_url(); ?>auth/logout'>logout</a>
</body>
</html>