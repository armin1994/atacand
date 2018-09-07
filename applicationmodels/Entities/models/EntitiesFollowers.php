<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * models/EntitiesFollowers
 *
 * @ORM\Table(name="followers", indexes={@ORM\Index(name="followers___fk1", columns={"id_master"}), @ORM\Index(name="followers___fk2", columns={"id_guest"})})
 * @ORM\Entity
 */
class models/EntitiesFollowers
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date", type="string", length=255, nullable=true)
     */
    private $date;

    /**
     * @var \models/Users
     *
     * @ORM\ManyToOne(targetEntity="models/Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_master", referencedColumnName="id")
     * })
     */
    private $idMaster;

    /**
     * @var \models/Users
     *
     * @ORM\ManyToOne(targetEntity="models/Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_guest", referencedColumnName="id")
     * })
     */
    private $idGuest;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date.
     *
     * @param string|null $date
     *
     * @return models/EntitiesFollowers
     */
    public function setDate($date = null)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return string|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set idMaster.
     *
     * @param \models/EntitiesUsers|null $idMaster
     *
     * @return models/EntitiesFollowers
     */
    public function setIdMaster(\models/EntitiesUsers $idMaster = null)
    {
        $this->idMaster = $idMaster;

        return $this;
    }

    /**
     * Get idMaster.
     *
     * @return \models/EntitiesUsers|null
     */
    public function getIdMaster()
    {
        return $this->idMaster;
    }

    /**
     * Set idGuest.
     *
     * @param \models/EntitiesUsers|null $idGuest
     *
     * @return models/EntitiesFollowers
     */
    public function setIdGuest(\models/EntitiesUsers $idGuest = null)
    {
        $this->idGuest = $idGuest;

        return $this;
    }

    /**
     * Get idGuest.
     *
     * @return \models/EntitiesUsers|null
     */
    public function getIdGuest()
    {
        return $this->idGuest;
    }
}
