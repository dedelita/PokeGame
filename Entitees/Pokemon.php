<?php

class Pokemon
{
    private $id;
    private $numero;
    private $nom;
    private $evolution;
    private $sexe;
    private $xp;
    private $niveau;
    private $prix_vente;
    private $types;
    private $enVente;

    /**
     * Pokemon constructor.
     * @param $id
     * @param $numero
     * @param $nom
     * @param $evolution
     * @param $sexe
     * @param $xp
     * @param $niveau
     * @param $prix_vente
     * @param $en_vente
     * @param $types
     */
    public function __construct($id, $numero, $nom, $evolution, $sexe, $xp, $niveau, $prix_vente, $en_vente, $types)
    {
        $this->id = $id;
        $this->numero = $numero;
        $this->nom = $nom;
        $this->evolution = $evolution;
        $this->sexe = $sexe;
        $this->xp = $xp;
        $this->niveau = $niveau;
        $this->prix_vente = $prix_vente;
        $this->enVente = $en_vente;
        $this->types = $types;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getEvolution()
    {
        return $this->evolution;
    }

    /**
     * @param mixed $evolution
     */
    public function setEvolution($evolution)
    {
        $this->evolution = $evolution;
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    /**
     * @return mixed
     */
    public function getXp()
    {
        return $this->xp;
    }

    /**
     * @param mixed $xp
     */
    public function setXp($xp)
    {
        $this->xp = $xp;
    }

    /**
     * @return mixed
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @param mixed $niveau
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }

    /**
     * @return mixed
     */
    public function getPrixVente()
    {
        return $this->prix_vente;
    }

    /**
     * @param mixed $prix_vente
     */
    public function setPrixVente($prix_vente)
    {
        $this->prix_vente = $prix_vente;
    }

    /**
     * @return mixed
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @param mixed $types
     */
    public function setTypes($types)
    {
        $this->types = $types;
    }

    /**
     * @return mixed
     */
    public function getEnVente()
    {
        return $this->enVente;
    }

    /**
     * @param mixed $enVente
     */
    public function setEnVente($enVente)
    {
        $this->enVente = $enVente;
    }
    
}