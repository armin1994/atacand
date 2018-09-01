<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Songs
 *
 * @ORM\Table(name="Songs")
 * @ORM\Entity
 */
class Songs
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
     * @ORM\Column(name="song_name", type="string", length=255, nullable=true)
     */
    private $songName;

    /**
     * @var string
     *
     * @ORM\Column(name="artist_name", type="string", length=255, nullable=true)
     */
    private $artistName;

    /**
     * @var string
     *
     * @ORM\Column(name="song_src", type="string", length=255, nullable=true)
     */
    private $songSrc;

    /**
     * @var string
     *
     * @ORM\Column(name="image_src", type="string", length=255, nullable=true)
     */
    private $imageSrc;

    /**
     * @var string
     *
     * @ORM\Column(name="lyric_src", type="string", length=255, nullable=true)
     */
    private $lyricSrc;

    /**
     * Songs constructor.
     * @param int $id
     * @param string $songName
     * @param string $artistName
     * @param string $songSrc
     * @param string $imageSrc
     * @param string $lyricSrc
     */
    public function __construct($songName, $artistName, $songSrc, $imageSrc, $lyricSrc)
    {
        $this->songName = $songName;
        $this->artistName = $artistName;
        $this->songSrc = $songSrc;
        $this->imageSrc = $imageSrc;
        $this->lyricSrc = $lyricSrc;
    }

    /**
     * @return string
     */
    public function getSongName(): string
    {
        return $this->songName;
    }

    /**
     * @param string $songName
     */
    public function setSongName(string $songName)
    {
        $this->songName = $songName;
    }

    /**
     * @return string
     */
    public function getArtistName(): string
    {
        return $this->artistName;
    }

    /**
     * @param string $artistName
     */
    public function setArtistName(string $artistName)
    {
        $this->artistName = $artistName;
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
     * @return string
     */
    public function getImageSrc(): string
    {
        return $this->imageSrc;
    }

    /**
     * @param string $imageSrc
     */
    public function setImageSrc(string $imageSrc)
    {
        $this->imageSrc = $imageSrc;
    }

    /**
     * @return string
     */
    public function getLyricSrc(): string
    {
        return $this->lyricSrc;
    }

    /**
     * @param string $lyricSrc
     */
    public function setLyricSrc(string $lyricSrc)
    {
        $this->lyricSrc = $lyricSrc;
    }


}

