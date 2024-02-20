<?php
include "personne.php";

class Vacataire extends Personne
{
    private $diplome;


    public function __construct($numero, $nom, $prenom, $heursup, $salaireHoraire, $diplome)
    {
        parent::__construct($numero, $nom, $prenom, $heursup, $salaireHoraire);
        $this->diplome = $diplome;
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



    public function calcSalaire()
    {
        switch ($this->diplome) {
            case "1er grade":
                $this->salaireHoraire = 120;
                break;
            case "2eme grade":
                $this->salaireHoraire = 90;
                break;
            case "3eme grade":
                $this->salaireHoraire = 60;
                break;
                default : 
                $this->salaireHoraire =40;
        }
        $salireTotal = $this->salaireHoraire * $this->heursup;
        return $salireTotal;
    }
}



$v1 = new Vacataire(120, "Alami", 'said', 20, 40, "1er grade");
echo $v1->calcSalaire();
