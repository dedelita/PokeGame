<?php

/**
 * Created by PhpStorm.
 * User: hello
 * Date: 22/05/2017
 * Time: 20:07
 */
class Annonce
{
    private $idPokemon;
    private $idDresseur;
    private $nomPokemon;
    private $prix;
    private $niveau;
    private $XP;

    /**
     * Annonce constructor.
     * @param $idPokemon
     * @param $idDresseur
     * @param $nomPokemon
     * @param $prix
     * @param $niveau
     * @param $XP
     */
    public function __construct($idPokemon, $idDresseur, $nomPokemon, $prix, $niveau, $XP)
    {
        $this->idPokemon = $idPokemon;
        $this->idDresseur = $idDresseur;
        $this->nomPokemon = $nomPokemon;
        $this->prix = $prix;
        $this->niveau = $niveau;
        $this->XP = $XP;
    }

    /**
     * @return mixed
     */
    public function getIdPokemon()
    {
        return $this->idPokemon;
    }

    /**
     * @param mixed $idPokemon
     */
    public function setIdPokemon($idPokemon)
    {
        $this->idPokemon = $idPokemon;
    }

    /**
     * @return mixed
     */
    public function getIdDresseur()
    {
        return $this->idDresseur;
    }

    /**
     * @param mixed $idDresseur
     */
    public function setIdDresseur($idDresseur)
    {
        $this->idDresseur = $idDresseur;
    }

    /**
     * @return mixed
     */
    public function getNomPokemon()
    {
        return $this->nomPokemon;
    }

    /**
     * @param mixed $nomPokemon
     */
    public function setNomPokemon($nomPokemon)
    {
        $this->nomPokemon = $nomPokemon;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
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
    public function getXP()
    {
        return $this->XP;
    }

    /**
     * @param mixed $XP
     */
    public function setXP($XP)
    {
        $this->XP = $XP;
    }
    
}