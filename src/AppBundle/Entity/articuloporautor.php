<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * articuloporautor
 *
 * @ORM\Table(name="articuloporautor")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\articuloporautorRepository")
 */
class articuloporautor
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="articulo", inversedBy="articuloporautores")
     * @ORM\JoinColumn(name="articulo_id", referencedColumnName="id")
     */
    private $articulo;

    /**
     * @ORM\ManyToOne(targetEntity="autor", inversedBy="articuloporautores")
     * @ORM\JoinColumn(name="autor_id", referencedColumnName="id")
     */
    private $autor;

    /**
     * @var int
     *
     * @ORM\Column(name="articulo_id", type="integer")
     */
    private $articuloId;

    /**
     * @var int
     *
     * @ORM\Column(name="autor_id", type="integer")
     */
    private $autorId;


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
     * Set articuloId
     *
     * @param integer $articuloId
     * @return articuloporautor
     */
    public function setArticuloId($articuloId)
    {
        $this->articuloId = $articuloId;

        return $this;
    }

    /**
     * Get articuloId
     *
     * @return integer 
     */
    public function getArticuloId()
    {
        return $this->articuloId;
    }

    /**
     * Set autorId
     *
     * @param integer $autorId
     * @return articuloporautor
     */
    public function setAutorId($autorId)
    {
        $this->autorId = $autorId;

        return $this;
    }

    /**
     * Get autorId
     *
     * @return integer 
     */
    public function getAutorId()
    {
        return $this->autorId;
    }

     /**
     * Set articulo
     *
     * @param \AppBundle\Entity\articulo $articulo
     * @return comment
     */
    public function setArticulo(\AppBundle\Entity\articulo $articulo = null)
    {
        $this->articulo = $articulo;

        return $this;
    }

    /**
     * Get articulo
     *
     * @return \AppBundle\Entity\articulo 
     */
    public function getArticulo()
    {
        return $this->articulo;
    }
}
