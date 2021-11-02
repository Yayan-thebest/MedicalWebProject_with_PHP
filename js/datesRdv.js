 /*Fichier ajax qui permet d'afficher la date en fonction de la consultation choisi par l'user */
 function FetchConsultation(id){
    //$('#consultation').html('');
    $.ajax({
      type:'post',  // mode d'nvoie des données au file php
      url: 'DataAccessLayer/DatesRdvDAO.php', // lien du fichier qui va recevoir les donnees
      data : {consultation_id : id},       // sin on utiise consulttion_id dans le file php oavec un post on aura la valeur e id// on passe le GET_POst provenant du ficier DatesRdvDAO.php et on l'afffecte le id
      dataType: 'text',
      success : function(data){
         $('#dateRdv').html(data);
      }

    })
}

   $("#dateRdv").change(function(){
   var item = $("#dateRdv").text();        
   $("#tf").text(item);
});


/*    $('#consultation').click(function(){
      var consultation = $('#consultation')
      var id = $('#consultation')

    $.ajax({
      type:'post',  // mode d'nvoie des données au file php
      url: 'DataAccessLayer/ConsultationDAO.php', // lien du fichier qui va recevoir les donnees
      data : {consultation :consultation},    // sin on utiise consulttion_id dans le file php oavec un post on aura la valeur e id// on passe le GET_POst provenant du ficier DatesRdvDAO.php et on l'afffecte le id
      dataType: 'text',
      success : function(data){
         $('#dateRdv').html(data);
      }

    })
}*/

 function FetchDate(id){
    $('#dateRdv').html('');
    $.ajax({
      type:'post',  // mode d'nvoie des données au file php
      url: 'DataAccessLayer/ConsultationDAO.php', // lien du fichier qui va recevoir les donnees
      data : {date_id : id},    // sin on utiise consulttion_id dans le file php oavec un post on aura la valeur e id// on passe le GET_POst provenant du ficier DatesRdvDAO.php et on l'afffecte le id
      dataType: 'text',
      success : function(data){
         $('#dateRdv').html(data);
      }

    })
}



/* function FetchConsultation(id){
    $('#dateRdv').html('');
    $.ajax({
      type:'post',  // mode d'nvoie des données au file php
      url: 'DataAccessLayer/ConsultationDAO.php', // lien du fichier qui va recevoir les donnees
      data : {func: 'getHoraireConsultation',consultation_id : id},    // sin on utiise consulttion_id dans le file php oavec un post on aura la valeur e id// on passe le GET_POst provenant du ficier DatesRdvDAO.php et on l'afffecte le id
      dataType: 'text',
      success : function(data){
         $('#dateRdv').html(data);
      }

    });
}*/


