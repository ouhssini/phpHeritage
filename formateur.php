<?php
include "personne.php";

class Formateur extends Personne {
    private $SalaireFix;
    private $Niveau;


    public function __construct($numero,$nom,$prenom,$heursup,$salaireHoraire,$SalaireFix,$Niveau) {
        parent::__construct($numero,$nom,$prenom,$heursup,$salaireHoraire);
        $this->SalaireFix = $SalaireFix;
        $this->Niveau = $Niveau;
    }


    public function __get($attr)
    {
        // Vérification de l'existence de la propriété
        if (property_exists($this, $attr)) {
            return $this->$attr;
        } else {
            return null;
        }
    }

    // Méthode magique pour définir la valeur d'une propriété
    public function __set($attr, $value)
    {
        // Vérification de l'existence de la propriété
        if (property_exists($this, $attr)) {
            $this->$attr = $value;
        }
    }



    public function calcSalaire(){
        switch ($this->Niveau) {
            case "qualife":
                $this->salaireHoraire = 120;
                break;
            case "technecien":
                $this->salaireHoraire = 90;
                break;
            case "technecien specialisé":
                $this->salaireHoraire = 60;
                break;
                default : 
                $this->salaireHoraire =40;
        }
        $salireTotal = $this->salaireHoraire * $this->heursup + $this->SalaireFix;
        return $salireTotal;
    }

}



$f1 = new Formateur(120,"BenAmer",'jalal',20,40,6000,"technecien");
echo $f1->calcSalaire();
