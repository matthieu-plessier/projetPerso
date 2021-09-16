///////////// AJOUT DE CHAMPS POUR LES RECETTES /////////////////////////////

function plus(){
    
    //INPUT INGREDIENTS
    cadreIngredient=document.getElementById('cadreIngredient');
    countInputIngredient=cadreIngredient.getElementsByTagName('input');

    newInputIngredient=document.createElement('input');
    newInputIngredient.classList.add('form-control');
    newInputIngredient.setAttribute('type','text');
    newInputIngredient.setAttribute('placeholder','ex : huile de coco');
    newInputIngredient.setAttribute('name','ingredients'+countInputIngredient.length);
    cadreIngredient.appendChild(newInputIngredient);


    //INPUT QUANTITY
    cadreQuantity=document.getElementById('cadreQuantity');
    countInputQuantity=cadreQuantity.getElementsByTagName('input');

    newInputQuantity=document.createElement('input');
    newInputQuantity.classList.add('form-control');
    newInputQuantity.setAttribute('type','text');
    newInputQuantity.setAttribute('placeholder','ex : 1L ou 100 grs');
    newInputQuantity.setAttribute('name','quantity'+countInputQuantity.length);
    cadreQuantity.appendChild(newInputQuantity);
    

    document.getElementById('sup').style.display='inline';
}
    
// supprimer le dernier champ;
function moins(){
    if(countInputIngredient.length>0){cadreIngredient.removeChild(countInputIngredient[countInputIngredient.length-1])}
    if(countInputIngredient.length==1){document.getElementById('sup').style.display='none'};

    if(countInputQuantity.length>0){cadreQuantity.removeChild(countInputQuantity[countInputQuantity.length-1])}
    if(countInputQuantity.length==1){document.getElementById('sup').style.display='none'};
}