<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * articulo
 *
 * @ORM\Table(name="articulo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\articuloRepository")
 */
class articulo
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
     * @ORM\ManyToOne(targetEntity="tema", inversedBy="articulos")
     * @ORM\JoinColumn(name="tema_id", referencedColumnName="id")
     */
    private $tema;

    /**
     * @var int
     *
     * @ORM\Column(name="tema_id", type="integer")
     */
    private $temaId;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="string", length=400)
     */
    private $body;

    /**
     * @var string
     *
     * @ORM\Column(name="articulo", type="string", length=500)
     */
    private $articulo;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=500)
     */
    private $imagen;

    /**
    * @ORM\OneToMany(targetEntity="comment", mappedBy="articulo")
    */
    private $comments;


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
     * Set temaId
     *
     * @param integer $temaId
     * @return cientifico
     */
    public function setTemaId($temaId)
    {
        $this->temaId = $temaId;

        return $this;
    }

    /**
     * Get temaId
     *
     * @return integer 
     */
    public function getTemaId()
    {
        return $this->temaId;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return cientifico
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody($length = null)
    {
    if (false === is_null($length) && $length > 0 && strlen($this->body) > $length)
        return substr($this->body, 0, $length) . "...";
    else
        return $this->body;
    }

    /**
     * Set articulo
     *
     * @param string $articulo
     * @return cientifico
     */
    public function setArticulo($articulo)
    {
        $this->articulo = $articulo;

        return $this;
    }

    /**
     * Get articulo
     *
     * @return string 
     */
    public function getArticulo()
    {
        return $this->articulo;
    }

    /**
     * Get imagen
     *
     * @return string 
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     * @return articulo
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Add comments
     *
     * @param \AppBundle\Entity\comment $comments
     * @return articulo
     */
    public function addComment(\AppBundle\Entity\comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \AppBundle\Entity\comment $comments
     */
    public function removeComment(\AppBundle\Entity\comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
