<?php

namespace Entity;



/**
 * Songs
 *
 * @Table(name="Songs")
 * @Entity
 * @ExclusionPolicy("ALL")
 */
class Songs implements \JsonSerializable
{
    /**
     * @var int
     *
     * @Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     * @Expose()
     */
    private $id;

    /**
     * @var string|null
     * @Expose()
     * @Column(name="song_name", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $songName;

    /**
     * @var string|null
     * @Expose()
     * @Column(name="artist_name", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $artistName;

    /**
     * @var string|null
     * @Expose()
     * @Column(name="song_src", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $songSrc;

    /**
     * @var string|null
     * @Expose()
     * @Column(name="image_src", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $imageSrc;

    /**
     * @var string|null
     * @Expose()
     * @Column(name="lyric_src", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $lyricSrc;


    /**
     * Get id.
     * @Expose()
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
     * @return Songs
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
     * @return Songs
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
     * @return Songs
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
     * @return Songs
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
     * @return Songs
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

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        return array(
          'id' => $this->id,
            'song_src' => $this->songSrc,
            'image_src' => $this->imageSrc,
            'lyric_src' => $this->lyricSrc,
            'song_name' => $this->songName,
            'artist_name' => $this->artistName
        );
    }
}
