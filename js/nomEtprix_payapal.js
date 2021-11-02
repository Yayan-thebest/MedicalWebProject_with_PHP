function paypal(){
    document.getElementById("consultation").onchange = function() {

    var position =  this.selectedIndex;
    alert(position);
    if(position == 1){
         document.getElementById('prixPP').value = '5000';
         document.getElementById('nomItem').value = 'cons. Général';
     }
     if(position == 2){
         document.getElementById('prixPP').value = '10000';
         document.getElementById('nomItem').value = 'cons. Echographie';  
      }
      if(position == 3){
         document.getElementById('prixPP').value = '10000';
         document.getElementById('nomItem').value = 'cons. Gyne';}
      if(position == 4){
         document.getElementById('prixPP').value = '15000';
         document.getElementById('nomItem').value = 'cons. Firbroscopie';  
      }
  }
}