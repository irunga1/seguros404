<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
		<meta name="author" content="GeeksLabs">
		<meta name="keyword" content="">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet"> 
        <script src="<?php echo base_url(); ?>/public/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>/public/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>/public/js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url(); ?>/public/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/public/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>/public/assets/mask/jquery.mask.js"></script>
		<link rel="shortcut icon" href="img/favicon.png">
		<title><?php echo $title; ?></title>
		
</head>
<body>
    <header>
        <?php $this->load->view("client_header"); ?>
    </header>
        <script>
            base_url = "<?php echo base_url(); ?>"
        </script>
    
        <div class ="container-fluid">
            <div class="row">
                <div class="col-md-2">
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                    <p>
                        Con este formulario usted podrá obtener diversas cotización para su automovil.
                    </p>
                    
                </div>
                <div class="col-md-8">
                <?php $this->load->view($view) ?>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    <br>
    <br>
    <!-- <footer>
        <?php //$this->load->view("client_footer"); ?>
    </footer> -->
</body>
</html>
<style>
header, footer{
    min-height:45px;
    background-color:#45D33F;
}
body{
    
    font-family:Montserrat, Helvetica, Arial, sans-serif;
}

footer {
    background-color:black;
    bottom: 0;
    width: 100%;
    margin-top:10px;
}
#logo{
    max-width:200px;
    width:30%;
}
.container-fluid {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    background-color: #042141;
    color: #fff;
}
</style>
