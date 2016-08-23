<footer>
	<? if(isset($tutorial)): ?>
		<div id="start_tutorial"></div>
	<? endif; ?>
</footer>
<div class="modal"><!--  bottom of page --></div>
<? if($this->config->item('css_fw') == "jqm"): ?>
    <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.mobile-1.4.5.min.js"></script>
<? elseif($this->config->item('css_fw') === "foundation"): ?>
	<script src="<?=base_url()?>assets/js/vendor/jquery.js"></script>
	<script src="<?=base_url()?>assets/js/foundation/what-input.js"></script>
	<script src="<?=base_url()?>assets/js/foundation/foundation.min.js"></script>
	<script>
	  $(document).foundation();
	</script>
<? endif; ?>
<?php if (isset($extraFooterContent)) {echo $extraFooterContent;} ?>  
<script src="<?=base_url()?>assets/js/jquery.alerts.js"></script>
<script src="<?=base_url()?>assets/js/app.js"></script>