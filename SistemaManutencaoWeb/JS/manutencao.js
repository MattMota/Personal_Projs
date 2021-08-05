function tudao(){
	var boolean = $("#config").html().includes("Reabrir");
	$("#config").css("visibility","hidden");
	$(":checkbox:checked").prop('checked',false);
	if(boolean){
		link =	"./PHP/escreve.php?fe=1";
		cor = "rgb(125, 255, 125)";
		sit = "Reabrir";
	}
	else{
		link =	"./PHP/escreve.php?fe=0";
		cor = "rgb(255, 100, 100)";
		sit = "Fechar";
	}
	$("button").click(function(){
		$(this).parent().children("ul").slideToggle();
		if($(this).children("img").hasClass("virado")){
			$(this).children("img").removeClass("virado");
		}
		else{
			$(this).children("img").addClass("virado");
			$(this).children("span").html("");
		}
	});
	$("input").click(function(){
    	if($("input:checkbox:checked").length > 0){
    		$("#config").css("visibility","visible");
    		$("#config").css("color",cor);
    		if($("input:checkbox:checked").length == 1){
				$("#config").html(sit+" "+$("input:checkbox:checked").length+" chamado");
			}
			else{
				$("#config").html(sit+" "+$("input:checkbox:checked").length+" chamados");
			}
    	}
    	else{
    		$("#config").css("visibility","hidden");
    	}
		if(this.checked){
			$(this).siblings("div").children(".texto_ocorrencia").css("color",cor);
		}
		else{
			$(this).siblings("div").children(".texto_ocorrencia").css("color","rgb(245, 245, 245)");	
		}
	});
}
var link;
var cor;
var sit;
$(document).ready(function(){
	tudao();
	$("#config").click(function(){
		var xhttp;
		url = "./PHP/altera.php?id=";
		$("input:checked").each(function(){
			url+=$(this).attr("id");
		});
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
	    		$.get(link, function(result){
        			$(".col-sm-10").html(result);
        			tudao();
        		});
		    }
		};
		xhttp.open("GET", url, true);
		xhttp.send();
	});
});
