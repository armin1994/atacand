<?php
namespace models\generated;


use Doctrine\ORM\Mapping as ORM;

/**
 * SongsUser
 *
 * @ORM\Table(name="songs_user", indexes={@ORM\Index(name="song_forign", columns={"song_id"}), @ORM\Index(name="user_forign", columns={"user_id"})})
 * @ORM\Entity
 */
class SongsUser
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
     * @var string
     *
     * @ORM\Column(name="song_src", type="string", length=255, nullable=true)
     */
    private $songSrc;

    /**
     * @var \Songs
     *
     * @ORM\ManyToOne(targetEntity="Songs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="song_id", referencedColumnName="id")
     * })
     */
    private $song;

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
     * SongsUser constructor.
     * @param int $id
     * @param string $date
     * @param string $songSrc
     * @param Songs $song
     * @param Users $user
     */
    public function __construct($date, $songSrc, Songs $song, Users $user)
    {
        $this->date = $date;
        $this->songSrc = $songSrc;
        $this->song = $song;
        $this->user = $user;
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
     * @return string
     */
    public function getSongSrc(): string
    {
        return $this->songSrc;
    }

    /**
     * @param string $songSrc
     */
    public function setSongSrc(string $songSrc)
    {
        $this->songSrc = $songSrc;
    }

    /**
     * @return Songs
     */
    public function getSong(): Songs
    {
        return $this->song;
    }

    /**
     * @param Songs $song
     */
    public function setSong(Songs $song)
    {
        $this->song = $song;
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


}

