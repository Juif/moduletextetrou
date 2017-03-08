
$(document).ready(function(){
var hideTips= ["<li>indice premier</li> ", "<li>indice second</li>"];
var i=0;
var nmbreIndices = hideTips.length;
$buttonVar=$('button');
$indiceVar=$('.indice')

$buttonVar.click(function(){
	if(i<hideTips.length){
		$indiceVar.append(hideTips[i]);
		nmbreIndices--;
		$buttonVar.html('Indice restant '+ nmbreIndices);
		i++;


}
	})
						});
