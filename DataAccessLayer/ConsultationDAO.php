<?php


   include ("../DataAccessLayer/ConsultationVO.php" );

   
   // Cette classe permet d'executer les requetes concernant la table Vin
   class ConsultationDAO {
       
   protected $connect;
   protected $db;
   protected $id;


       
   // Initialisation de la base de données
   public function ConsultationDAO() {
   $this->connect = mysqli_connect("localhost", "root", "") 
                    or die("Erreur de connexion".mysqli_error());
   $this->db = mysqli_select_db($this->connect,"cliniquesb");
   }
       
       // Execution de la requite SQL. consultation
   protected function execute($sql) {
   $res = mysqli_query($this->connect, $sql) or die(mysqli_error($this->connect));
       
       if(mysqli_num_rows($res) > 0) {
       for($i = 0; $i < mysqli_num_rows($res); $i++) {
       $row = mysqli_fetch_assoc($res);
           
       $consultationvo[$i] = new ConsultationVO();
       $consultationvo[$i]->setNumeroTypeConsultation($row['NumeroTypeConsultation']);
       $consultationvo[$i]->setNomConsultation($row['NomConsultation']); 
       $consultationvo[$i]->setPrix($row['Prix']); 
   
       }
   }
   return $consultationvo;
   }


       // Execution de la requite SQL.
   protected function executeDocteur($sql) {
   $res = mysqli_query($this->connect, $sql) or die(mysqli_error($this->connect));
       
       if(mysqli_num_rows($res) > 0) {
       for($i = 0; $i < mysqli_num_rows($res); $i++) {
       $row = mysqli_fetch_assoc($res);
           
       $consultationvo[$i] = new ConsultationVO();
       $consultationvo[$i]->setNumeroDocteur($row['NumeroDocteur']);
       $consultationvo[$i]->setNomDocteur($row['NomPrenom']); 
       $consultationvo[$i]->setSalaireDocteur($row['Salaire']); 
    $consultationvo[$i]->setBirthDocteur($row['DateNaissance']); 
       $consultationvo[$i]->setLieuNDocteur($row['LieuNaissance']); 
           $consultationvo[$i]->setEmailDocteur($row['Email']); 
        $consultationvo[$i]->setTelDocteur($row['Telephone']); 
   

       }
   }
   return $consultationvo;
   }
    // requete pour avoir les infos d'une consultaation à partir de la table consultation   
   public function getTypeConsultation(){
     $sql = "SELECT *FROM typeConsultation";
     return $this->execute($sql);
         
   }

      // requete pour avoir les infos d'une consultaation à partir de la table consultation   
   public function getDocteur(){
     if(isset($_SESSION['NumeroDocteur'])){
       $id = mysqli_real_escape_string($this->connect, ($_SESSION['NumeroDocteur']));
       $sql = "SELECT *FROM docteur WHERE NumeroDocteur='$id'";
     }      
          return $this->executeDocteur($sql);   

   }


}


?>
  
  