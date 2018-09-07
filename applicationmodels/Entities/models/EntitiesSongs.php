<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * models/EntitiesSongs
 *
 * @ORM\Table(name="Songs")
 * @ORM\Entity
 */
class models/EntitiesSongs
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
     * @ORM\Column(name="song_name", type="string", length=255, nullable=true)
     */
    private $songName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="artist_name", type="string", length=255, nullable=true)
     */
    private $artistName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="song_src", type="string", length=255, nullable=true)
     */
    private $songSrc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image_src", type="string", length=255, nullable=true)
     */
    private $imageSrc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lyric_src", type="string", length=255, nullable=true)
     */
    private $lyricSrc;


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
     * Set songName.
     *
     * @param string|null $songName
     *
     * @return models/EntitiesSongs
     */
    public function setSongName($songName = null)
    {
        $this->songName = $songName;

        return $this;
    }

    /**
     * Get songName.
     *
     * @return string|null
     */
    public function getSongName()
    {
        return $this->songName;
    }

    /**
     * Set artistName.
     *
     * @param string|null $artistName
     *
     * @return models/EntitiesSongs
     */
    public function setArtistName($artistName = null)
    {
        $this->artistName = $artistName;

        return $this;
    }

    /**
     * Get artistName.
     *
     * @return string|null
     */
    public function getArtistName()
    {
        return $this->artistName;
    }

    /**
     * Set songSrc.
     *
     * @param string|null $songSrc
     *
     * @return models/EntitiesSongs
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
     * Set imageSrc.
     *
     * @param string|null $imageSrc
     *
     * @return models/EntitiesSongs
     */
    public function setImageSrc($imageSrc = null)
    {
        $this->imageSrc = $imageSrc;

        return $this;
    }

    /**
     * Get imageSrc.
     *
     * @return string|null
     */
    public function getImageSrc()
    {
        return $this->imageSrc;
    }

    /**
     * Set lyricSrc.
     *
     * @param string|null $lyricSrc
     *
     * @return models/EntitiesSongs
     */
    public function setLyricSrc($lyricSrc = null)
    {
        $this->lyricSrc = $lyricSrc;

        return $this;
    }

    /**
     * Get lyricSrc.
     *
     * @return string|null
     */
    public function getLyricSrc()
    {
        return $this->lyricSrc;
    }
}
