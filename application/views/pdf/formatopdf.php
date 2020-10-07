<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"><!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="<?php base_url('public/js/jquery.js') ?>"></script>
	<script src="<?php base_url('public/js/bootstrap.min.js') ?>"></script>
</head>
<!-- <body id ="pdfco" style="display: none;"> -->
<body id ="pdfco" >
	<div class="container-fluid" >
			
		<div class="top" style="width:17.2cm" >
			<img src="./assets/uploads/files/logo1.jpg" alt="" style = "height:75px" >
			<!-- <img src="https://protegemos.com.gt/wp-content/uploads/2019/05/cropped-LOGO-peque%C3%B1o-1.png" alt="" > -->
			
			
		</div>
		<section class="max">
			
			<div style="display:block; height: 1.5cm; ">
				<span style='font-size:18px; font-weight:700;' >Quote Submitted to:</span>
			</div>
			<div class="mycol mycol-4" style ='height:3.5cm'>
				<div><input class ="info" type="text"  value ="Name" ></div>
				<div><input class ="info" type="text"  value ="E-Mail" ></div>
				<!-- <div><input class ="info" type="text"  value ="Numero Proforma" ></div> -->
				<div><input class ="info" type="text"  value ="Brand" ></div>
				<div><input class ="info" type="text"  value ="Body Type" ></div>
				<div><input class ="info" type="text"  value ="Value" ></div>
				<div><input class ="info" type="text"  value ="Insurance Type" ></div>
			</div>
			<div class="mycol mycol-4" style ='height:3.5cm'>
				
				<?php $valor1 = number_format($personal[0]->montoasegurado, 2, '.', ',');  ?>
				<div><input class="info" type="text" value="<?php echo $personal[0]->nombre; ?>"></div>
				<div><input class="info" type="text" value="<?php echo $personal[0]->email; ?>"></div>
				<!-- <div><input class="info" type="text" value="1"></div> -->
				<div><input class="info" type="text" value="<?php echo $personal[0]->nombremarca; ?>"></div>
				<div><input class="info" type="text" value="<?php echo $personal[0]->descripcion; ?>"></div>
				<div><input class="info" type="text" value="<?php echo "Q. ".number_format($personal[0]->montoasegurado, 2, '.', ',');  ?>"></div>
				<div><input class="info" type="text" value="<?php echo $personal[0]->clase_seguro; ?>"></div>
			</div>			
			<div class="mycol mycol-4" style ='height:3.5cm'>
				<div><input class="info" type="text" value="Quotation: <?php echo $personal[0]->idcot ;?>"></div>
				<div><input class="info" type="text" value="Date :<?php echo date("d-m-Y") ;?> "></div>
				<div><input class="info" type="text" value="Contact us  : <?php echo $personal[0]->telefono;?>"></div>
				<div><input class="info" type="text" value="<?php echo $personal[0]->mail;?>"></div>
			</div>			
		</section>		
			<?php 
			$col = 12/$size;
			for ($i=0; $i<$size; $i++) {
				echo "<div class ='mycol mycol-$col ' style='border: 0px!important'>"
			?>		
			<?php 
				if($col == 12){
					echo "<br>";
				}
				else{
					echo "<br>";
				}
			?>
			
			<?php $isone =($col==12)?"text-align:left":"" ?>
			<?php $isone1 =($col==12)?"width:10%!important;height:10%!important;":"" ?>
			<section class="asHead" style ="<?php echo $isone;?>">
				<img style ="<?php ?>" src="<?php echo "./assets/uploads/files/".$calculado[$i]->logotipo; ?>" alt="">
			</section>
			<section class="asinfo">
				<!-- <div><span style="text-align:left!important;" class="lbl<?php echo $size; ?>">Prima Neta Anual </span>            <span style="text-align:right!important;" class="info1 num<?php //echo $size; ?>"><?php //echo "Q ". $calculado[$i]->primanetaanual; ?></span></div>
				<div><span style="text-align:left!important;" class="lbl<?php echo $size; ?>">Gastos de Emision</span>            <span style="text-align:right!important;" class="info1 num<?php //echo $size; ?>"><?php //echo "Q ". $calculado[$i]->gastosdeemision; ?></span></div>
				<div><span style="text-align:left!important;" class="lbl<?php echo $size; ?>">Recargo 10  Pagos</span>            <span style="text-align:right!important;" class="info1 num<?php //echo $size; ?>"><?php //echo "Q ". $calculado[$i]->recargos; ?></span></div>
				<div><span style="text-align:left!important;" class="lbl<?php echo $size; ?>">Asistencia</span>                   <span style="text-align:right!important;" class="info1 num<?php //echo $size; ?>"><?php //echo "Q ". $calculado[$i]->asistencia; ?></span></div>
				<div><span style="text-align:left!important;" class="lbl<?php echo $size; ?>">IVA</span>                          <span style="text-align:right!important;" class="info1 num<?php //echo $size; ?>"><?php //echo "Q ". $calculado[$i]->iva; ?></span></div> -->
				<div><span style="text-align:left!important;" class="lbl<?php echo $size; ?>">Prima Total 10 Pagos:</span>         <span style="text-align:right!important;" class="info1 num<?php echo $size; ?>"><?php echo "Q ".  $calculado[$i]->primatotal; ?></span></div>
				<div><span style="text-align:left!important;" class="lbl<?php echo $size; ?>">O 10 Pagos de:</span>         <span style="text-align:right!important;" class="info1 num<?php echo $size; ?>"><?php echo "Q ". number_format(($calculado[$i]->primatotal/10), 2, '.', '') ; ?></span></div>
				<div><span style="text-align:left!important;" class="lbl<?php echo $size; ?>">Prima Total de Contado:</span>    <span style="text-align:right!important;" class="info1 num<?php echo $size; ?>"><?php  echo "Q ". $calculado[$i]->precio_contado; ?></span></div>
				<!-- <br> -->
				<!-- <div><span style="text-align:left!important;" class='lbl<?php //echo $size; ?>'>Deducible Robo</span>                <span style="text-align:right!important;" class="info1 num<?php //echo $size ?>"><?php //echo "Q ".   $calculado[$i]->deducible_robo ?> </span></div>				
				<div><span style="text-align:left!important;" class='lbl<?php //echo $size; ?>'>Deducible Daños</span>               <span style="text-align:right!important;" class="info1 num<?php //echo $size; ?>"><?php  //echo "Q ".  $calculado[$i]->deducible_danos ?></span></div>				 -->
			</section>
			<?php echo"</div>"; }?>
				<!-- IAB	 -->
				<?php $iab = $secciones2["SECCION IAB"]; ?>
				<?php
				
					$size = count($iab);
					$size2 = count($calculado);	
					$personal[0]->clase_seguro = trim($personal[0]->clase_seguro);
					$display =($personal[0]->clase_seguro=="Seguro Terceros")?"display:none!important;":"";
					$isMargin = ($size>2)?"margin-top:-1cm;":"margin-top:1cm";
					$isCol1 = (count($calculado) > 1)?"Comparativo de ":"";

					echo "<div style='$isMargin'><span style=' font-size:19px!important; font-weight:700!important;';padding-top:0cm;>$isCol1 Coverages and Benefits</span></div>";
					echo "<table class='tabla' style='$display width:18cm; '>";
					echo"<tr>";
					echo"<td style= 'border:0px solid white;padding-top:2px; line-height:21px; '><span style='font-size:19px!important; font-weight:700!important';padding-top:1cm;>Section IAB</span></td>";
					echo"</tr>";			
						if($size2 ==1){
							echo "<tr>";
							echo"<td style ='border:1px solid gray; width:7cm;font-weight:700'>Descripcion</td>";
							echo"<td style ='border:1px solid gray font-weight:700'>".$calculado[0]->nombre."</td>";
							echo "</tr>";
						}
						if($size2 ==2){
							echo "<tr>";
							echo"<td style ='border:1px solid gray>; width:7cm; font-weight:700'>Descripcion</td>";
							echo"<td style ='border:1px solid gray>; font-weight:700'>".$calculado[0]->nombre."</td>";
							echo"<td style ='border:1px solid gray>; font-weight:700'>".$calculado[1]->nombre."</td>";
							echo "</tr>";
						}
						if($size2 ==3){
							echo "<tr>";
							echo"<td style ='border:1px solid gray; width:7cm; font-weight:700'>Descripcion</td>";
							echo"<td style ='border:1px solid gray; font-weight:700'>".$calculado[0]->nombre."</td>";
							echo"<td style ='border:1px solid gray; font-weight:700'>".$calculado[1]->nombre."</td>";
							echo"<td style ='border:1px solid gray; font-weight:700'>".$calculado[2]->nombre."</td>";
							echo "</tr>";
						}
					
					//for($i=0;$i<$size;$i++){
					for($i=0;$i<$size;$i++){
						if($size2 ==1){
							$a =($iab[$i][10]!="")?$iab[$i][10]:"sin datos";
							
							echo "<tr>";
							echo"<td style ='border:1px solid gray; width:7cm;font-size:11px!important;'>".$iab[$i][9]."</td>";
							echo"<td style ='border:1px solid gray;'>Q. ".number_format($a, 2, '.', ',')."</td>";
							echo "</tr>";
						}
						if($size2 ==2){
							$a =($iab[$i][10]!="")?$iab[$i][10]:"sin datos";
							$b =($iab[$i][11]!="")?$iab[$i][11]:"sin datos";
							echo "<tr>";
							echo"<td style ='border:1px solid gray; width:7cm;font-size:11px!important;'>".$iab[$i][9]."</td>";
							echo"<td style ='border:1px solid gray;'>Q. ".number_format($a, 2, '.', ',')."</td>";
							echo"<td style ='border:1px solid gray;'>Q. ".number_format($b, 2, '.', ',')."</td>";
							echo "</tr>";
						}
						if($size2 ==3){
							$a =($iab[$i][10]!="")?$iab[$i][10]:"sin datos";
							$b =($iab[$i][11]!="")?$iab[$i][11]:"sin datos";
							$c =($iab[$i][12]!="")?$iab[$i][12]:"sin datos";
							echo "<tr>";
							echo"<td style ='border:1px solid gray; width:7cm;font-size:11px!important'>".$iab[$i][9]."</td>";
							echo"<td style ='border:1px solid gray;'>Q. ".number_format($a, 2, '.', ',')."</td>";
							echo"<td style ='border:1px solid gray;'>Q. ".number_format($b, 2, '.', ',')."</td>";
							echo"<td style ='border:1px solid gray;'>Q. ".number_format($c, 2, '.', ',')."</td>";
							echo "</tr>";
						}
					}
				?>
				</table>
				<?php $iiab = $secciones2["SECCION IIAB"]; ?>
				<?php
					$size = count($iiab);
					$size2 = count($calculado);	
					echo "<br>";

					echo "<table class='tabla' style='width:18cm; '>";
					echo"<tr>";
					echo"<td style= 'border:0px solid white;padding-top:2px; line-height:21px; '><span style='font-size:19px!important; font-weight:700!important';padding-top:1cm;>Section IIAB</span></td>";
					echo"</tr>";
						if(($size2 ==1) && ($personal[0]->clase_seguro=="Seguro Terceros") ){
							echo "<tr>";
							echo"<td style ='border:0px solid; width:7cm;font-weight:700'>Descripcion</td>";
							echo"<td style ='font-weight:700'>".$calculado[0]->nombre."</td>";
							echo "</tr>";
						}
						if($size2 ==2 && ($personal[0]->clase_seguro=="Seguro Terceros")){
							echo "<tr>";
							echo"<td style ='border:1px solid gray; width:7cm; font-weight:700'>Descripcion</td>";
							echo"<td style ='border:1px solid gray; font-weight:700'>".$calculado[0]->nombre."</td>";
							echo"<td style ='border:1px solid gray; font-weight:700'>".$calculado[1]->nombre."</td>";
							echo "</tr>";
						}
						if($size2 ==3 && ($personal[0]->clase_seguro=="Seguro Terceros")){
							echo "<tr>";
							echo"<td style ='border:1px solid gray; width:7cm; font-weight:700'>Descripcion</td>";
							echo"<td style ='border:1px solid gray; width:3.66cm; font-weight:700'>".$calculado[0]->nombre."</td>";
							echo"<td style ='border:1px solid gray; width:3.66cm; font-weight:700'>".$calculado[1]->nombre."</td>";
							echo"<td style ='border:1px solid gray; width:3.66cm; font-weight:700'>".$calculado[2]->nombre."</td>";
							echo "</tr>";
						}
					for($i=0;$i<$size;$i++){
						if($size2 ==1){
							$a =($iiab[$i][10]!="")?$iiab[$i][10]:"sin datos";
							echo "<tr>";
							echo"<td style ='border:1px solid gray; width:7cm;font-size:11px!important;'>".$iiab[$i][9]."</td>";
							echo"<td style ='width:11cm;border:1px solid gray;' >".$a."</td>";
							echo "</tr>";
						}
						if($size2 ==2){
							$a =($iiab[$i][10]!="")?$iiab[$i][10]:"sin datos";
							$b =($iiab[$i][11]!="")?$iiab[$i][11]:"sin datos";
							echo "<tr>";
							echo"<td style ='border:1px solid gray; width:7cm;font-size:11px!important;'>".$iiab[$i][9]."</td>";
							echo"<td style ='width:5.5cm; border:1px solid gray;'>".$a."</td>";
							echo"<td style ='width:5.5cm; border:1px solid gray;'>".$b."</td>";
							echo "</tr>";
						}
						if($size2 ==3){							
							$a =($iiab[$i][10]!="")?$iiab[$i][10]:"sin datos";
							$b =($iiab[$i][11]!="")?$iiab[$i][11]:"sin datos";
							$c =($iiab[$i][12]!="")?$iiab[$i][12]:"sin datos";
							echo "<tr>";
							echo"<td style ='border:1px solid gray; width:7cm;font-size:11px!important'>".$iiab[$i][9]."</td>";
							echo"<td style ='width:3.66cm; border:1px solid gray;'>".$a."</td>";
							echo"<td style ='width:3.66cm; border:1px solid gray;'>".$b."</td>";
							echo"<td style ='width:3.66cm; border:1px solid gray;'>".$c."</td>";
							echo "</tr>";
						}
					}
				?>
				</table>
				<?php $iiiab = $secciones2["SECCION IIIAB"]; ?>
				<?php
					$size = count($iiiab);
					$size2 = count($calculado);	
					// echo "<table border=0 style='border:0px solid white;width:20cm; '>";

					echo "<table class='tabla' style='width:18cm; '>";
					echo"<tr>";
					echo"<td style= 'border:0px solid white;padding-top:2px; line-height:21px; '><br><span style='font-size:19px!important; font-weight:700!important';padding-top:1cm;>Section IIIAB</span></td>";
					echo"</tr>";
						// if($size2 ==1){
						// 	echo "<tr>";
						// 	echo"<td style ='border:0px solid; width:7cm;font-weight:700'>Descripcion</td>";
						// 	echo"<td style ='font-weight:700'>".$calculado[0]->nombre."</td>";
						// 	echo "</tr>";
						// }
						// if($size2 ==2){
						// 	echo "<tr>";
						// 	echo"<td style ='width:7cm; font-weight:700'>Descripcion</td>";
						// 	echo"<td style ='font-weight:700'>".$calculado[0]->nombre."</td>";
						// 	echo"<td style ='font-weight:700'>".$calculado[1]->nombre."</td>";
						// 	echo "</tr>";
						// }
						// if($size2 ==3){
						// 	echo "<tr>";
						// 	echo"<td style ='width:7cm; font-weight:700'>Descripcion</td>";
						// 	echo"<td style ='font-weight:700'>".$calculado[0]->nombre."</td>";
						// 	echo"<td style ='font-weight:700'>".$calculado[1]->nombre."</td>";
						// 	echo"<td style ='font-weight:700'>".$calculado[2]->nombre."</td>";
						// 	echo "</tr>";
						// }
					for($i=0;$i<$size;$i++){
						if($size2 ==1){
							$a =($iiiab[$i][10]!="")?$iiiab[$i][10]:"sin datos";
							echo "<tr>";
							echo"<td style ='border:1px solid gray; width:7cm;font-size:11px!important;'>".$iiiab[$i][9]."</td>";
							echo"<td style ='width:11cm; border:1px solid gray;'>".$a."</td>";
							echo "</tr>";
						}
						if($size2 ==2){
							$a =($iiiab[$i][10]!="")?$iiiab[$i][10]:"sin datos";
							$b =($iiiab[$i][11]!="")?$iiiab[$i][11]:"sin datos";
							
							echo "<tr>";
							echo"<td style ='border:1px solid gray; width:7cm;font-size:11px!important;'>".$iiiab[$i][9]."</td>";
							echo"<td style ='width:5.5cm; border:1px solid gray;' >".$a."</td>";
							echo"<td style ='width:5.5cm; border:1px solid gray;' >".$b."</td>";
							echo "</tr>";
						}
						if($size2 ==3){
							$a =($iiiab[$i][10]!="")?$iiiab[$i][10]:"sin datos";
							$b =($iiiab[$i][11]!="")?$iiiab[$i][11]:"sin datos";
							$c =($iiiab[$i][12]!="")?$iiiab[$i][12]:"sin datos";
							echo "<tr>";
							echo"<td style ='border:1px solid gray; width:7cm;font-size:11px!important'>".$iiiab[$i][9]."</td>";
							echo"<td style ='width:3.66cm; border:1px solid gray;'>".$a."</td>";
							echo"<td style ='width:3.66cm; border:1px solid gray;'>".$b."</td>";
							echo"<td style ='width:3.66cm; border:1px solid gray;'>".$c."</td>";
							echo "</tr>";
						}
					}
				?>
				</table>
				<footer>
					<div class="mycol mycol-4"><small>¡Estamos para servirle!</small></div>
					<div class="mycol mycol-4" style='text-align:center;'><small>Pagina #1</small></div>
					<div class="mycol mycol-4" style="text-align:right;border:none!important" ><small> www.protegemos.com.gt </small></div>
				</footer>
				<div style="page-break-before: always"></div>
				<div class="top" style='width:17.2cm;'  >
					<img src="./assets/uploads/files/logo1.jpg" alt="Protegemos" >
				</div>
				
				<?php
					$size = count($cob2);
					$size2 = count($calculado);	
					// echo "<table border=0 style='border:0px solid white;width:20cm; '>";

					echo "<table class='tabla' style='width:18cm; '>";
					echo"<tr>";
					echo"<td style= 'border:0px solid white;padding-top:2px; line-height:21px; '><br><span style='font-size:19px!important; font-weight:700!important';padding-top:1cm;>Other Benefits</span></td>";
					echo"</tr>";
						if($size2 ==1){
							echo "<tr>";
							echo"<td style ='border:1px solid gray; width:7cm;font-weight:700'>Descripcion</td>";
							echo"<td style ='border:1px solid gray;font-weight:700'>".$calculado[0]->nombre."</td>";
							echo "</tr>";
						}
						if($size2 ==2){
							echo "<tr>";
							echo"<td style ='border:1px solid gray; width:7cm; font-weight:700'>Descripcion</td>";
							echo"<td style ='width:5.5cm;border:1px solid gray; font-weight:700'>".$calculado[0]->nombre."</td>";
							echo"<td style ='width:5.5cm;border:1px solid gray; font-weight:700'>".$calculado[1]->nombre."</td>";
							echo "</tr>";
						}
						if($size2 ==3){
							echo "<tr>";
							echo"<td style ='border:1px solid gray; width:7cm; font-weight:700'>Descripcion</td>";
							echo"<td style ='width:3.66cm; border:1px solid gray; font-weight:700'>".$calculado[0]->nombre."</td>";
							echo"<td style ='width:3.66cm; border:1px solid gray; font-weight:700'>".$calculado[1]->nombre."</td>";
							echo"<td style ='width:3.66cm; border:1px solid gray; font-weight:700'>".$calculado[2]->nombre."</td>";
							echo "</tr>";
						}
					for($i=0;$i<$size;$i++){
						if($size2 ==1){
							$a = ($cob2[$i][4]!="")?$cob2[$i][4]:"sin datos";
							$a= trim($a);							
							$a1 =($a == "Excluido")?"color:red!important":"";
							
							echo "<tr>";
							echo"<td style ='border:1px solid gray; width:7cm;font-size:11px!important;'>".$cob2[$i][3]."</td>";
							echo"<td style ='border:1px solid gray; $a1' >".$a."</td>";
							echo "</tr>";
						}
						if($size2 ==2){
							$a = ($cob2[$i][4]!="")?$cob2[$i][4]:"sin datos";
							$b = ($cob2[$i][5]!="")?$cob2[$i][5]:"sin datos";
							$a= trim($a);
							$b= trim($b);
							$a1 =($a == "Excluido")?"color:red!important":"";
							$b1 =($b == "Excluido")?"color:red!important":"";
							
							echo "<tr>";
							echo"<td style ='border:1px solid gray; width:7cm;font-size:11px!important;'>".$cob2[$i][3]."</td>";
							echo"<td style ='border:1px solid gray; $a1'>".$a."</td>";
							echo"<td style ='border:1px solid gray; $b1'>".$b."</td>";
							echo "</tr>";
						}
						if($size2 ==3){
							$a = ($cob2[$i][4]!="")?$cob2[$i][4]:"sin datos";
							$b = ($cob2[$i][5]!="")?$cob2[$i][5]:"sin datos";
							$c = ($cob2[$i][6]!="")?$cob2[$i][6]:"sin datos";
							$a= trim($a);
							$b= trim($b);
							$c= trim($c);
							$a1 =($a == "Excluido")?"color:red!important":"";
							$b1 =($b == "Excluido")?"color:red!important":"";
							$c1 =($c == "Excluido")?"color:red!important":"";
							
							echo "<tr>";
							echo"<td style ='border:1px solid gray; width:7cm;font-size:11px!important'>".$cob2[$i][3]."</td>";
							echo"<td style ='width:3.66cm;border:1px solid gray; $a1'>".$a."</td>";
							echo"<td style ='width:3.66cm;border:1px solid gray; $b1'>".$b."</td>";
							echo"<td style ='width:3.66cm;border:1px solid gray; $c1'>".$c."</td>";
							echo "</tr>";
						}

					}
				?>
				</table>
			
			</section>
		<div style="width:18.4cm">
			<br><br>
			<small>
				<strong>Observaciones Importantes</strong>
				<ul>
					<li>Tomar en cuenta que el valor de las unidades quedan sujetas a inspección</li>
					<li>No cubre robo parcial de piezas de vehículo,asi mismo tampoco el robo parcial de equipos de audio y video. Se pueden incluir en la prima</li>
					<li>Se encuentra EXCLUIDO conductores en estado de ebriedad</li>					
				</ul>
			</small>
		</div>			

					

	</div>
	<footer>
		<div class="mycol mycol-4"><small>¡Estamos para servirles!</small></div>
		<div class="mycol mycol-4" style='text-align:center;'><small>Pagina #2</small></div>
		<div class="mycol mycol-4" style="text-align:right; border:none!important"><small> www.protegemos.com.gt </small></div>
	</footer>

</body>

<style>
	footer { position: fixed; bottom: -40px; left: 20px; right: 0px; background-color: #fff; color:#000; height: 25px; width:18cm; }
	.num{
		text-align: right!important;
		width:100%;
	}
	.top {
		height: 75px;
		border: 15px solid  #45D33F !important;
		position: relative;
		width: 18cm;
	}

	.tabla{
		width: 16.4cm;
		font-size: 11px;
		/* border: 1px solid silver; */
	}
	td{
		/* border: 1px solid silver; */
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
		width:4.15cm;
	}
	.num11{
		display:inline-block;
		width:16.8cm;
		text-align:right;
	}
	.asinfo{
		text-align: center!important;
	}
	.num1{
		text-align: right;
		display: inline-block;
		width:4.15cm!important;
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
		/* border-right: 1px dotted silver; */
		/* border: 1px solid silver; */
		margin-right: 5px;
		padding-top: 5px;
		/* height: auto; */
		
	}
	.mycol-4{
		width: 5.8cm;
		font-size:11px;
		border-right:1px solid gray;
		
	}
	.mycol-6{
		width:8.9cm;
		font-size:11px;
	}
	.mycol-12{
		/* width:19cm; */
		width:19cm;
		display: block;
		font-size:11px;
	}
	.info{
		border:none!important;
	}
	.max{
		max-width: 16.8cm;
	}
	h4{
		font-family: Arial, Helvetica, sans-serif!important;
	}
	h5{
		font-size:14px;
		font-weight: bold;
	}
	p{
		margin:0px;
	}
	
	#pdfco{
		padding-left:0.2cm!important;
	}
</style>

</body>
</html>
