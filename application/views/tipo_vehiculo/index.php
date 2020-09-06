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
// $('.toggle-nav').click(function(){
//     $('#sidebar').toggle(); 
//     a = $("#main-content").css("margin-left");
//     if(a == "0px"){
//         $("#main-content").css({"margin-left": "180px"});
//     }
//     else{
//         $("#main-content").css({"margin-left": "0px"});
//   }
// });
</script>
