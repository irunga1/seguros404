<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"><!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="http://localhost/segurosautomovil//public/js/jquery.js"></script>
	<script src="http://localhost/segurosautomovil//public/js/bootstrap.min.js"></script>
</head>
<!-- <body id ="pdfco" style="display: none;"> -->
<body id ="pdfco" >
	<div class="container-fluid" >
		<div class="top" backcolor="#48626f">
			<img src="https://protegemos.com.gt/wp-content/uploads/2019/05/cropped-LOGO-peque%C3%B1o-1.png" alt="" id="img1">
		</div>
		<section class="max">
			
			<h4>Resumen</h4>
		

			<div class="mycol mycol-4" style ='border:none'>
				<div><input class ="info" type="text"  value ="Nombre" ></div>
				<div><input class ="info" type="text"  value ="Correo" ></div>
				<!-- <div><input class ="info" type="text"  value ="Numero Proforma" ></div> -->
				<div><input class ="info" type="text"  value ="Marca del Vehículo" ></div>
				<div><input class ="info" type="text"  value ="Tipo de Vehículo" ></div>
				<div><input class ="info" type="text"  value ="Valor del Vehículo" ></div>
				<div><input class ="info" type="text"  value ="Tipo de Seguro" ></div>


				

			</div>
			<div class="mycol mycol-4" style ='border:none'>
				<div><input class="info" type="text" value="<?php echo $personal[0]->nombre; ?>"></div>
				<div><input class="info" type="text" value="<?php echo $personal[0]->email; ?>"></div>
				<!-- <div><input class="info" type="text" value="1"></div> -->
				<div><input class="info" type="text" value="<?php echo $personal[0]->nombre; ?>"></div>
				<div><input class="info" type="text" value="<?php echo $personal[0]->descripcion; ?>"></div>
				<div><input class="info" type="text" value="<?php echo number_format($personal[0]->montoasegurado, 2, '.', ',');  ?>"></div>
				<div><input class="info" type="text" value="<?php echo $personal[0]->clase_seguro; ?>"></div>
				
				
				
				
			</div>
			
		</section>
		
			<?php 
			$col = 12/$size;
			for ($i=0; $i<$size; $i++) {
				echo "<div class ='mycol mycol-$col '>"
			?>
		
			
			<section class="asHead">
				<h4 style='height:1.5cm;'><?php echo $calculado[$i]->nombre; ?></h4>
				<img src="<?php echo base_url("/assets/uploads/files/".$calculado[$i]->logotipo); ?>" alt="">
			</section>
			<section class="asinfo">
				<div><span class="lbl<?php echo $size; ?>">Prima Neta Anual </span><span class="info1 num<?php echo $size; ?>"><?php echo $calculado[$i]->primanetaanual; ?></span></div>
				<div><span class="lbl<?php echo $size; ?>">Gastos de Emision</span><span class="info1 num<?php echo $size; ?>"><?php echo $calculado[$i]->gastosdeemision; ?></span></div>
				<div><span class="lbl<?php echo $size; ?>">Recargo 10  Pagos</span><span class="info1 num<?php echo $size; ?>"><?php echo $calculado[$i]->recargos; ?></span></div>
				<div><span class="lbl<?php echo $size; ?>">Asistencia</span><span class="info1 num<?php echo $size; ?>"><?php echo $calculado[$i]->asistencia; ?></span></div>
				<div><span class="lbl<?php echo $size; ?>">IVA</span><span class="info1 num<?php echo $size; ?>"><?php echo $calculado[$i]->iva; ?></span></div>
				<div><span class="lbl<?php echo $size; ?>">Prima Total 10 Pagos</span><span class="info1 num<?php echo $size; ?>"><?php echo $calculado[$i]->primatotal; ?></span></div>
				<div><span class="lbl<?php echo $size; ?>">Prima Neta Precio Contado</span><span class="info1 num<?php echo $size; ?>"><?php echo $calculado[$i]->precio_contado; ?></span></div>				
			</section>
			<section class="asinfo">
				
				<div class ="titleItem">
					<div><strong>Deducible Robo</strong></div>
					<div><span class="num<?php echo $size.$size ?>"><?php $calculado[$i]->deducible_robo ?></span></div>
				</div>
				<div class ="titleItem">
					<!-- [deducible_danos] => 0.00
					[deducible_robo] => 0.00 -->
					<div><strong>Deducible Daños</strong></div>
					<div><span class="num<?php echo $size.$size ?>"><?php echo $calculado[$i]->deducible_danos ?></span></div>
				</div>
				<div></div>
				<div></div>
				<div></div>				
			</section>

			
			<?php echo"</div>"; }?>

				<div></div>
				<?php
					// echo "<pre>";print_r($beneficios);
					$val = array_keys($beneficios) ;
					foreach($val as $it){?>
					<div class="mycol mycol-12">
						<h4><?php echo $it; ?></h4>
						<hr>
					</div> 

						<?php 
							$temp= $beneficios[$it];  
							for($i=0;$i<count($calculado);$i++){
								$id = $calculado[$i]->aseguradora_id;
								
								for($j=0;$j<count($temp[$id]);$j++){
									if($it !="Coberturas"){
										echo 
										"<div class ='mycol mycol-$col'>".$temp[$id][$j]["descripcion"].")<br>".$temp[$id][$j]["valor"]."</div>";
									}
								}
								
							}
							
						?>
				<?php } ?>
				




			
			<h4 >Coberturas</h4>
					

					<hr style="width:16.4cm; display:inline-block;">
					
				<table style="width:16.4cm; font-size:11px;"  >
			
				<tr>
				<?php
					$size = count($cob2);
					$size2 = count($calculado);
					
					
						if($size2 ==1){
							echo"<td style ='width:6cm;font-weight:700'>Descripcion</td>";
							echo"<td style ='font-weight:700'>".$calculado[0]->nombre."</td>";
							echo "</tr>";
						}
						if($size2 ==2){
							echo"<td style ='width:6cm; font-weight:700'>Descripcion</td>";
							echo"<td style ='font-weight:700'>".$calculado[0]->nombre."</td>";
							echo"<td style ='font-weight:700'>".$calculado[1]->nombre."</td>";
							echo "</tr>";
						}
						if($size2 ==3){
							echo"<td style ='width:6cm; font-weight:700'>Descripcion</td>";
							echo"<td style ='font-weight:700'>".$calculado[0]->nombre."</td>";
							echo"<td style ='font-weight:700'>".$calculado[1]->nombre."</td>";
							echo"<td style ='font-weight:700'>".$calculado[2]->nombre."</td>";
							echo "</tr>";
						}
					
					for($i=0;$i<$size;$i++){
						if($size2 ==1){
							echo"<td style ='width:6cm;'>".$cob2[$i][3]."</td>";
							echo"<td>".$cob2[$i][4]."</td>";
							echo "</tr>";
						}
						if($size2 ==2){
							echo"<td style ='width:6cm;'>".$cob2[$i][3]."</td>";
							echo"<td>".$cob2[$i][4]."</td>";
							echo"<td>".$cob2[$i][5]."</td>";
							echo "</tr>";
						}
						if($size2 ==3){
							echo"<td style ='width:6cm;'>".$cob2[$i][3]."</td>";
							echo"<td>".$cob2[$i][4]."</td>";
							echo"<td>".$cob2[$i][5]."</td>";
							echo"<td>".$cob2[$i][6]."</td>";
							echo "</tr>";
						}
						

					}
				?>
				</tr>

			</tbody>
			</table>

			</section>		


					

	</div>



    
<script>



	$(document).ready(function(){
		var title = document.title;
		var divElements = document.getElementById('pdfco').innerHTML;
		var printWindow = window.open("", "printWindow");
		//open the window
		printWindow.document.open();
		//write the html to the new window, link to css file
		printWindow.document.write('<html><head>')
		printWindow.document.write('<title>Cotización</title>');
		printWindow.document.write('<style>@import  url("https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css");</style>');

		printWindow.document.write('</head>');
		printWindow.document.write(divElements);
		printWindow.document.write('</html>');
		printWindow.document.close();
		printWindow.focus();
		//The Timeout is ONLY to make Safari work, but it still works with FF, IE & Chrome.
		setTimeout(function() {
			printWindow.print();
			printWindow.close();
		}, 2000);
	});
</script>

<style>
	.num{
		text-align: right!important;
		width:100%;
	}
	.top {
		height: 33px;
		border: 19px solid  #E5B029 !important;
		position: relative;
		width: 16.8cm;
	}

	table{
		width: 16.4cm;
		font-size: 11px;
		border: 1px solid silver;
	}
	td{
		border: 1px solid silver;
	}

	#img1 {

		width: 100px;
		position: absolute;
		bottom: -15px;

	}
	#img1{
		width:100px;
		height:auto!important;
	}
	hr{		
    	border-top: 3px solid    #c6b4b4;
		margin-top:5px;
		margin-bottom:5px;
	}
	.lbl3 {
		display: inline-block;
		width: 2.5cm;
		
	}
	.num33{
		display:inline-block;
		width:5cm;
		text-align:right;
	}
	.lbl2{
		display:inline-block;
		width:4.15cm;
	}
	.num22{
		display:inline-block;
		width:8.3cm;
		text-align:right;
	}
	.lbl1{
		display:inline-block;
		width:8.4cm;
	}
	.num11{
		display:inline-block;
		width:16.8cm;
		text-align:right;
	}
	/* .asinfo{
		text-align: center!important;
	} */
	.num1{
		text-align: right;
		display: inline-block;
		width:8.4cm!important;
		border-bottom: 1px dotted gray;
	}
	.num2{
		text-align: right;
		display: inline-block;
		width:4.15cm!important;
		border-bottom: 1px dotted gray;
	}
	.num3{
		text-align: right;
		display: inline-block;
		width:2.75cm!important;
		border-bottom: 1px dotted gray;
	}
	h1{
		font-size: 700;
	}
	.asHead{
		text-align: center;
	}
	img{
		height: 50px;
	}
	.mycol {
		display: inline-block;
		border-right: 1px dotted silver;
		margin-right: 5px;
		padding-top: 5px;
	}
	.mycol-4{
		width: 5.4cm;
		font-size:11px;
	}
	.mycol-6{
		width:8.33cm;
		font-size:12px;
	}
	.mycol-12{
		width:16.45cm;
		display: block;
		font-size:13px;
	}
	.info{
		border:none!important;
	}
	.max{
		max-width: 16.8cm;
	}
	h5{
		font-size:14px;
		font-weight: bold;
	}
	p{
		margin:0px;
	}
</style>

</body>
</html>
