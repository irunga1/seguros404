<h1>Dashboard Cotizaciónnes</h1>
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
$(document).ready(function(){
	$('#estado_id_field_box').hide();
	tmp1 = $("#field-pdfurl").html();
	str = "<a href='"+tmp1+"' >Descargar</a>"
	$("#field-pdfurl").html(str);
})


</script>
