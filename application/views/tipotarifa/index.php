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
(function(){
        $(document).ready(function(){
            valor();
			$('#porcentaje_field_box').hide();
            //onlyLetters();
			
        });

    })()
valor = function(){
    jQuery('#field-telefono').attr("type","tel");
    jQuery('#field-email').attr("type","email");

}


</script>
