<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Followers
 *
 * @ORM\Table(name="followers", indexes={@ORM\Index(name="followers___fk1", columns={"id_master"}), @ORM\Index(name="followers___fk2", columns={"id_guest"})})
 * @ORM\Entity
 */
class Followers
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
     * @ORM\Column(name="date", type="string", length=255, nullable=true)
     */
    private $date;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_master", referencedColumnName="id")
     * })
     */
    private $idMaster;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_guest", referencedColumnName="id")
     * })
     */
    private $idGuest;

    /**
     * Followers constructor.
     * @param int $id
     * @param string $date
     * @param Users $idMaster
     * @param Users $idGuest
     */
    public function __construct($date, Users $idMaster, Users $idGuest)
    {
        $this->date = $date;
        $this->idMaster = $idMaster;
        $this->idGuest = $idGuest;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date)
    {
        $this->date = $date;
    }

    /**
     * @return Users
     */
    public function getIdMaster(): Users
    {
        return $this->idMaster;
    }

    /**
     * @param Users $idMaster
     */
    public function setIdMaster(Users $idMaster)
    {
        $this->idMaster = $idMaster;
    }

    /**
     * @return Users
     */
    public function getIdGuest(): Users
    {
        return $this->idGuest;
    }

    /**
     * @param Users $idGuest
     */
    public function setIdGuest(Users $idGuest)
    {
        $this->idGuest = $idGuest;
    }


}

