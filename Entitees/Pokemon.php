<?php

class Pokemon
{
    private $id;
    private $nom;
    private $evolution;
    private $sexe;
    private $xp;
    private $niveau;
    private $prix_vente;

    /**
     * Pokemon constructor.
     * @param $id
     * @param $nom
     * @param $evolution
     * @param $sexe
     * @param $xp
     * @param $niveau
     * @param $prix_vente
     */
    public function __construct($id, $nom, $evolution, $sexe, $xp, $niveau, $prix_vente)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->evolution = $evolution;
        $this->sexe = $sexe;
        $this->xp = $xp;
        $this->niveau = $niveau;
        $this->prix_vente = $prix_vente;
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
    
}