<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * models/PublicationUsers
 *
 * @ORM\Table(name="publication_users", indexes={@ORM\Index(name="publication_users___fk1", columns={"user_id"}), @ORM\Index(name="publication_users___fk2", columns={"publication_id"})})
 * @ORM\Entity
 */
class models/EntitiesPublicationUsers
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
     * @var \models/Users
     *
     * @ORM\ManyToOne(targetEntity="models/Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \models/Publication
     *
     * @ORM\ManyToOne(targetEntity="models/Publication")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="publication_id", referencedColumnName="id")
     * })
     */
    private $publication;


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
     * Set user.
     *
     * @param \models/EntitiesUsers|null $user
     *
     * @return models/PublicationUsers
     */
    public function setUser(\models/EntitiesUsers $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \models/EntitiesUsers|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set publication.
     *
     * @param \models/Publication|null $publication
     *
     * @return models/PublicationUsers
     */
    public function setPublication(\models/EntitiesPublication $publication = null)
    {
        $this->publication = $publication;

        return $this;
    }

    /**
     * Get publication.
     *
     * @return \models/Publication|null
     */
    public function getPublication()
    {
        return $this->publication;
    }
}
