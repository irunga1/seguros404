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



<?php $attributes = array('class' => 'segurosauto', 'id' => 'segurosauto');     echo form_open(base_url("clienteautos/indexpost"), $attributes); ?>

<h3>Cotiza aca:</h3>

<!-- One "tab" for each step in the form: -->
<div class="tab">
	<h5>Datos Personales</h5>
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
		<input required type="email" name="Email" class="form-control" id="Email" placeholder="Ingrese Correo"
			value="<?php echo (isset($post))?$post["Email"]:"" ?>">
	</div>
	<label for="">Teléfono <span class="asterisco">*</span></label>
	<div class="input-group">
		<span class="input-group-addon">#</span>
		<input required type="tel" name="telefono" class="form-control" maxlength="10" id="telefono"
			placeholder="Ingrese Numero de Teléfono" value="<?php echo (isset($post))?$post["telefono"]:"" ?>">
	</div>
</div>

<div class="tab">
	<h5>Datos del Vehiculo</h5>
	<label for="">Tipo Vehículo <span class="asterisco">*</span></label>
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
		<select name="Modelo" id="Modelo" class="form-control">
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
	<div class="form-group">
		<?php 
				$cont=0;
				foreach($clasesguro as $it){
					$test = ($cont==0)?"checked":"";
					$str ="<div class='sinline'>";
					$str .="";
					$str .="    <input $test type='radio' name ='clase_seguro' value='$it->nombre' name='optradio'> $it->nombre";
					$str .="";
					$str .=" ";
					$str.="</div>";
					echo $str;
					$cont++;
				}?>
	</div>
	<div class="form-group">
		<div class="row">
			<!-- <div class="col-md-4">
				<label for="">Captcha <span class="asterisco">*</span></label>
				<?php         
					// $captcha = $this->captcha->generateString(); 
					// $this->session->set_userdata(["captcha"=> $captcha]);
					// $this->captcha->generateImage(base_url());
        		?>
			</div>

			<div class="col-md-3">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input required type="text" name="captcha" maxlength="8" class="form-control" id="Valor" placeholder="Ingrese el valor de la  imagen">
				</div>
			</div> -->
			<div class="col-md-">
				<button class="btn btn-info col-md-3" id="enviar">
					<i class="glyphicon glyphicon-cloud-upload"></i> Cotiza ya
				</button>
			</div>
		</div>
	</div>
</div>



<div style="overflow:auto;">
	<div style="float:right;margin-top: 10px;">
		<button type="button" class="btn btn-success" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
		<button type="button" class="btn btn-success" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
	</div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
	<span class="step"></span>
	<span class="step"></span>


</div>

</form>



<style>
	body{
		background-color: #042141;
	}
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

	/* multi step form */
	/* Style the form */
	#regForm {
		background-color: #ffffff;
		margin: 100px auto;
		padding: 40px;
		width: 70%;
		min-width: 300px;
	}

	/* Style the input fields */
	input {
		padding: 10px;
		width: 100%;
		font-size: 17px;
		
		border: 1px solid #fff;
	}

	/* Mark input boxes that gets an error on validation: */
	input.invalid {
		background-color: #ffdddd;
	}

	/* Hide all steps by default: */
	.tab {
		display: none;
	}

	/* Make circles that indicate the steps of the form: */
	.step {
		height: 15px;
		width: 15px;
		margin: 0 2px;
		background-color: #bbbbbb;
		border: none;
		border-radius: 50%;
		display: inline-block;
		opacity: 0.5;
	}

	/* Mark the active step: */
	.step.active {
		opacity: 1;
	}

	/* Mark the steps that are finished and valid: */
	.step.finish {
		background-color: #4CAF50;
	}
	button, input, select, textarea {
		font-family: inherit;
		font-size: inherit;
		line-height: inherit;
	    color: sienna;
	}
	/* multi step form */

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
	onlyNumber = function () {

		$('#Valor').mask('000,000,000,000,000.00', {
			reverse: true
		});

	}
	onlyNumber2 = function () {
		$('#Nit').keyup(function () {
			var $this = $(this);
			// $this.val($this.val().replace(/[^\d.]/g, ''));        
			$this.val($this.val().replace(/[^kK0-9]/g, ''));
		});
	}
	changeValor = function () {
		$("input[name=clase_seguro]").click(function () {
			ts1 = $("input[name=clase_seguro]").val();
			if (ts1 == "Seguro Completo") {
				$("#Valor").val("0.00");
			}
		});
	}


	var currentTab = 0; // Current tab is set to be the first tab (0)
	showTab(currentTab); // Display the current tab

	function showTab(n) {
		// This function will display the specified tab of the form ...
		var x = document.getElementsByClassName("tab");
		x[n].style.display = "block";
		// ... and fix the Previous/Next buttons:
		if (n == 0) {
			document.getElementById("prevBtn").style.display = "none";
		} else {
			document.getElementById("prevBtn").style.display = "inline";
		}
		if (n == (x.length - 1)) {
			document.getElementById("nextBtn").style.display = "none";
		} else {
			document.getElementById("nextBtn").innerHTML = "Siguiente";
		}
		// ... and run a function that displays the correct step indicator:
		fixStepIndicator(n)
	}

	function nextPrev(n) {
		// This function will figure out which tab to display
		var x = document.getElementsByClassName("tab");
		// Exit the function if any field in the current tab is invalid:
		if (n == 1 && !validateForm()) return false;
		// Hide the current tab:
		x[currentTab].style.display = "none";
		// Increase or decrease the current tab by 1:
		currentTab = currentTab + n;
		// if you have reached the end of the form... :
		if (currentTab >= x.length) {
			//...the form gets submitted:
			document.getElementById("regForm").submit();
			return false;
		}
		// Otherwise, display the correct tab:
		showTab(currentTab);
	}

	function validateForm() {
		// This function deals with validation of the form fields
		var x, y, i, valid = true;
		x = document.getElementsByClassName("tab");
		y = x[currentTab].getElementsByTagName("input");
		// A loop that checks every input field in the current tab:
		for (i = 0; i < y.length; i++) {
			// If a field is empty...
			if (y[i].value == "") {
				// add an "invalid" class to the field:
				y[i].className += " invalid";
				// and set the current valid status to false:
				valid = false;
			}
		}
		// If the valid status is true, mark the step as finished and valid:
		if (valid) {
			document.getElementsByClassName("step")[currentTab].className += " finish";
		}
		return valid; // return the valid status
	}

	function fixStepIndicator(n) {
		// This function removes the "active" class of all steps...
		var i, x = document.getElementsByClassName("step");
		for (i = 0; i < x.length; i++) {
			x[i].className = x[i].className.replace(" active", "");
		}
		//... and adds the "active" class to the current step:
		x[n].className += " active";
	}

</script>
