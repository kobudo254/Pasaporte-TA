<footer>
</footer>
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
<script src="<?=base_url()?>assets/js/app.js"></script>