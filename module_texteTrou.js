$(document).ready(function(){
var hideTips= ["<li>indice premier</li> ", "<li>indice second</li>"];
var i=0;
var nmbreIndices = hideTips.length;
$buttonVar=$('.boutonIndice');
$indiceVar=$('.indice');

$buttonVar.click(function()
{
	if(i<hideTips.length)
	{
		$indiceVar.append(hideTips[i]);
		nmbreIndices--;
		$buttonVar.html('Indice restant '+ nmbreIndices);
		i++;
	}
})
//bouton valider et compare les réponses
	$("#boutonValider").click(function()
		{
			if ($("#reponse1").val()==="idea2")
				{
					console.log("Bravo!");
					$('#reponse1').css
					("background-color", "green");
				}

			else 
				{
					console.log("Dommage!");
					$('#reponse1').css(
						"background-color", "red");
				}
		})
	$("#boutonAffExo1").on('click', function()
		{
			$('.exo1').show();
		})

	$("#boutonHideExo1").on('click', function()
		{
			$('.exo1').hide();
		})



});

