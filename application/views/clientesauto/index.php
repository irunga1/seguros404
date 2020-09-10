<h3>
	Cotizador de Vehiculos
</h3>
<!-- <form action="" method="post"> -->
<?php
// echo "<pre>";
// print_r($post);
// echo "</pre>";

 ?>
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

           ?>

<?php $attributes = array('class' => 'segurosauto', 'id' => 'segurosauto'); 
    echo form_open(base_url("clienteautos/indexpost"), $attributes);
?>



<div class="form-group">
	<div class="row">
		<div class="col-md-6">
			<h4>Datos Personales</h4>
			<label for="">Nombre <span class="asterisco">*</span></label>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input required type="text" name="Nombre" maxlength="145" class="form-control" id="Nombre"
					placeholder="Ingrese Nombre" value="<?php echo (isset($post))?$post["Nombre"]:"" ?>">
			</div>
			<label for="">Nit <span class="asterisco">*</span></label>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
				<input required type="text" name="Nit" maxlength="8" class="form-control" id="Nit"
					placeholder="Ingrese N.I.T. sin guiones" value="<?php echo (isset($post))?$post["Nit"]:"" ?>">
			</div>
			<label for="">Email <span class="asterisco">*</span></label>
			<div class="input-group">
				<span class="input-group-addon">@</span>
				<input required type="email" name="Email" class="form-control" id="Email" placeholder="Ingrese Correo" value="<?php echo (isset($post))?$post["Email"]:"" ?>">
			</div>
			<label for="">Teléfono <span class="asterisco">*</span></label>
			<div class="input-group">
				<span class="input-group-addon">#</span>
				<input required type="tel" name="telefono" class="form-control" maxlength="10" id="telefono" placeholder="Ingrese Numero de Teléfono" value="<?php echo (isset($post))?$post["telefono"]:"" ?>">
			</div>


		</div>
		<div class="col-md-6">
			<h4>Datos del Vehiculo</h4>
			<label for="">T. Vehículo <span class="asterisco">*</span></label>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-plus-sign"></i></span>
				<select required name="Tipovehiculo" id="make" class="form-control">
					<?php foreach($tipovehiculo as $it){
					if(isset($post['Tipovehiculo'])){
						$a = ($post['Tipovehiculo']== $it->tipovehiculo_id)?"selected":"";		
					}
					else{
						$a = "";		
					}	
					
                    echo "<option class='vehicle-search' value='$it->tipovehiculo_id'>$it->descripcion</option>";
                	}
                ?>
				</select>
			</div>

			<label for="">Marca <span class="asterisco">*</span></label>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-plus-sign"></i></span>
				<select required name="Marca" id="make" class="form-control">
					<?php foreach($marcas as $it){
							if(isset($post['Marca'])){
								$a = ($post['Marca']== $it->marca_id)?"selected":"";		
							}
							else{
								$a = "";		
							}	
												
							
                        	echo "<option $a class='vehicle-search' value='$it->marca_id'>$it->nombremarca</option>";
                        }
                    ?>
				</select>
			</div>
			<label for="">Línea <span class="asterisco">*</span></label>
			<div class="input-group">

				<span class="input-group-addon"><i class="glyphicon glyphicon-folder-open"></i></span>
				<input required type="text" name="Linea" maxlength="50" class="form-control" id="Linea"
					placeholder="Ingrese Linea" value="<?php echo (isset($post))?$post["Linea"]:"" ?>">
			</div>
			<label for="">Modelo <span class="asterisco">*</span></label>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				<select name="Modelo" id="Modelo" class ="form-control">
				<?php
					for($i=21;$i>0;$i--){
						$temp = $year -$i;
						if(isset($post['Modelo'])){
							$a = ($post['Modelo']== $temp)?"selected":"";
						}
						else{
							$a = "";		
						}			
						echo "<option $a value=$temp>".$temp."</option>";
					}
				?>		
				</select>
				
			</div>
			<label for="">Valor <span class="asterisco">*</span> </label>
			<div class="input-group">
				<span class="input-group-addon">Q</span>
				<input required type="text" name="Valor" maxlength="14" class="form-control" id="Valor"
					placeholder="Ingrese Valor" value="<?php echo (isset($post))?$post["Valor"]:"" ?>">
			</div>
			<div class="input-group">
				<?php 
				$cont=0;
				foreach($clasesguro as $it){
					$test = ($cont==0)?"checked":"";
					$str ="<div class='sinline'>";
					$str .="<label class='radio-inline '>";
					$str .="    <input $test type='radio' name ='clase_seguro' value='$it->nombre' name='optradio'> $it->nombre";
					$str .="</label>";
					$str .=" ";
					$str.="</div>";
					echo $str;
					$cont++;
				}?>
			</div>

		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-6"></div>
		<div class="col-md-6">

		</div>

	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-md-2"><label for="">Captcha <span class="asterisco">*</span></label></div>
		<div class="col-md-4">
			<?php         
            $captcha = $this->captcha->generateString(); 
            $this->session->set_userdata(["captcha"=> $captcha]);
            $this->captcha->generateImage(base_url());
        ?>
		</div>
		<div class="col-md-3">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input required type="text" name="captcha" maxlength="8" class="form-control" id="Valor"
					placeholder="Ingrese el valor de la  imagen">
			</div>
		</div>
        <div class="col-md-3">
                <button class="btn btn-info" id="enviar">
                    <i class="glyphicon glyphicon-cloud-upload"></i> Cotiza ya
                </button>
        </div>
	</div>
</div>

<br>
<!-- <button class="btn btn-info" id="enviar">
	<i class="glyphicon glyphicon-cloud-upload"></i> Solicitar Cotización

</button> -->
<?php echo  form_close();?>

<style>
	.asterisco {
		color: red;
	}

	.form-control {
		border-radius: 0;
	}

	#captcha {
		/* width: 110px; */
	}

	.input-group-addon {
		border-radius: 0 !important;
	}
	.alert {
		padding: 15px;
		margin-bottom: 20px;
		border: 1px solid #d5181800;
		border-radius: 4px;
		border: 1px solid #FDD7DA;
		background-color: #F8D7DA;
		color: #491217;
		cursor: pointer
	}
	.sinline {
		display: inline-block;
		/* border: 1px solid gray; */
		width: 50%;
		text-align: center;
	}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>
<script>
	(function () {
		$(document).ready(function () {
			removeError();
			onlyNumber();
			onlyNumber2();
			changeValor();
		});
	})();

	removeError = function () {
		$('.re').hover(function () {
			$(this).hide("slow");
		})
	}
	onlyNumber =function(){

		$('#Valor').mask('000,000,000,000,000.00', {reverse: true});
	
	}
	onlyNumber2 = function(){
		$('#Nit').keyup(function() {
			var $this = $(this);
			// $this.val($this.val().replace(/[^\d.]/g, ''));        
			$this.val($this.val().replace(/[^kK0-9]/g, ''));        
		});
	}
	changeValor = function(){
		$("input[name=clase_seguro]").click(function(){
			ts1 =  $("input[name=clase_seguro]").val();
			if(ts1 == "Seguro Completo"){
				$("#Valor").val("0.00");
			}
		});
	}
	



</script>
