<!DOCTYPE html>
<html lang="en">

 <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
		<meta name="author" content="GeeksLabs">
		<meta name="keyword"
			content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
		<link rel="shortcut icon" href="img/favicon.png">

		<title></title>

		
		<!-- <link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link href="<?php echo base_url(); ?>public/css/bootstrap-theme.css" rel="stylesheet">

		<link href="<?php echo base_url(); ?>public/css/elegant-icons-style.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>public/css/font-awesome.min.css" rel="stylesheet" />

		<link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>public/css/style-responsive.css" rel="stylesheet" />

		

		


	</head> 
<body>
	<section id="container" class="">
		<?php $this->load->view("template_header"); ?>
		<section id="main-content">
			<section class="wrapper">
				<div class="row">
					<div class="col-lg-12">
					
						<h3 class="page-header"><i class="fa fa fa-bars"></i> <?php echo  (isset($title)) ? $title : "default";?></h3>
						<ol class="breadcrumb">
							<?php
								  //$brdc = array();
								if(isset($breadcrumb)){
									$brdc =  explode(",",$breadcrumb);
								}
								else{
									$brdc[0] = "Inicio";
									$brdc[1] = "Index";

								}
								
								
							?>
							<li><i class="fa fa-home"></i><a href=""><?php echo $brdc[0]; ?></a></li>
							<li><i class="fa fa-bars"></i><?php echo $brdc[1]; ?></li>
							
						</ol>
					</div>
				</div>
				<!-- page start-->
				<?php $view = (isset($view)) ? $view : "default/default";?>
				<script src="<?php echo base_url(); ?>/public/js/jquery.js"></script>
				<!-- <script>$.noConflict();</script> -->
				<!-- <script src="<?php echo base_url(); ?>/public/js/bootstrap.min.js"></script> -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
				<script src="<?php echo base_url(); ?>/public/js/jquery.scrollTo.min.js"></script>
				<script src="<?php echo base_url(); ?>/public/js/jquery.nicescroll.js" type="text/javascript"></script>
				<script src="<?php echo base_url(); ?>/public/js/scripts.js"></script>
				<script src="<?php echo base_url(); ?>/public/assets/mask/jquery.mask.js"></script>
				<?php $this->load->view($view) ?>
				<!-- page end-->
			</section>
		</section>
		<!--main content end-->
		<div class="text-right">
			<div class="credits">
				<!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
				<!-- Developed by <a href="https://bootstrapmade.com/"> www.sin404.com</a> -->
			</div>
		</div>
		<?php $this->load->view("template_footer"); ?>			
	</section>
</body>
<style>
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
	border-radius: 0px !important;
}
div.form-div input[type="email"],div.form-div input[type="tel"]{
    font-size: 15px;
    width: 500px;
    height: 20px;
    border: 1px solid #AAA;
    padding: 5px 5px 5px 5px;
    background:#fafafa;
}
</style>
<script>
	base_url = "<?php echo base_url();?>";
</script>

<script>
(function(){
	$(document).ready(function(){
		
		$('.toggle-nav').click(function(){
			$('#sidebar').toggle(); 
			a = $("#main-content").css("margin-left");
			if(a == "0px"){
				$("#main-content").css({"margin-left": "180px"});
				
			}
			else{
				$("#main-content").css({"margin-left": "0px"});
				
			}
		});

		$('.sub-menu .sub').hide();
		$('.sub-menu').click(function(){
			id ="#"+ $(this).attr("id")+" .sub";
			$(id).toggle();
			
		});
		autoclick();
	});
})()
autoclick =function(){
	a = document.URL;
	b = a.split("/");
	c = b.length
	d = b[c-2]
	if(d == "Catalogo"){
		$("#it-8").click();
	}
	if(d =="tipovehiculo"){
		$("#it-8").click();
	}
	if(d =="marcavehiculo"){
		$("#it-8").click();
	}
	if(d =="aseguradora"){
		$("#it-8").click();
	}
	if(d =="tipotarifa"){
		$("#it-5").click();
	}
	if(d =="tiposeguro"){
		$("#it-5").click();
	}
	if(d =="config"){
		$("#it-5").click();
	}
	if(d =="usuarios"){
		$("#it-14").click();
	}
	if(d =="rolusuario"){
		$("#it-14").click();
	}



}




</script>

</html>
