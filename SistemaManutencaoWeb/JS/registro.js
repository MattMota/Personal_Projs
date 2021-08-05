$(document).ready(function(){
	$(".form-bottom-buttons").children("label").children("input").click(function(){
		if(!($("#tipo").val()==null)) {
			alert("Obrigado por registrar a ocorrência!");
		}
	});
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
	    	reader.onload = function(e) {
	      		$('#thumb').attr('src', e.target.result);
	      		$('#thumb').css('filter','invert(0%)')
	    	}
		    reader.readAsDataURL(input.files[0]);
		}
	}
	$("#arquivo").change(function() {
		readURL(this);
		$("#thumb").css({"height":"120px", "width":"auto", "border-radius":"5px"});
	});
});