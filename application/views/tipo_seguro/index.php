<?php foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php     
    echo $output;
?>
<?php foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<script>
	claseSeg = <?php echo json_encode($clase_seguro); ?>	

</script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>

(function(){
    $(document).ready(function(){
		appendBtn();
		changeInput();
    });
})();
appendBtn = function(){
    url = window.location.href;
    vec = url.split("/");
    size = vec.length;
    last = vec[size-1];
    link = "<a href ='" + base_url + "tiposeguro/config/" +last+ "' type='button' value='Volver a la lista' class='ui-input-button back-to-list ui-button ui-widget ui-state-default ui-corner-all mbtn' >Ir a Configuracion</a>";
    if(vec[size-2] == "read"){
        $('.form-button-box').append(link);
    }
    
}
appendBtn2 = function(){
    url = window.location.href;
    vec = url.split("/");
    size = vec.length;
    last = vec[size-1];
}
changeInput = function(){
	
	url = window.location.href;
    vec = url.split("/");
    size = vec.length;
    last = vec[size-1];
    
	if(vec[size-1] == "add" ){
		$("#nombretiposeguro_input_box").html("");
		string ="<select id='field-nombretiposeguro' class='form-control' name='nombretiposeguro'>"
		for(i=0;i<claseSeg.length;i++){		
			string+="<option value='"+claseSeg[i].nombre+ "'>"+claseSeg[i].nombre+"</option>";
		}
		string+="</select>"
		$("#nombretiposeguro_input_box").html(string);
	}

	if(vec[size-2] == "edit"){
		val =  $("#field-nombretiposeguro").val();
		$("#nombretiposeguro_input_box").html("");
		string ="<select id='field-nombretiposeguro' class='form-control' name='nombretiposeguro'>"
		for(i=0;i<claseSeg.length;i++){		
			if(claseSeg[i].nombre == val){
				string+="<option selected value='"+claseSeg[i].nombre+ "'>"+claseSeg[i].nombre+"</option>";
			}
			else{
				string+="<option value='"+claseSeg[i].nombre+ "'>"+claseSeg[i].nombre+"</option>";	
			}
			
		}
		string+="</select>"
		$("#nombretiposeguro_input_box").html(string);
	}

	


	
}
</script>
<style>
.mbtn{
    padding:4px;
}
#nombretiposeguro_input_box{
	width:300px;
}
#field-nombretiposeguro{
	color: #444;
	height: 27px;
	font-size: 13px;
	background: -moz-linear-gradient(top, #ffffff 20%, #f6f6f6 50%, #eeeeee 52%, #f4f4f4 100%);
}
#primanetaminima_field_box{
	display:none!important;
}
</style>
