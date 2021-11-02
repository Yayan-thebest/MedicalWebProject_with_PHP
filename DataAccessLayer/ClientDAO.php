<?php
   include ("../DataAccessLayer/PatientVO.php");
   
   // Cette classe permet d'executer les requete concernant la table client 
   class ClientDAO {
       
   protected $connect;
   protected $db;
   protected $id;	// Variable qui va contenir le id entrer par l'user
   protected $lastId; // Variable qui va contenir le dernier id inserer dans la bd
   
       
   // Initialisation de la base de données
   public function ClientDAO() {
   $this->connect = mysqli_connect("localhost", "root", "") or die("Erreur de connexion".mysqli_error());
   $this->db = mysqli_select_db($this->connect,"cliniquesb");
   
   }
       // Execution de la requite SQL.
   protected function execute($sql) {
   $res = mysqli_query($this->connect, $sql) or die(mysqli_error($this->connect));
      
   }

       // Execution de la requete pour avoir les infos d'un client
   protected function executeInfosClient($sql) {
       $res = mysqli_query($this->connect, $sql) or die(mysqli_error($this->connect));
           
       if(mysqli_num_rows($res) > 0) {
       for($i = 0; $i < mysqli_num_rows($res); $i++) {
       $row = mysqli_fetch_assoc($res);
           
       $patientvo[$i] = new ClientVO();
       $patientvo[$i]->setNumeroPatient($row['NumeroPatient']);
       $patientvo[$i]->setNom($row['Nom']);
       $patientvo[$i]->setDate($row['DateNaissance']);
       $patientvo[$i]->setLieuNaissance($row['LieuNaissance']);
       $patientvo[$i]->setSexe($row['Sexe']);
       $patientvo[$i]->setTelephone($row['Telephone']);
       $patientvo[$i]->setEmail($row['Email']);
       $patientvo[$i]->setAdresse($row['Adresse']);
       $patientvo[$i]->setMessage($row['Message']);
   
       }
   }
   return $patientvo;
   }
   
       // Execution de la requete pour verifier l'Id d'un client
   protected function executeVerificationID($sql) {
   $res = mysqli_query($this->connect, $sql) or die(mysqli_error($this->connect));
       
   if(mysqli_num_rows($res) >0){
       //echo "Identifiant valide ";
   }
   else{
           exit('Erreur : Identifiant incorrect ');  
   }
   }
   
     //requete qui Retourne les infos d'un client apres sa commande
   public function getInfosClient(){
    $sql = "SELECT * FROM newclient INNER JOIN commandes ON newclient.NumeroClient = commandes.NumeroClient ORDER BY commandes.NumeroClient DESC LIMIT 1";
   
       return $this->executeInfosClient($sql);
   } 
       
       // Requete qui permet de verifier que le id d'un client exist
   public function connexionCompte(ClientVO $client){
       if(isset($_POST['idClient'])){
           $id = mysqli_real_escape_string($this->connect, $_POST['idClient']);
           $sql = "SELECT NumeroClient FROM newclient WHERE NumeroClient='$id'";
       }
       return $this->executeVerificationID($sql);
   }
   
       // Requete qui Retourne les infos d'un ancien client apres sa nouvelle commande
   public function getInfosAncienClient(){
       if(isset($_POST['idClient'])){
           $id = mysqli_real_escape_string($this->connect, $_POST['idClient']);
          /* $sql = "SELECT *FROM newclient WHERE NumeroClient='$id' ORDER BY NumeroCLient DESC LIMIT 1";*/
           $sql = "SELECT *FROM newclient INNER JOIN commandes ON newclient.NumeroClient = commandes.NumeroClient WHERE newclient.NumeroClient='$id'  ORDER BY commandes.NumeroClient DESC LIMIT 1";
       }
       return $this->executeInfosClient($sql);
   }

       // Requete pour un inserer la nouvelle commande d'un ancien client dans la table commande
   public function commande_AncienClient(ClientVO $client){
       if(isset($_POST['idClient'])){
           $id = mysqli_real_escape_string($this->connect, $_POST['idClient']);
          $sql = "INSERT INTO commandes (NumeroClient, Nom, Prenom, IDetNomVin, Message) 
          SELECT '". $client->getNumeroClient(). "', newclient.Nom , newclient.Prenom'". "','" . $client->getVin(). "','" . $client->getMessage(). "' 
          FROM newclient INNER JOIN commandes ON newclient.NumeroClient = commandes.NumeroClient WHERE newclient.NumeroClient='$id'";
       
       }
       return $this->execute($sql);
   }

     // Requete pour inserer un nouveau client dans la table patient  
   public function Create_Client(PatientVO $patient){
       $sql = "INSERT INTO patient (Nom, DateNaissance, LieuNaissance, Sexe, Telephone, Email, Adresse ) "
           . "VALUES(
                '" . $patient->getNom()
           . "','" . $patient->getDate()
           . "','" . $patient->getLieuNaissance()
           . "','" . $patient->getSexe()
           . "','" . $patient->getTelephone()
           . "','" . $patient->getEmail()
           . "','" . $patient->getAdresse()
           . "');" ;
           $lastId = mysqli_insert_id($this->connect);
   
       return $this->execute($sql);
   }
       
     // Requete pour insert les informations d'un client dans la table rendezvous 
   public function insert_Into_commande(PatientVO $patient){
    $val =  mysqli_real_escape_string($this->connect, $patient->getNumeroVin() );
    $sql = "INSERT INTO rendezvous (NumeroClient,  Nom, Prenom,  IDetNomVin, Message) "
           . "VALUES('". mysqli_insert_id($this->connect)
           . "','" . $patient->getNom()
           . "','" . $patient->getPrenom()
           . "','" . $patient->getVin()
           . "','" . $patient->getMessage()
           . "');" ;
  
       return $this->execute($sql);
   }
   
   
   }
   ?>