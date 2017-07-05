<?php

namespace App\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invitados
 *
 * @ORM\Table(name="invitados")
 * @ORM\Entity
 */
class Invitados
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="text" , nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="text" , nullable=true)
     */
    private $apellido;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombrecompleto", type="text" , nullable=true)
     */
    private $nombreCompleto;
    
    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="text" , nullable=true)
     */
    private $alias;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->invitados = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Invitados
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return Invitados
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    
        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }
    
        /**
     * Set nombreCompleto
     *
     * @param string $nombreCompleto
     * @return Invitados
     */
    public function setNombreCompleto($nombreCompleto)
    {
        $this->nombreCompleto = $nombreCompleto;
    
        return $this;
    }

    /**
     * Get nombreCompleto
     *
     * @return string 
     */
    public function getNombreCompleto()
    {
        return $this->nombreCompleto;
    }
    
        /**
     * Set alias
     *
     * @param string $alias
     * @return Invitados
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    
        return $this;
    }

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->alias;
    }
}