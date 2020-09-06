

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
      <meta name="author" content="GeeksLabs">
      <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
      <link rel="shortcut icon" href="img/favicon.png">
      <title><?php echo $title ?></title>
      <!-- Bootstrap CSS -->
      <link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">
      <!-- bootstrap theme -->
      <link href="<?php echo base_url(); ?>public/css/bootstrap-theme.css" rel="stylesheet">
      <!--external css-->
      <!-- font icon -->
      <link href="<?php echo base_url(); ?>public/css/elegant-icons-style.css" rel="stylesheet" />
      <link href="<?php echo base_url(); ?>public/css/font-awesome.css" rel="stylesheet" />
      <!-- Custom styles -->
      <link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet">
      <link href="<?php echo base_url(); ?>public/css/style-responsive.css" rel="stylesheet" />
      <script src="<?php echo base_url(); ?>/public/js/jquery.js"></script>
      <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
      <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->
      <!-- =======================================================
         Theme Name: NiceAdmin
         Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
         Author: BootstrapMade
         Author URL: https://bootstrapmade.com
         ======================================================= -->
   </head>
   <body class="login-img3-body">
      <div class="container">
          <?php
            $a = validation_errors();
            
            if($a != null){
              echo"<div class='alert alert-primary re' role='alert'>";
              echo validation_errors();
              echo "</div>";
            }
            if(isset($error)){
               echo"<div class='alert alert-primary re' role='alert'>";
               echo $error;
               echo "</div>";
             }
            if(isset($success)){
               echo"<div class='alert alert-success re' role='alert'>";
               echo $success;
               echo "</div>";
             }
           ?>
         <?php
            $attributes = array('class' => 'login-form', 'id' => 'myform');
            echo form_open(base_url("login/insertHashPost"),$attributes);?>
            
            <div class="login-wrap">
               <p class="login-img"><i class="icon_lock_alt"></i>Creacion de Clave</p>
               <small>Inserte el Codigo enviado a su correo</small>
               <div class="input-group">
                  <span class="input-group-addon"></span>
                  <?php
                    $data = array(
                      'type'  => 'text',
                      'name'  => 'hash',
                      'id'    => 'hash',
                      'value' => '',
                      'placeholder'=>'correo electronico',
                      'class' => 'form-control',
                      'required'=>'required',
                      'maxlength'=>'80'
                    );
                    echo form_input($data);

                  ?>
               </div>
               <small>Debe contener entre 8 y 16 caractres Alfa-Numericos</small>     
               <div class="input-group">
                  
                  <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                  <?php
                    $data = array(
                      'type'  => 'password',
                      'name'  => 'clave',
                      'id'    => 'clave',
                      'value' => '',
                      'placeholder'=>'',
                      'class' => 'form-control'
                    );
                    echo form_input($data);

                  ?>
               </div> 

               <div class="input-group">
                  <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                  <?php
                    $data = array(
                      'type'  => 'password',
                      'name'  => 'clave2',
                      'id'    => 'clave2',
                      'value' => '',
                      'placeholder'=>'',
                      'class' => 'form-control'
                    );
                    echo form_input($data);

                  ?>
               </div> 

               
               
               
               </label>
               <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
               
            </div>
            <?php echo form_close();?>
         <!-- login -->
         <div class="text-right">
            <div class="credits">
               <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
                  -->
               
            </div>
         </div>
      </div>
      <style>
      .alert {
          padding: 15px;
          margin-bottom: 20px;
          border: 1px solid transparent;
          border: 1px solid gray;
          background-color: #F8D7DA;
          color: #491217;
          border: 1px solid #FDD7DA;
          border-radius: 11px;
      }
      .login-form .login-img {
         font-size: 1.5em;
         font-weight: 700;
      }
      .re{
         cursor:pointer;
      }
      </style>
            <script>
         (function(){
            $(document).ready(function(){
               removeError();
            });
         })()

         removeError= function(){
            $('.re').hover(function(){
               $(this).hide("slow");
            })
         }
      </script>
   </body>
</html>

