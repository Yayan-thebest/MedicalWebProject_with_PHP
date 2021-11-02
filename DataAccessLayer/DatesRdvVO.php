<?php
   class DatesRdvVO {
   protected $nomConsultation;
   protected $numeroTypeConsultation;
   protected $prix;
   protected $horaireConsultation;
   protected $horaire1, $horaire2, $horaire3, $horaire4;

   protected $nomDocteur;
   protected $numeroDocteur;

      public function setHoraire1($horaire1)
       {
       $this->horaire1 = $horaire1;
       }
       public function getHoraire1() {
       return $this->horaire1;
       }

        public function setHoraire2($horaire2)
       {
       $this->horaire2 = $horaire2;
       }
       public function getHoraire2() {
       return $this->horaire2;
       }
   }
   ?>