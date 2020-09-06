<?php foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php     
    echo $output;
?>
<?php foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<?php if((isset($textarea))&&($textarea == true)){?>
<script>
	url = window.location.href;
    vec = url.split("/");
    size = vec.length;
    last = vec[size-1];
	if(vec[size-1] == "add" ){
		val = $('#field-descripcion').val();
		name = $('#field-descripcion').attr('name');
		clas = $('#field-descripcion').attr('class');
		str1 ="<textarea id=field-descripcion name="+name+" maxlength='256' class="+clas+" >"+val+"</textarea>";
		$('#descripcion_input_box').html(str1);
	}
	if(vec[size-2] == "edit"){
		val = $('#field-descripcion').val();
		name = $('#field-descripcion').attr('name');
		clas = $('#field-descripcion').attr('class');
		str1 ="<textarea id=field-descripcion name="+name+" maxlength='256' class="+clas+" >"+val+"</textarea>";
		$('#descripcion_input_box').html(str1)
	}
</script>
<?php } ?>
<script>
	$(document).ready(function(){
		url = window.location.href;
		vec = url.split("/");
		size = vec.length;
		last = vec[size-1];
		if(vec[size-2] == "read" && vec[size-4]== "dashboard"){
			tmp1 = $("#field-pdfurl").html();
			if(tmp1.length>1){
				str = "<a target='_blank' href='"+tmp1+"' >Descargar</a>"
				$("#field-pdfurl").html(str);
			}
			else{
				str = "Descarga Directa";
				$("#field-pdfurl").html(str);
			}
			tmp1 = $("#field-esventa").html();
			if(tmp1 == "1"){
				$("#field-esventa").html("Venta");
			}
			else{
				$("#field-esventa").html("Cotizacion");
			}
		}
	});
</script>
