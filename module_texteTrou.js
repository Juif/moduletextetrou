$(document).ready(function(){
    var hideTips= ["<li>indice premier</li> ", "<li>indice second</li>"];
    var i=0;
    var nmbreIndices = hideTips.length;
    $buttonVar=$('#boutonIndice');
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
    $("#boutonValider").on('click', function()
    {
        if ($("#reponse1").val()==="idea2")
        {
            $('#reponse1').css
            ("background-color", "green");
        }

        else
        {
            $('#reponse1').css(
                "background-color", "red");
        }
    })

});


