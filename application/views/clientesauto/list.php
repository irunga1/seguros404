<h1>
	Check out this list insurance 
</h1>
<small>You can only compare 3 options.</small>
<br>
<?php
// echo "<pre>";
// print_r($result);
 ?>
<div class="continer-fluid"> 
	<?php 
	$x = 1;



    foreach($result as $it){ ?>
	<div class="row item">
		<div class="col-md-3">
			<br>
			<img class="listimg" src="<?php echo base_url("assets/uploads/files/$it->logotipo"); ?>" alt="">
			<hr>
			<small>Comparar</small><br>
			<input value="<?php echo$it->aseguradora_id; ?>" aseguradora="<?php echo$it->aseguradora_id; ?>"
				type="checkbox" name="aseguradora" id="as-<?php echo $x ?>" class="compare" value="1"
				tiposeguro="<?php echo $it->tiposeguro_id; ?>" tipotarifa="<?php echo $it->tipotarifa_id; ?>">
		</div>
		<div class="col-md-6">
			<h3><?php echo $it->nombre ; ?> </h3>
			<!-- <strog>Prima Neta Anual: Q </strong><?php echo number_format($it->primanetaanual, 2, '.', ',');?>  -->
			<!-- <br>
                <strog>Prima Total: Q </strong><?php echo number_format($it->primatotal, 2, '.', ', ');   ?>
				<br> -->
			<?php $primatotal2 = $it->primatotal/10; $primatotal2 = number_format($primatotal2, 2, '.', ', '); ?>	
			<strog>Cash price $: </strong><?php echo number_format($it->precio_contado, 2, '.', ',');   ?>
				<!-- <span pagos="<?php echo $primatotal2;  ?>"  pma="<?php echo number_format($it->precio_contado, 2, '.', ',');?>" tiposeguro="<?php echo $it->tiposeguro_id; ?>" tipotarifa="<?php echo $it->tipotarifa_id; ?>"
					ase="<?php echo$it->aseguradora_id; ?>" class="btn btn-success btn-sm btncomprar"
					data-toggle="modal" data-target="#exampleModal" aseg="<?php echo $it->nombre; ?>">Comprar</span> -->

		</div>
		<div class="col-md-3">
			<br>
			<?php $primatotal = $it->primatotal/10; $primatotal = number_format($primatotal, 2, '.', ', '); ?>
			<small><strong>10 payments of <br> $. <?php echo $primatotal; ?> </strong></small><br><br>
			<span pagos="<?php echo $primatotal2;  ?>"  pma="<?php echo number_format($it->precio_contado, 2, '.', ',');?>" tiposeguro="<?php echo $it->tiposeguro_id; ?>" tipotarifa="<?php echo $it->tipotarifa_id; ?>"
					ase="<?php echo$it->aseguradora_id; ?>" class="btn btn-success btn-sm btncomprar"
					data-toggle="modal" data-target="#exampleModal" aseg="<?php echo $it->nombre; ?>">Comprar</span>
			<!-- <small>Comparar</small><br>
			<input value="<?php echo$it->aseguradora_id; ?>" aseguradora="<?php echo$it->aseguradora_id; ?>"
				type="checkbox" name="aseguradora" id="as-<?php echo $x ?>" class="compare" value="1"
				tiposeguro="<?php echo $it->tiposeguro_id; ?>" tipotarifa="<?php echo $it->tipotarifa_id; ?>"> -->

		</div>
	</div>
	<?php $x++; } ?>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 final">
			<input value="<?php echo $cotid; ?>" type="hidden" id="cotid">
			<input value="" type="hidden" id="clase_seguro">
			<a style="width:15%" href="<?php echo base_url("clienteautos/index") ?>" class="btn btn-danger"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> </a>
			<button style="width:15%; font-weight:700"  class="btn btn-info" id="comBtn">Compare</button>
			
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<!-- <img id="logo" src="https://protegemos.com.gt/wp-content/uploads/2019/05/cropped-LOGO-peque%C3%B1o-1.png" alt=""> -->
				 <h2 style="display: inline;">Nice Choice </h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				

			</div>
			<div class="modal-body">
				Thanks <strong><?php echo $post["Nombre"] ?></strong>  for prefeer our brands. Please confirm this data <span id="aseg"></span>. <br>
				<div class="formContainer">
					<div class="row nRow">
						<div class="col-md-3">
							<label for="">*Name: </label></div>
						<div class="col-md-9">
							<input placeholder="al menos 3 caractres" maxlength="60" id="Nombre"  value ="<?php echo $post["Nombre"]; ?>" type="text" class="form-control" required  > 
						</div>
					</div>
					<div class="row nRow">
						<div class="col-md-3">
							<label for="">*E-mail: </label>
						</div>
						<div class="col-md-9">
							<input maxlength="100" id="Email" type="email" class="form-control" value ="<?php echo $post["Email"]; ?>" required > 
						</div>
					</div>
					<div class="row nRow">
						<div class="col-md-3">
							<label for="">*Phone Number: </label>
						</div>
						<div class="col-md-9">
							<input placeholder="al menos 8 caractres" maxlength="10" id="Telefono" type="text" class="form-control" value ="<?php echo $post["telefono"]; ?>" required  > 
						</div>
					</div>
					<div class="row nRow">
						<div class="col-md-3">
							<label for="">*Nit: </label>
						</div>
						<div class="col-md-9">
							<input placeholder="Ingrese N.I.T. sin guiones" maxlength="9" id ="Nit" type="text" class="form-control" value ="<?php echo $post["Nit"]; ?>" required > 
						</div>
					</div>

					<div class="row nRow">
						<div class="col-md-3"><label for="">Rate: </label></div>
						<div class="col-md-9"><input type="text" class="form-control nhov" value ="<?php echo $post["clase_seguro"]; ?>" readonly> </div>
					</div>
					
					<h4>Vehicle info</h4>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="">Vehículo: </label> <input type="text" class="form-control nhov" value ="<?php echo $post2[0][8]; ?>" readonly > 
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="">Brand: </label> <input type="text" class="form-control nhov" value ="<?php echo $post2[0][6]; ?>" readonly > 
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="">Model: </label> <input type="text" class="form-control nhov" value ="<?php echo $post["Modelo"]; ?>" readonly > 
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="">Líne: </label> <input type="text" class="form-control nhov" value ="<?php echo $post["Linea"]; ?>" readonly > 
							</div> 
						</div>
					</div>
					<div class="row nRow">
						<div class="col-md-6">
							<label for="">Total Cash: </label>
							<input id="pma" type="text" class="form-control nhov" value ="<?php echo $post2[0][10]; ?>" readonly>
						</div>
						<div class="col-md-6">
							<label for="">Ten Monthly payments: </label>
							<input id="pagos" type="text" class="form-control nhov" value ="10" readonly>
						</div>
						
					</div>

					
				</div>
				<p>
					Al final se te enviará un correo con los datos,  por favor si no aparece en la bandeja de entrada revisa en la bandeja de spam. En breve te contactara uno de nuestros asesores.
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="sndMail" email="<?php echo $post["Email"]; ?>">Comprar</button>
				<span id="loader"><img src="<?php echo base_url("public/img/48x48.gif") ?>" alt="" ><small>Enviando...</small></span>
				<small id="snd1">Correo Enviado</small>
			</div>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>
<script>
	var max_limit = 3;
	$('.compare').each(function (index) {
		this.checked = (".compare" < max_limit);
	}).change(function () {
		if ($(".compare:checked").length > max_limit) {
			this.checked = false;
		}
	});
	$('.compare').click(function () {
		isChecked = $('.compare:checked').length;
		if (isChecked > 0) {
			$("#comBtn").show("slow");
		} else {
			$("#comBtn").hide("hide");
		}
	});
	$('#comBtn').click(function () {
		vec1 = "";
		vec2 = "";
		vec3 = "";
		a = $('.compare:checked');
		for (i = 0; i < a.length; i++) {
			vec1 += $(a[i]).val() + "-";
			vec2 += $(a[i]).attr("tiposeguro") + "-";
			vec3 += $(a[i]).attr("tipotarifa") + "-";
		}
		vec1 = vec1.substring(0, vec1.length - 1);
		vec2 = vec2.substring(0, vec2.length - 1);
		vec3 = vec3.substring(0, vec3.length - 1);



		clase_seguro = $('#clase_seguro').val();
		url = base_url + "clienteautos/pdf/" + $('#cotid').val() + "/" + vec1 + "?tiposeguro=" + vec2 +
			"&tipotarifa=" + vec3;
		window.open(url, '_blank');

	});
	// sndMail
	$(".btncomprar").click(function(){
		$("#sndMail").attr("idcot",$("#cotid").val()) ;
		$("#sndMail").attr("ase", $(this).attr("ase"));
		$("#sndMail").attr("tiposeguro", $(this).attr("tiposeguro"));
		$("#sndMail").attr("tipotarifa", $(this).attr("tipotarifa"));
		$("#pagos").val($(this).attr("pagos"));
		$("#pma").val($(this).attr("pma"));
		$("#aseg").html($(this).attr("aseg"));
		$("#snd1").hide();
		

	});
	$("#sndMail").click(function(){
		entra ="aaa";
		console.log(entra);
		email1 = $(this).attr("email");
		email23 =  validateEmail($("#Email").val());
		if(email23 == true){
			email1 = $("#Email").val();
		}
		fl1 = $("#Nombre").val();
		fl2 = $("#Email").val();
		fl3 = $("#Nit").val();
		fl4 = $("#Telefono").val();
		
		if(fl1.length <3){
			$("#Nombre").addClass("error");
		}
		if(validateEmail(fl2)==false){
			$("#Email").addClass("error");
		}
		if(fl3.length <7){
			$("#Nit").addClass("error");
		}
		if(fl4.length <7){
			$("#Telefono").addClass("error");
		}
		if((fl1.length >3) && (validateEmail(fl2)==true) &&(fl3.length>7)&&(fl4.length>7)){
			envio = {
				"idcot":$(this).attr("idcot"),
				"aseguradoras":$(this).attr("ase"),
				"tiposeguro":$(this).attr("tiposeguro"),
				"tipotarifa":$(this).attr("tipotarifa"),
				"email":email1,
				"Nombre":fl1,
				"Email":fl2,
				"Nit":fl3,
				"Telefono":fl4
			}
			$("#sndMail").hide("slow");
			$("#loader").show("slow")
			jQuery.post( "<?php echo base_url("clienteautos/generatepdf2"); ?>", envio , function(data) {
				console.log("entra");
				$("#loader").hide("slow");
				$("#snd1").show("slow");
				
			});
		}
		else{
			alert("Por favor verifique los campos marcados en ROJO");
		}
	});	
	$('#Nit').keyup(function() {
		var $this = $(this);
		// $this.val($this.val().replace(/[^\d.]/g, ''));        
		$this.val($this.val().replace(/[^kK0-9]/g, ''));        
	});
	$('#Telefono').keyup(function() {
		var $this = $(this);
		// $this.val($this.val().replace(/[^\d.]/g, ''));        
		$this.val($this.val().replace(/[^0-9]/g, ''));        
	});
	$('#Nombre').keyup(function() {
		var $this = $(this);
		// $this.val($this.val().replace(/[^\d.]/g, ''));        
		$this.val($this.val().replace(/[^a-zA-Z ]/g, ''));        
	});
	function validateEmail(email) {
		const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(String(email).toLowerCase());
	}

</script>

<style>
	/* div.row,
	div.col-md-3,
	div.col-md-6 {
		/* border: 1px solid gray; */
		/* min-height: 125px; */
	/* } */ 
	#snd1{
		display:none;
	}

	.nhov{
		cursor:pointer;
	}

	#loader{
		display:none;
	}
	.listimg {
		max-width: 150px;
		width: 100%
	}

	.info {
		width: 50%;
		display: inline-block;
	}

	.col-md-3 {
		text-align: center;
	}

	.item {
		border-bottom: 1px dotted silver;
	}

	.final {
		padding-top: 10px;
		text-align: center;
	}

	#comBtn {
		display: none;
	}
	.modal-body .nRow{
		padding-top:5px!important;
		padding-bottom: 5px!important;
	}
	.error{
		border:1px solid red;
	}
	.modal-content label{
		color:#042141;

	}
	.modal-content{
		background-color: sienna;
	}
</style>
