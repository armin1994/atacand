<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * PublicationUsers
 *
 * @ORM\Table(name="publication_users", indexes={@ORM\Index(name="publication_users___fk1", columns={"user_id"}), @ORM\Index(name="publication_users___fk2", columns={"publication_id"})})
 * @ORM\Entity
 */
class PublicationUsers
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
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Publication
     *
     * @ORM\ManyToOne(targetEntity="Publication")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="publication_id", referencedColumnName="id")
     * })
     */
    private $publication;

    /**
     * PublicationUsers constructor.
     * @param int $id
     * @param Users $user
     * @param Publication $publication
     */
    public function __construct(Users $user, Publication $publication)
    {
        $this->user = $user;
        $this->publication = $publication;
    }

    /**
     * @return Users
     */
    public function getUser(): Users
    {
        return $this->user;
    }

    /**
     * @param Users $user
     */
    public function setUser(Users $user)
    {
        $this->user = $user;
    }

    /**
     * @return Publication
     */
    public function getPublication(): Publication
    {
        return $this->publication;
    }

    /**
     * @param Publication $publication
     */
    public function setPublication(Publication $publication)
    {
        $this->publication = $publication;
    }


}

