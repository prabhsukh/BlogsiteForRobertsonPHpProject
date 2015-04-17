<!DOCTYPE HTML>
<html>
<head>
<!-- load jquery -->
<script src="js/jquery-2.1.3.js" type="text/javascript"></script>
<script src="js/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {

	$.post( "getpicture.php", { pic: "1"}, function( data ) {
	  $("#picture").html( data );
	});
	
	$("#picture").on("click",".get_pic", function(e){
		var BlogAttachmentID = $(this).attr('data-id');
		$("#picture").html("<div style=\"margin:50px auto;width:50px;\"><img src=\"loader.gif\" /></div>");
		$.post( "getpicture.php", { pic:BlogAttachmentID}, function( data ) {
			$("#picture").html( data );
		});
		return false;
	});
	
});
</script>
<title>Ajax Pictures</title>
</head>
<body>

<div id="picture" align="center"> 
<!-- pictures will appear here --> 
</div>

</body>
</html>
