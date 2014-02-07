<?php
?>
<script type="text/javascript">
<!--
  $(function() {
    $("#repeat").buttonset();
    $("#repeat0").click(function(){document.location.href='<?php echo base_url(); ?>facade';});
    $("#button1").button();
    $("#button1").click(function(){document.location.href='<?php echo base_url(); ?>auth/logout';});
});
//-->
</script>
<div id="toolbar" class="navigator ui-widget-header ui-corner-all noradius">
	<div>
		<span id="repeat" style="float: left;">
			<input type="radio" id="repeat0" name="repeat" /><label class="noradius" for="repeat0">home</label>
			<input type="radio" id="repeat1" name="repeat" /><label class="noradius" for="repeat1">support</label>
		</span>
		<span style="float: right;">
			<?php echo $user_name; ?>
			<input class="noradius" type="button" id="button1" value="logout" style="margin: 0;"/>
		</span>
	</div>
</div>
