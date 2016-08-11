<body>
 <div data-role="page">

<? 
	if(isset($_SESSION['error_msg'])):

?>
	<div data-role="popup" id="popupBasic" data-transition="slidedown"><?=$_SESSION['error_msg']?></div>

<? endif; ?>


<? $this->load->view($page);  ?>
</div><!-- /page -->
</body>
</html>