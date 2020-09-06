

<!-- modal -->
<div id="msg" style="font-size:largest;">
<!-- you can set whatever style you want on this -->
Loading, please wait...
</div>
<div id="conall" class="container"  style="display:none;">
    <div class="row">
        <div class="col-md-12">
        <div class="form-group">
            <div class="row" style="border: 1px solid gray;display: block;background-color: silver;/*! margin-bottom: 135px; */">
                	<div class="col-md-4" >
						<strong>Aseguradora </strong> <input type="text" class="form-control" value="<?php echo $aseguradora; ?>" readonly>
					<br>
					</div>
					<div class="col-md-4">
						<strong>Tipo Vehículo</strong> <input type="text" class="form-control" value="<?php echo $tipovehiculo; ?>" readonly> <br>
					</div>
					<div class="col-md-4">
						 <strong>Tipo Seguros </strong> <input type="text" class="form-control" value="<?php echo $nombretiposeguro; ?>" readonly> <br>
					</div>
                    <input type="hidden" name="aseguradora"  value="<?php echo $aseguradora_id; ?>" id="aseguradora"  >
                    <input type="hidden" name="tipovehiculo" value="<?php echo $tipovehiculo_id; ?>" id="tipovehiculo" >
                    <input type="hidden" name="primaneta"  value="<?php echo $porcentaje; ?>"  id="primaneta" >
                    <input type="hidden" name="tiposeguro" value="<?php echo $tiposeguro; ?>"   id="tiposeguro" >
                    <input type="hidden" name="tipotarifa" value="<?php echo $tipotarifa_id; ?>"   id="tipotarifa" >

                </div>
                
            </div>
		</div>
		<section class ="ts" id="ts-9">
        <br>
        <div class="alert alert-danger" role="alert">
            Existen Campos Vacios, Porfavor Verifique
        </div>
        <h3> Prima Neta Mínima <small id="s9" class ="s"></small></h3>
            <!-- <span class="btn btn-info" id="add9">+</span> -->
            <span class="btn btn-success" id="sv9">Guardar</span>
            <table class="table table-striped" >
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Valor</th>                        
                    </tr>
                </thead>
                <tbody id="tbody9">
                    <?php 
                    $x =1;
                    foreach($pnm as $item){?>
                    <tr class="pnm" id="pnm-<?php echo $x ?>">
                        <td>
							<?php $pnm1 = (isset($pnm))?$pnm->pnm:""; ?>

                            <input  maxlength="8" value="<?php echo $pnm1 ?> " type="text" name="pnm-1" class="form-control pnmv" id="pnmv-1">
                        </td>  
                    </tr>
                    <?php $x++;  } ?>
                </tbody>
                </table>

		</section>
        <section class ="ts" id="ts-1" >
        <br>
        <div class="alert alert-danger" style="display:none" role="alert">
            Existen Campos Vacios, Porfavor Verifique
        </div>
            <h3>Cálculo de Prima Neta <small id="s1" class ="s"></small> </h3>

			<div class="row" >
				<div class="col-md-6" >
					<span class="btn btn-info" id="add1">+</span>
					<span class="btn btn-success" id="sv1">Guardar</span>
				</div>
				<div class="col-md-6" style="text-align:right;padding-right:35px" >
					<div class="form-group">
						<!-- <label for="">Monto de Prueba</label> -->
						<label for="">Valor del Vehículo</label>
						<input type="text" class="form-control" maxlength="10" id="group" style="display:inline-block">						
						<button class="btn btn-info" id="btnCalc">Calcular</button>
						<br><label for="">Prima Neta</label>
						<input readonly type="text" class="form-control" maxlength="10" id="pnml" style="display:inline-block">
						<button class="btn btn-info" id="btnLimpiar">Limpiar</button>
					</div>
				</div>
				<div class="col-md-6"></div>
				
			</div>

			
            <table class="table table-striped" >
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Descripción</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Posición </th>
						<th scope="col">Operación </th>
						<th scope="col">Descuento </th>
						
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php
					$x = 1;
					$primaneta1 = $primaneta;
                    foreach($isprimaneta as $item){?>
                    <tr class ="pn" id="pn-<?php echo $x ?>">
                        <td>
                            <select name="pnd-<?php echo $x; ?>" id="pnd-<?php echo $x; ?>" class="form-control pnd">
								<?php
									if($x!=1){
										foreach($primaneta as $it){
											$ndesc = substr($it->descripcion,0,50)."...";
											if($it->catalogoprimaneta_id != $item->catalogoprimaneta_id){
												echo "<option title='$it->descripcion' value='".$it->catalogoprimaneta_id."'>".$ndesc."</option>";
											}										
											else{
												echo "<option title='$it->descripcion' selected value='".$it->catalogoprimaneta_id."'>".$ndesc."</option>";
											}
										}
									}
									else{
										
										for($i=0;$i<1;$i++){
											echo "<option selected value='".$primaneta[$i]->catalogoprimaneta_id."'>".$primaneta[$i]->descripcion."</option>";
										}	
										unset($primaneta[0]);
									}

                                ?>
                            </select>

                        </td>
                        <td>
                            <input maxlength="9" value="<?php echo $item->valor?>" type="text" name="pnv-<?php echo $x; ?>" id="pnv-<?php echo $x; ?>" class="form-control pnv" >
                        </td>
                        <td>							
                            <input maxlength="2" <?php echo ($x==1)?"readonly":""; ?> value="<?php echo $item->sequencial?>" type="text" name="pnp-<?php echo $x; ?>" id="pnp-<?php echo $x; ?>" class="form-control pnp" >
                        </td>
                        <td>
                            <select name="pnmm-<?php echo $x; ?>" id="pnmm-<?php echo $x; ?>" class="form-control pnmm">                                    
                                <option value="+" <?php echo($item->operacion=="+")?"selected":" " ?> >+</option>
                                
                                <option value="%" <?php echo($item->operacion=="%")?"selected":" " ?> >%</option>
							</select>
						</td>
						<td>							
                            <input <?php echo($item->aplicadescuento=="si")?"checked":" " ?>  value="<?php //echo $item->sequencial?>" type="checkbox" name="pnds-<?php echo $x; ?>" id="pnds-<?php echo $x; ?>" class="pnds" >
                        </td>
						<?php if($x != 1){ ?>
						<td><span class="btn btn-danger remove" remove="pn-<?php echo $x ?>">-</span></td>
						<?php } ?>
                    </tr>
					<?php $x++;   
				}?>
                </tbody>
                </table>
		</section>
		<section class ="ts" id="ts-2">
        <br>
        <div class="alert alert-danger" role="alert">
            Existen Campos Vacios, Porfavor Verifique
        </div>
        <h3> Descuentos <small id="s2" class ="s"></small></h3>
            <span class="btn btn-info" id="add2">+</span>
            <span class="btn btn-success" id="sv2">Guardar</span>
            <table class="table table-striped" >
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Descripción</th>
                        <th scope="col">Valor</th>
                        
                        
                    </tr>
                </thead>
                <tbody id="tbody2">
                    <?php 
                    $x =1;
                    foreach($isdescuentos as $item){?>
                    <tr class="d" id="d-<?php echo $x ?>">
                        <td>
                            <select name="dd-1" class="form-control dd" id="dd-1">
                            <?php
                                // [descuento_id] => 1
                                // [tiposeguro_id] => 1
                                // [catalogodescuento_id] => 1
                                // [valor] => 30.00
                                // [esvalorfijo] => si
                                // [essobreprima] => si
                            ?>
                            <?php foreach($descuentos as $it){
								$ndesc = substr($it->descripcion,0,50)."...";
                                if($it->catalogodescuento_id !=$item->catalogodescuento_id){
                                    echo "<option title='$it->descripcion' value='".$it->catalogodescuento_id."'>".$ndesc."</option>";
                                }
                                else{
                                    echo "<option title='$it->descripcion' selected value='".$it->catalogodescuento_id."'>".$ndesc."</option>";
                                }
                            }?>
                            </select>    
                        </td>
                        <td>
                            <input maxlength="5" value="<?php echo $item->valor; ?>" type="text" name="dv-1" class="form-control dv" id="dv-1">
                        </td>    

                    </tr>
                    <?php $x++;  } ?>
                </tbody>
                </table>

		</section>
		<!-- prima neta minima -->

		<section class ="ts" id="ts-7" >
        <br>
        <div class="alert alert-danger" role="alert">
            Existen Campos Vacios, Porfavor Verifique
        </div>
            <h3>Deducibles <small id="s7" class ="s"></small> </h3>
            <span class="btn btn-info" id="add7">+</span>
            <span class="btn btn-success" id="sv7">Guardar</span>
            <table class="table table-striped" >
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Descripción</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Operación </th>
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>

                
                <tbody id="tbody7">
                    <?php
                    $x = 1;
                    foreach($isdeducible as $item){?>
                    <tr class ="de" id="de-<?php echo $x ?>">
                        <td>
                            <select name="ded-1" id="otd-1" class="form-control ded">
                                <?php
                                    foreach($deducible as $it){
										$ndesc = substr($it->descripcion,0,50)."...";
                                        if($it->catalogodeducible_id !=$item->catalogodeducible_id){
                                            echo "<option title='$it->descripcion' value='".$it->catalogodeducible_id."'>".$ndesc."</option>";
                                        }                          //   catalogodeducible_id
                                        else{
                                            echo "<option title='$it->descripcion' selected value='".$it->catalogodeducible_id."'>".$ndesc."</option>";
                                        }
                                    }
                                ?>
                            </select>

                        </td>
                        <td>
                            <input maxlength="9" value="<?php echo $item->valor?>" type="text" name="dev-1" id="dev-1" class="form-control dev" >
                        </td>
                        <td>
										
                            <select name="demm-1" id="demm-1" class="form-control demm">
                                <option value="+" <?php echo($item->operacion=="+")?"selected":" " ?> >+</option>                                
                                <option value="%" <?php echo($item->operacion=="%")?"selected":" " ?> >%</option>
                            </select>
                            
                        </td>

                        <td><span class="btn btn-danger remove" remove="de-<?php echo $x ?>">-</span>    </td>
                    </tr>
                                <?php $x++;  }?>
                </tbody>
                </table>
        </section>

        <section class ="ts" id="ts-8" >
        <br>
        <div class="alert alert-danger" style="display:none"  role="alert">
            Existen Campos Vacios, Porfavor Verifique
        </div>
            <h3>Recargos Adicionales <small id="s8" class ="s"></small> </h3>
            <span class="btn btn-info" id="add8">+</span>
            <span class="btn btn-success" id="sv8">Guardar</span>
            <table class="table table-striped" >
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Descripción</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Posición </th>
                        <th scope="col">Operación </th>
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>

                
                <tbody id="tbody8">
                    <?php
                    $x = 1;
                    foreach($isotroscargos as $item){?>
                    <tr class ="ot" id="ot-<?php echo $x ?>">
                        <td>
                            <select name="otd-1" id="otd-1" class="form-control otd">
                                <?php
                                    foreach($otroscargos as $it){
										$ndesc = substr($it->descripcion,0,50)."...";
                                        if($it->catalogootrocargo_id !=$item->catalogootrocargo_id){
                                            echo "<option title='$it->descripcion' value='".$it->catalogootrocargo_id."'>".$ndesc."</option>";
                                        }
                                        else{
                                            echo "<option title='$it->descripcion' selected value='".$it->catalogootrocargo_id."'>".$ndesc."</option>";
                                        }
                                    }
                                ?>
                            </select>

                        </td>
                        <td>
                            <input maxlength="9" value="<?php echo $item->valor?>" type="text" name="otv-<?php echo $x; ?>" id="otv-<?php echo $x; ?>" class="form-control otv" >
                        </td>
                        <td>
                            <input maxlength="2" value="<?php echo $item->sequencial?>" type="text" name="otp-<?php echo $x; ?>" id="otp-<?php echo $x; ?>" class="form-control otp" >
                        </td>
                        <td>
							<?php //echo $item->operacion."-----------" ?>
                            <select name="otmm-<?php echo $x ?>" id="otmm-<?php echo $x ?>" class="form-control otmm">                                    
                                <option value="+" <?php echo($item->operacion=="+")?"selected":" " ?> >+</option>
                                
                                <option value="%" <?php echo($item->operacion=="%")?"selected":" " ?> >%</option>
							</select>
                        </td>
                        <td><span class="btn btn-danger remove" remove="ot-<?php echo $x ?>">-</span>    </td>
                    </tr>
                    <?php $x++;   }?>
                </tbody>
                </table>
        </section>

        <section class ="ts" id="ts-3">
        <br>
        <div class="alert alert-danger" role="alert">
            Existen Campos Vacios, Porfavor Verifique
        </div>
        <h3>Sección IAB <small id="s3" class ="s"></small></h3>
            <span class="btn btn-info" id="add3">+</span>
            <span class="btn btn-success" id="sv3">Guardar</span>
            <table class="table table-striped" >
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Descripción</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody id="tbody3">
                    <?php  $x = 1;
                    foreach($isiab as $item){?>
                    <tr class ="iab" id="iab-<?php echo $x ?>">
                        <td>
                            <!-- <input type="text" name="iab-1" id="iabd-1" class="form-control iabd" > -->
                            <select name="iabd-1" id="iabd-1" class="form-control iabd">
                                <?php
                                    foreach($iab as $it){
										$ndesc = substr($it->descripcion,0,50)."...";
                                        if($it->catalogoiab_id !=$item->catalogoiab_id){
                                            echo "<option title='$it->descripcion' value='".$it->catalogoiab_id."'>".$ndesc."</option>";
                                        }
                                        else{
                                            echo "<option title='$it->descripcion' selected value='".$it->catalogoiab_id."'>".$ndesc."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input maxlength=70 value="<?php echo $item->valor; ?>" type="text" name="iab-1" id="iabv-1" class="form-control iabv" >
                        </td>
                        <td><span class="btn btn-danger remove" remove="iab-<?php echo $x ?>">-</span>    </td>
                    </tr>
                    <?php $x++;  }?>
                </tbody>
                </table>
        </section>

        <section class ="ts" id="ts-4">
        <br>
        <div class="alert alert-danger" role="alert">
            Existen Campos Vacios, Porfavor Verifique
        </div>
        <h3>Sección IIAB <small id="s4" class ="s"></small></h3>
            <span class="btn btn-info" id="add4">+</span>
            <span class="btn btn-success" id="sv4">Guardar</span>
            <table class="table table-striped" >
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Descripción</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>

                
                <tbody id="tbody4">
                    <?php 
                    $x1 =1;
                    foreach($isiiab as $item){?>
                    <tr class ="iiab" id="iiab-<?php echo $x ?>">
                        <td>
                            <!-- <input type="text" name="iiabd-1" id="iiabd-1" class="form-control iiabd" > -->
                            <select name="iiabd-1" id="iiabd-1" class="form-control iiabd">
                                <?php
                                    foreach($iiab as $it){
										$ndesc = substr($it->descripcion,0,50)."...";
                                        if($it->catalogoiiab_id !=$item->catalogoiiab_id){
                                            echo "<option title='$it->descripcion' value='".$it->catalogoiiab_id."'>".$ndesc."</option>";
                                        }
                                        else{
                                            echo "<option title='$it->descripcion' selected value='".$it->catalogoiiab_id."'>".$ndesc."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input maxlength=70 value="<?php echo $item->valor; ?>" type="text" name="iiabd-1" id="iiabv-1" class="form-control iiabv" >
                        </td>
                        <td><span class="btn btn-danger remove" remove="iiab-<?php echo $x ?>">-</span>    </td>
                    </tr>
                    <?php $x++;  }?>
                </tbody>
                </table>
        </section>
        <section class ="ts" id="ts-5">
        <br>
        <div class="alert alert-danger" role="alert">
            Existen Campos Vacios, Porfavor Verifique
        </div>
        <h3>Sección IIIAB <small id="s5" class ="s"></small></h3>
            <span class="btn btn-info" id="add5">+</span>
            <span class="btn btn-success" id="sv5">Guardar</span>
            <table class="table table-striped" >
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Descripción</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>                
                <tbody id="tbody5">
                <?php 
                $x = 1;    
                foreach($isiiiab as $item){?>
                    <tr class ="iiiab" id="iiiab-<?php echo $x ?>">
                        <td>
                            <!-- <input type="text" name="otd-1" id="iiiabv-1" class="form-control iiiabd" > -->

                            <select name="iiiabd-1" id="iiiabd-1" class="form-control iiiabd">
                                <?php
                                    foreach($iiiab as $it){
										$ndesc = substr($it->descripcion,0,50)."...";
                                        if($it->catalogoiiiab_id !=$item->catalogoiiiab_id){
                                            echo "<option title='$it->descripcion' value='".$it->catalogoiiiab_id."'>".$ndesc."</option>";
                                        }
                                        else{
                                            echo "<option title='$it->descripcion' selected value='".$it->catalogoiiiab_id."'>".$ndesc."</option>";
    
                                        }
                                        
                                    }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input maxlength=70 value="<?php echo $item->valor; ?>" type="text" name="otv-1" id="iiiabv-1" class="form-control iiiabv" >
                        </td>
                        <td><span class="btn btn-danger remove" remove="iiiab-<?php echo $x ?>">-</span>    </td>
                    </tr>
                                <?php $x++;  }?>
                </tbody>
                </table>
        </section>
        <section class ="ts" id="ts-6">
        <br>
        <div class="alert alert-danger" role="alert">
            Existen Campos Vacios, Porfavor Verifique
        </div>
        <h3>Coberturas <small id="s6" class ="s"></small></h3>
            <span class="btn btn-info" id="add6">+</span>
            <span class="btn btn-success" id="sv6">Guardar</span>
            <table class="table table-striped" >
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Descripción</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody id="tbody6">
                <?php
                    $x =1;    
                    foreach($iscobertura as $item){?>
                    <tr class ="ot" id="c-<?php echo $x ?>">
                        <td>
                            <!-- <input type="text" name="c-1" id="cd-1" class="form-control cd" > -->
                            <select name="c-1" id="c-1" class="form-control cd">
                            <?php
                                foreach($cobertura as $it){
									$ndesc = substr($it->descripcion,0,50)."...";
                                    if($it->catalogocobertura_id !=$item->catalogocobertura_id){
                                        echo "<option title='$it->descripcion' value='".$it->catalogocobertura_id."'>".$ndesc."</option>";
                                    }
                                    else{
                                        echo "<option title='$it->descripcion' selected value='".$it->catalogocobertura_id."'>".$ndesc."</option>";

                                    }
                                    
                                }
                            ?>
                            </select>
                        </td>
                        <td>
                            <input maxlength=70 type="text" name="cv-1" id="cv-1" value ="<?php echo $item->valor; ?>" class="form-control cv" >
                        </td>
                        <td><span class="btn btn-danger remove" remove="c-<?php echo $x ?>">-</span>    </td>
                    </tr>
                    <?php $x++; }?>
                </tbody>
                </table>
        </section>

		
		<!-- modal -->



        </div>
    </div>
</div>


    <script src="http://seguros.sin404.com/assets/grocery_crud/js/jquery-1.11.1.min.js"></script>
    <script src="http://seguros.sin404.com/assets/grocery_crud/js/common/list.js"></script>    
    <script src="http://seguros.sin404.com/assets/grocery_crud/js/jquery_plugins/jquery.fancybox-1.3.4.js"></script>
    <script src="http://seguros.sin404.com/assets/grocery_crud/js/jquery_plugins/jquery.easing-1.3.pack.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>

<script>
</script>

<script>
(function(){
	$( "#conall" ).load(function() {
  		// Handler for .load() called.
			$('#myModal').modal('show');
			// $('#myModal').modal('hide');
	});
    $(document).ready(function(){
		
    	$('#conall').show();
    	$('#msg').hide();
		
        cobertura = <?php echo json_encode($cobertura) ?>;
        descuentos = <?php echo json_encode($descuentos) ?>;
        iab = <?php echo json_encode($iab) ?>;
        iiab = <?php echo json_encode($iiab) ?>;
        iiiab = <?php echo json_encode($iiiab) ?>;
        otroscargos = <?php echo json_encode($otroscargos) ?>;
		deducible = <?php echo json_encode($deducible) ?>;
		primaneta1 = <?php echo json_encode($primaneta1) ?>;
        $.noConflict();
        adTr();
        adTr2();
        adTr3();
        adTr4();
        adTr5();
        adTr6();
        adTr7();
        adTr8();
        remove();
		removeError();
		onlyNumber();
		srem();
		calcular();
		btnLimpiar();
		
        // $('.alert').alert('close');
        $("#sv1").click(function(){
            send= validateM(["pnv","pnp"]);
            if(send == true){
                container =[];
                container2 =[];
                container3 =[];
                container4 =[];
                container5 =[];
                format={
                    "decripcion":"",
                    "valor":"",
                    "masmenos":"",
                    "valorfijo":"",
                    "cspn":"",
                    "operacion":"otroscargos"    
                }
                cd  = $('.pnd');
                cv  = $('.pnv');
                cmm = $('.pnmm');
                cp = $('.pnp')
                pnds = $('.pnds')
                
                ln  = cd.length;
                for (i=0;i<ln;i++){
                    id = "#"+$(cmm[i]).attr("id");
					id2 = "#"+$(pnds[i]).attr("id");
                    container[i]=$(cd[i]).val();
                    container2[i]=$(cv[i]).val();
                    container3[i]=$(id+" option:selected").val();
                    container4[i]=$(cp[i]).val();
					container5[i]=checked = ($(pnds[i]).prop('checked')?"si":"no");
                }
                info={
                    "descripcion":container,
                    "valor":container2,
                    "masmenos":container3,
                    "posicion":container4,
                    "descuento":container5,
                    "operacion":"primaneta",
                    "tiposeguro":$('#tiposeguro').val(),
                    "tipovehiculo":$('#tipovehiculo').val(),
                    "primaneta":$('#primaneta').val(),
                    "tiposeguro":$('#tiposeguro').val(),
                    "aseguradora":$('#aseguradora').val(),
                    "tipotarifa":$('#tipotarifa').val()


                    
                }
                sendPost(info,"s1");
                console.log(container);
            }
			srem()
        });
        $("#sv8").click(function(){
            send= validateM(["otv","otp"]);
            if(send == true){
                container =[];
                container2 =[];
                container3 =[];
                container4 =[];
                container5 =[];
                format={
                    "decripcion":"",
                    "valor":"",
                    "masmenos":"",
                    "valorfijo":"",
                    "cspn":"",
                    "operacion":"otroscargos"    
                }
                cd  = $('.otd');
                cv  = $('.otv');
                cmm = $('.otmm');
				cp = $('.otp')


                ln  = cd.length;
                for (i=0;i<ln;i++){
                    id = "#"+$(cmm[i]).attr("id");
                    container[i]=$(cd[i]).val();
                    container2[i]=$(cv[i]).val();
                    container3[i]=$(id+" option:selected").val();
					container4[i]=$(cp[i]).val();
                }
                info={
                    "descripcion":container,
                    "valor":container2,
                    "masmenos":container3,
                    "posicion":container4,
                    "operacion":"otroscargos",
                    "tiposeguro":$('#tiposeguro').val(),
                    "tipovehiculo":$('#tipovehiculo').val(),
                    "primaneta":$('#primaneta').val(),
                    "tiposeguro":$('#tiposeguro').val(),
                    "aseguradora":$('#aseguradora').val(),
                    "tipotarifa":$('#tipotarifa').val()
                    
                }
                sendPost(info,"s8");
                console.log(container);
            }
			srem();
        });
        $("#sv7").click(function(){
            send= validateM(["dev"]);
            if(send == true){
                container =[];
                container2 =[];
                container3 =[];
                container4 =[];
                container5 =[];
                format={
                    "decripcion":"",
                    "valor":"",
                    "masmenos":"",
                    "valorfijo":"",
                    "cspn":"",
                    "operacion":"otroscargos"    
                }
                cd  = $('.ded');
                cv  = $('.dev');
                cmm = $('.demm');
                cvf = $('.devf')
                cc  = $('.dec');
                ln  = cd.length;
                for (i=0;i<ln;i++){
                    id = "#"+$(cmm[i]).attr("id");
                    id2 = "#"+$(cvf[i]).attr("id");
                    container[i]=$(cd[i]).val();
                    container2[i]=$(cv[i]).val();
                    container3[i]=$(id+" option:selected").val();
                    container4[i]=$(cvf[i]).is(":checked");
                    container5[i]=$(cc[i]).is(":checked");
                }
                info={
                    "descripcion":container,
                    "valor":container2,
                    "masmenos":container3,
                    "valorfijo":container4,
                    "cspn":container5,
                    "operacion":"deducibles",
                    "tiposeguro":$('#tiposeguro').val(),
                    "tipovehiculo":$('#tipovehiculo').val(),
                    "primaneta":$('#primaneta').val(),
                    "tiposeguro":$('#tiposeguro').val(),
                    "aseguradora":$('#aseguradora').val(),
                    "tipotarifa":$('#tipotarifa').val()
                    
                }
                sendPost(info,"s7")
                console.log(container);
            }
			srem();
        });
        $("#sv2").click(function(){
            send= validateM(["dv"]);
            if(send == true){
                container =[];
                container2 =[];
                // container3 =[];
                container4 =[];
                container5 =[];
                format={
                    "decripcion":"",
                    "valor":"",
                    "masmenos":"",
                    "valorfijo":"",
                    "cspn":"",
                    "operacion":"otroscargos"    
                }
                cd = $('.dd');
                cv = $('.dv');
                cmm = $('.dmm');
                cvf = $('.dvf');
                cc = $('.dc');
                ln = cd.length;
                ln  = cd.length;
                for (i=0;i<ln;i++){
                    id = "#"+$(cmm[i]).attr("id");
                    id2 = "#"+$(cvf[i]).attr("id");
                    container[i]=$(cd[i]).val();
                    container2[i]=$(cv[i]).val();
                    // container3[i]=$(id+" option:selected").val();
                    // container4[i]=$(cvf[i]).is(":checked");
                    // container5[i]=$(cc[i]).is(":checked");
                }
                info={
                    "descripcion":container,
                    "valor":container2,
                    // "valorfijo":container4,
                    // "cspn":container5,
                    "operacion":"descuentos",
                    "tipovehiculo":$('#tipovehiculo').val(),
                    "primaneta":$('#primaneta').val(),
                    "tiposeguro":$('#tiposeguro').val(),
                    "aseguradora":$('#aseguradora').val(),
                    "tipotarifa":$('#tipotarifa').val()
                }
                sendPost(info,"s2");
                console.log(container);
            }   
			srem();


        });
        $("#sv3").click(function(){
            send= validateM(["iabv"]);
			send = true;
            if(send == true){
                container =[];
                container2 =[] 
                format={
                    "decripcion":"",
                    "valor":""
                }
                cd = $('.iabd');
                cv = $('.iabv');
                ln = cd.length;
                for (i=0;i<ln;i++){
                    container[i]=$(cd[i]).val();
                    container2[i]=$(cv[i]).val();
                }
                info={
                    "descripcion":container,
                    "valor":container2,
                    "operacion":"iab",
                    "tipovehiculo":$('#tipovehiculo').val(),
                    "primaneta":$('#primaneta').val(),
                    "tiposeguro":$('#tiposeguro').val(),
                    "aseguradora":$('#aseguradora').val(),
                    "tipotarifa":$('#tipotarifa').val()
                }
                sendPost(info,"s3");
                console.log(container);
            }
            srem();
        });

		$("#sv9").click(function(){
            send= validateM(["pndv"]);
			send = true;
            if(send == true){
                container =[];
                container2 =[] 
                format={
					"tiposeguro":$('#tiposeguro').val(),
                    "valor":$(".pnmv").val()
                }
				console.log(format);
                sendPost(format,"s9");
                
            }
            srem();
        });

        $("#sv4").click(function(){
            send= validateM(["iiabv"]);
            if(send == true){
                container =[];
                container2 =[] 
                format={
                    "decripcion":"",
                    "valor":"",
                    "operacion":"cobertura" 
                }
                cd = $('.iiabd');
                cv = $('.iiabv');
                ln = cd.length;
                for (i=0;i<ln;i++){
                    container[i]=$(cd[i]).val();
                    container2[i]=$(cv[i]).val();
                }
                info={
                    "descripcion":container,
                    "valor":container2,
                    "operacion":"iiab",
                    "tipovehiculo":$('#tipovehiculo').val(),
                    "primaneta":$('#primaneta').val(),
                    "tiposeguro":$('#tiposeguro').val(),
                    "aseguradora":$('#aseguradora').val(),
                    "tipotarifa":$('#tipotarifa').val()
                }
                sendPost(info,"s4");

                console.log(container);
            }
			srem();
            console.log(container);
        });
        $("#sv5").click(function(){
            send= validateM(["iiiabv"]);
            if(send == true){
                container =[];
                container2 =[] 
                format={
                    "decripcion":"",
                    "valor":"",
                    "operacion":"cobertura" 
                }
                cd = $('.iiiabd');
                cv = $('.iiiabv');
                ln = cd.length;
                for (i=0;i<ln;i++){
                    container[i]=$(cd[i]).val();
                    container2[i]=$(cv[i]).val();
                }
                info={
                    "descripcion":container,
                    "valor":container2,
                    "operacion":"iiiab",
                    "tipovehiculo":$('#tipovehiculo').val(),
                    "primaneta":$('#primaneta').val(),
                    "tiposeguro":$('#tiposeguro').val(),
                    "aseguradora":$('#aseguradora').val(),
                    "tipotarifa":$('#tipotarifa').val()
                }
                sendPost(info,"s5");

                console.log(container);
            }
            srem();
            console.log(container);
        });
        $("#sv6").click(function(){
            send= validateM(["cv"]);
            console.log("entro aca")
            if(send == true){
                container =[];
                container2 =[] 
                format={
                    "decripcion":"",
                    "valor":"",
                    "operacion":"cobertura" 
                }
                cd = $('.cd');
                cv = $('.cv');
                ln = cd.length;
                for (i=0;i<ln;i++){
                    container[i]=$(cd[i]).val();
                    container2[i]=$(cv[i]).val();
                }
                info={
                    "descripcion":container,
                    "valor":container2,
                    "operacion":"coberturas",
                    "tipovehiculo":$('#tipovehiculo').val(),
                    "primaneta":$('#primaneta').val(),
                    "tiposeguro":$('#tiposeguro').val(),
                    "aseguradora":$('#aseguradora').val(),
                    "tipotarifa":$('#tipotarifa').val()
                }
                sendPost(info,"s6");
                console.log(container);
            }
            srem();
            console.log(container);
        });
        $('.alert-danger').hover(function(){
            $(this).hide("slow");
        });

    });
})();
adTr = function(){
    $('#add1').click(function(){
        n = $('#tbody').children().length +1;
        str = "";
        str+="<tr class ='pn' id='pn-"+n+"'>";
        str+="    <td>";
        str+=addSelect2(n,"pnd",primaneta1,"catalogoprimaneta_id");
        str+="    </td>";
        str+="    <td>";
        str+=addTx(n,"pnv","text");
        str+="    </td>";
        str+="    <td>";
		str+=addTx(n,"pnp","text");
        str+="    </td>";
        str+="    <td>";
		str+=addSelect(n,"pnmm");
        str+="    </td>";
        str+="    <td>";
		str+=addTx(n,"pnds","checkbox");
        str+="    </td>";
        str+="    <td>";
        str+=addRemove(n,"pn");
        str+="    </td>";
        str+="</tr>";
        $('#tbody').append(str);
        remove();
        removeError();
		onlyNumber();
		isOne();
		$('.pnv').attr("maxlength",9);
		$('.pnp').attr("maxlength",2);
    });
}
adTr8 = function(){
    $('#add8').click(function(){
        n = $('#tbody8').children().length +1;
        str = "";
        str+="<tr class ='ot' id='ot-"+n+"'>";
        str+="    <td>";
        str+=addSelect2(n,"otd",otroscargos,"catalogootrocargo_id");
        str+="    </td>";
        str+="    <td>";
        str+=addTx(n,"otv","text");
        str+="    </td>";
        str+="    <td>";
		str+=addTx(n,"otp","text");
        str+="    </td>";
        str+="    <td>";
		str+=addSelect(n,"otmm");
        str+="    </td>";
        str+="    <td>";
        str+=addRemove(n,"ot");
        str+="    </td>";
        str+="</tr>";
        $('#tbody8').append(str);
        remove();
        removeError();
		onlyNumber();
		$('.otv').attr("maxlength",9);
		$('.otp').attr("maxlength",2);
    });

}
adTr7 = function(){
    $('#add7').click(function(){
        n = $('#tbody8').children().length +1;
        str = "";
        str+="<tr class ='de' id='de-"+n+"'>";
        str+="    <td>";
        str+=addSelect2(n,"ded",deducible,"catalogodeducible_id");
        str+="    </td>";
        str+="    <td>";
        str+=addTx(n,"dev","text");
        str+="    </td>";
        str+="    <td>";
        str+=addSelect(n,"demm");
        str+="    </td>";

        str+="    <td>";
        str+=addRemove(n,"de");
        str+="    </td>";
        str+="</tr>";
        $('#tbody7').append(str);
        remove();
        removeError();
		onlyNumber();
		$('.dev').attr("maxlength",9);
		
    });

}

adTr2 = function(){
    $('#add2').click(function(){
        n = $('#tbody2').children().length +1;
		if(n == 1){
			str = "";
			str+="<tr class ='d' id='d-"+n+"'>";
			str+="    <td>";
			str+=addSelect2(n,"dd",descuentos,"catalogodescuento_id");
			str+="    </td>";
			str+="    <td>";
			str+=addTx(n,"dv","text");
			str+="    </td>";
			// str+="    <td>";
			// str+=addTx(n,"dvf","checkbox","Valor Fijo")+"<br>";
			// str+=addTx(n,"otc","checkbox", "Calculado Sobre Prima Neta");
			// str+="    </td>";
			str+="    <td>";
			str+=addRemove(n,"d");
			str+="    </td>";
			str+="</tr>";
			$('#tbody2').append(str);
			remove();
			removeError();
			onlyNumber();
			$('.dv').attr("maxlength",5);
			
		}

    });

}
adTr3 = function(){
    $('#add3').click(function(){
        n = $('#tbody3').children().length +1;
        str = "";
        str+="<tr class ='iab' id='iab-"+n+"'>";
        str+="    <td>";
        // str+=addTx(n,"iabd","text");
        str+=addSelect2(n,"iabd",iab,"catalogoiab_id");
        str+="    </td>";
        str+="    <td>";
        str+=addTx(n,"iabv","text");
        str+="    </td>";
        str+="    <td>";
        str+=addRemove(n,"iab");
        str+="    </td>";
        str+="</tr>";
        $('#tbody3').append(str);
        remove();
        removeError();
		onlyNumber();
		$('.iabv').attr("maxlength",70);
    });

}
adTr4 = function(){
    $('#add4').click(function(){
        n = $('#tbody4').children().length +1;
        str = "";
        str+="<tr class ='iiab' id='iiab-"+n+"'>";
        str+="    <td>";
        // str+=addTx(n,"iiabd","text");
        str+=addSelect2(n,"iiabd",iiab,"catalogoiiab_id");
        str+="    </td>";
        str+="    <td>";
        str+=addTx(n,"iiabv","text");
        str+="    </td>";
        str+="    <td>";
        str+=addRemove(n,"iiab");
        str+="    </td>";
        str+="</tr>";
        $('#tbody4').append(str);
        remove();
		onlyNumber();
		$('.iiabv').attr("maxlength",70);
    });

}
adTr5 = function(){
    $('#add5').click(function(){
        n = $('#tbody5').children().length +1;
        str = "";
        str+="<tr class ='iiiab' id='iiiab-"+n+"'>";
        str+="    <td>";
        str+=addSelect2(n,"iiiabd",iiiab,"catalogoiiiab_id");
        str+="    </td>";
        str+="    <td>";
        str+=addTx(n,"iiiabv","text");
        str+="    </td>";
        str+="    <td>";
        str+=addRemove(n,"iiiab");
        str+="    </td>";
        str+="</tr>";
        $('#tbody5').append(str);
        remove();
        removeError();
		onlyNumber();
		
		$('.iiiabv').attr("maxlength",70);
    });

}
adTr6 = function(){
    $('#add6').click(function(){
        n = $('#tbody6').children().length +1;
        str = "";
        str+="<tr class ='c' id='c-"+n+"'>";
        str+="    <td>";
        // str+=addTx(n,"cd","text");
        str+=addSelect2(n,"cd",cobertura,"catalogocobertura_id");
        
        str+="    </td>";
        str+="    <td>";
        str+=addTx(n,"cv","text");
        str+="    </td>";
        str+="    <td>";
        str+=addRemove(n,"c");
        str+="    </td>";
        str+="</tr>";
        $('#tbody6').append(str);
        remove();
        removeError();
		onlyNumber();
		$('.cv').attr("maxlength",70);
    });

}

addSelect = function(n,nam){
    str = "<select name='"+nam+"-"+n+"' class='form-control "+nam + "' id='"+nam+"-"+n+"'>";
    str+= "<option value='%'>%</option>";
    
    str+= "<option value='+'>+</option>";
    str+= "</select>";
    return str;
}
addSelect2 = function(n,nam,object,id){

	if((nam =="pnd")&& (n==1)){
		n0 = 0;
	}
	else{
		if(nam=="pnd"){
			n0=1;
		}
		else{
			n0=0;
		}
	}
    str = "<select name='"+nam+"-"+n+"' class='form-control "+nam + "' id='"+nam+"-"+n+"'>";
    for(i=n0;i<object.length;i++){
		//res = str.substr(1, 4);
		temp11= object[i].descripcion;
		ndesc = object[i].descripcion.substr(0,50);
        str+= "<option title='"+temp11+"'value='"+object[i][id]+"'>"+ndesc+"..."+"</option>";
    }
    
    // str+= "<option value='"+object[id]+"'>"+object.descripcion+"</option>";
    str+= "</select>";
    return str;
}
addTx = function(n,nam,type,lbl=""){
    if(type !="checkbox"){
        str = "<input type='"+type+"' name='"+nam+"-"+n+"' class='form-control "+nam+"' id='"+nam+"-"+n+"'>"+" "+lbl+ " " ;
    }
    else{
        str = "<input value='"+n+"' type='"+type+"' name='"+nam+"-"+n+"' class='"+nam+"' id='"+nam+"-"+n+"'>"+" "+lbl+ " " ;
    }
    
    return str;
}
addRemove = function(n,nam){
    str = "<span  class='btn btn-danger remove' remove ='"+nam+"-"+n+"' id='remove"+nam+n+"' >-</span>";
    return str;
}
remove = function(){
    $('.remove').click(function(){
        id = "#"+$(this).attr('remove');
        $(id).remove();
    });

}
validateField = function(name){
    str = "."+name;
    a = $(str);
    isOk = true;
    for(i=0;i<a.length;i++){
        temp =$(a[i]).val();
        if((temp.length<1)){
            isOk =false;
            $(a[i]).addClass('error');
            id = "#"+  $(a[i]).parent().parent().parent().parent().parent().attr("id");
            $(id+' .alert-danger').show("slow")

        }
    }
    if(a.length ==0){
        isOk = false;
    }
    
    return isOk;
}
validateM =function(arr){
    for(j=0;j<arr.length;j++){
        temp = validateField(arr[j]);
		if(temp == false){
			return temp;
		}
    }
    return temp;
}
removeError = function(){
    $('.form-control').keyup(function(){
        if(($(this).val().length > 0)&& ($(this).val()!="") && ($(this).val()!=" ") ){
            $(this).removeClass("error")
        }
    });
}
sendPost = function(info,idResponse){
	if(idResponse !="s9"){
		jQuery.post( "<?php echo base_url("temporal/insanddelete"); ?>", info , function(data) {
			$("#"+idResponse).html("Registro Insertado con Exito");
			$("#"+idResponse).show();
    	});
	}
	else{
		jQuery.post( "<?php echo base_url("temporal/pnm"); ?>", info , function(data) {
			$("#"+idResponse).html("Registro Insertado con Exito");
			$("#"+idResponse).show();
    	});
	}

    
}
srem = function(){
    $('.s').hover(function(){
        $(this).hide("slow");
    });
}
onlyNumber =function(){
    $('.pnv , .pnp , .otv , .otp, .dv , .pnmv').keyup(function() {
        var $this = $(this);
        $this.val($this.val().replace(/[^\d.]/g, ''));        
    });	
}
isOne =function(){
	// #grupo

	a =$("#pnd-1").children();
	b=a[0];
	$("#pnd-1").empty();
	$("#pnd-1").prepend(b);
	//------------
	// a =$("#pnmm-1").children();
	// b=a[2];
	// $("#pnmm-1").empty();
	// $("#pnmm-1").prepend("<option value='%'>%</option>");
	//------------
	$("#pnp-1").val("1");
	$("#pnp-1").attr("readonly",true);
	$("#removepn1").hide();
	

	
}
calcular = function(){
	$('#btnCalc').click(function(){
		flag1 = $('#group').val();
		if(flag1 !=""){
			pnmm1 = $('.pnmm');
			pos1 = $('.pnp')
			pnv1 = $('.pnv');
			pnds1 = $(".pnds");
			c1 = [];
			c2 = [];
			c3 = [];
			c7 = [];
			c4 =$("#pnmv-1").val();
			c4 = parseFloat(c4);		
			c5 =$("#group").val();
			c5 = c5.replace(",","");
			c5 = parseFloat(c5);
			c6 =$("#dv-1").val();			

			if(c6!=""){
				c6 = parseFloat(c6);
			}
			else{
				c6 = 0;
			}
			for(i=0;i<pnmm1.length;i++){
				c1[i] = $(pnmm1[i]).val();
			}
			for(i=0;i<pos1.length;i++){
				c2[i]= $(pos1[i]).val();
			}
			for(i=0;i<pnv1.length;i++){
				c3[i] = parseFloat($(pnv1[i]).val());
			}
			for(i=0;i<pnds1.length;i++){
				c7[i] = $(pnds1[i]).prop("checked");
			}
			cnt =0;
			acum =0;
			while(cnt < c3.length){
				tmp1= c1[cnt];
				tmp2 = c3[cnt];
				tmp3 = c7[cnt];
				if(tmp1 == "%"){
					valor = c5*(tmp2/100);
					valor = aplicadescuento(valor,tmp3,c6)
					acum = acum + valor;
				}
				else{
					valor = tmp2;
					valor = aplicadescuento(valor,tmp3,c6);
					acum = acum+valor;
				}
				cnt++;
			}
			if(c4>acum){
				acum = c4;			
				acum = acum.toFixed(2);
				$("#pnml").val(acum);
			}
			else{
				
				$("#pnml").val(acum.toFixed(2));
			}
			
			console.log("------------");
			console.log(pnmm1);
			console.log(pos1);
			console.log(pnv1);
			console.log("------------");
		}
		else{
			$("#group").focus();
			$("#group").val("0.00")
			$("#group").val("0.00")
		}
		
	});
}
aplicadescuento = function(nvalor1, aplica,desc1){
	if(aplica == true){
		nn = nvalor1* (desc1/100);
		nvalor1 = nvalor1-nn;
		return nvalor1;
	}
	else{
		return nvalor1;
	}
}
onlyNumber =function(){

	$('#group').mask('000,000,000,000,000.00', {reverse: true});
	$('#dv-1').mask('000.00', {reverse: true});

}
btnLimpiar = function(){
	$("#btnLimpiar").click(function(){
		$("#pnml").val("0.00");
		$("#group").val("0.00");
	})
}

</script>
<style>
.pnmv{
	text-align: right;
}
.ts{
    border: 1px dotted blue;
    padding: 0px 15px;
    margin-top:10px;
    background-color:#fff;
}
.error{
    border-color:red;
}
.alert-danger{
    display:none;
}
.ts, h3{
    font-family:arial !important;
}
.btn {
    color: #ffffff;
    background-color: #ff2d55;
    border-color: #ff2d55;
    background-color: #fff;
    border: 1px solid #d3d3d3;
    color: #555;
    font-weight: normal;
    box-shadow: 0 0 4px
    rgba(0, 0, 0, 0.2);
    padding: 0px;
    width: 75px;
    border-radius: 0;
}
.form-control {
    max-width: 200px;
    border-radius: 0 !important;
    padding: 0px;
    height: auto;
    height: 25px;

}
.s{
    color:orange!important;
}
</style>
