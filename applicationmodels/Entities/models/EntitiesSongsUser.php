<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * models/SongsUser
 *
 * @ORM\Table(name="songs_user", indexes={@ORM\Index(name="song_forign", columns={"song_id"}), @ORM\Index(name="user_forign", columns={"user_id"})})
 * @ORM\Entity
 */
class models/EntitiesSongsUser
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
     * @var string|null
     *
     * @ORM\Column(name="song_src", type="string", length=255, nullable=true)
     */
    private $songSrc;

    /**
     * @var \models/Songs
     *
     * @ORM\ManyToOne(targetEntity="models/Songs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="song_id", referencedColumnName="id")
     * })
     */
    private $song;

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
     * @return models/SongsUser
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
     * Set songSrc.
     *
     * @param string|null $songSrc
     *
     * @return models/SongsUser
     */
    public function setSongSrc($songSrc = null)
    {
        $this->songSrc = $songSrc;

        return $this;
    }

    /**
     * Get songSrc.
     *
     * @return string|null
     */
    public function getSongSrc()
    {
        return $this->songSrc;
    }

    /**
     * Set song.
     *
     * @param \models/Songs|null $song
     *
     * @return models/SongsUser
     */
    public function setSong(\models/EntitiesSongs $song = null)
    {
        $this->song = $song;

        return $this;
    }

    /**
     * Get song.
     *
     * @return \models/Songs|null
     */
    public function getSong()
    {
        return $this->song;
    }

    /**
     * Set user.
     *
     * @param \models/EntitiesUsers|null $user
     *
     * @return models/SongsUser
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
}
