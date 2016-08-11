<body>
 <div data-role="page">

<? if(isset($txt['header'])): ?>

	<div data-role="header">
	    <h1><?=$txt['header']?></h1>
	</div><!-- /header -->

<? endif; ?>

<? $this->load->view($page);  ?>
</div><!-- /page -->
</body>
</html>