<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/<?php echo $this->config->item('jquery_theme'); ?>/jquery-ui-1.10.1.custom.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/fbbutton.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/common.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.10.1.custom.min.js"></script>
<!-- for facebook app requests -->
<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>
<script type="text/javascript">
<!--
	$(function() {
		$('.jqbutton').button();
	});
	FB.init({
		'appId': '<?php echo $this->config->item('fb_appId'); ?>',
		'status': true,
		'cookie': true,
		'xfbml': true
	});
	function fb_invite(to_uid) {
		FB.ui({
			'method': 'apprequests',
			'message': 'plz check this app',
			'to': to_uid,
			'filter': ['app_non_users']
		}, fb_callback);
	}
	function fb_callback(response) {
		// FIXME handling error
		document.location.reload(true);
	}

//-->
</script>
<title>accounts - select</title>
</head>
<body>
	<?php include('header.php'); ?>
	<h1>accounts select</h1>
	<form method='POST' action='<?php echo base_url(); ?>accounts/add_confirm'>
		<table>
			<tbody>
				<?php foreach($user_friends as $value) { ?>
				<tr>
					<td><input type='radio' name='uid_installed' value='<?php echo $value['uid'].';;'.$value['is_app_user'] ?>' <?php /*if(!$value['is_app_user']) echo 'disabled';*/ ?>/></td>
				<td><img src='<?php echo $value['pic_square'] ?>' title='pic_square'/></td>
					<td><?php echo $value['name'] ?></td>
					<td><?php echo $value['is_app_user']?'installed':'<input type=\'button\' class=\'jqbutton\' value=\'invite\' onclick=\'javascript: fb_invite("'.$value['uid'].'");\'>' ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<p>
		<input type='submit' class='jqbutton' value='next'/>
	</form>
</body>
</html>