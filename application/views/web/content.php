<body>

<div data-role="page" class="row wrapper">

<div class="my_dashboard small-12 columns" id="mydashboard">
	<div class="large-7 medium-8 small-12 columns child_my_dash" data-page="<?=$page?>">
		<div class="callout primary" id="supercallout">
			<? $this->load->view($page);  ?>
</div><!-- /page -->
</body>
</html>