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
		$('.jqbutton').button({ 'disabled': true });
		$('#iveread').change(function(){ 
			$('.jqbutton').button( this.checked?'enable':'disable');
		});
});
//-->
</script>
<title>registration - confirmation</title>
</head>
<body>
	<h1>agreement for the provision of services</h1>
	<iframe src='<?php echo base_url(); ?>contents/terms_and_conditions.html'></iframe>
	<p>
	<input type="checkbox" id='iveread'><label for='iveread'>i've read the terms and conditions</label>
	<p>
	<a class='jqbutton' href='<?php echo base_url(); ?>auth/regist'>accept</a>
	<a class='jqbutton' href='<?php echo base_url(); ?>'>decline</a>
</body>
</html>