<?php

namespace Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * SongsUser
 *
 * @Table(name="songs_user", indexes={@Index(name="song_forign", columns={"song_id"}), @Index(name="user_forign", columns={"user_id"})})
 * @Entity
 * @ExclusionPolicy("ALL")
 */
class SongsUser implements \JsonSerializable
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
     * @Column(name="date", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $date;

    /**
     * @var string|null
     * @Expose()
     * @Column(name="song_src", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $songSrc;

    /**
     * @var \Entity\Songs
     * @Expose()
     * @ManyToOne(targetEntity="Entity\Songs")
     * @JoinColumns({
     *   @JoinColumn(name="song_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $song;

    /**
     * @var \Entity\Users
     * @ManyToOne(targetEntity="Entity\Users")
     * @JoinColumns({
     *   @JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     * })
     * @Expose()
     */
    private $user;

    /**
     * @ManyToMany(targetEntity="Entity\Users",mappedBy="songsUsers")
     * @JoinColumn(nullable=false)
     * @Expose()
     */

    private $participants;

    /**
     * Participants constructor.
     */
    public function __construct()
    {
        $this->participants = new ArrayCollection();
    }


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
     * @return SongsUser
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
     * @return SongsUser
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
     * @param \Entity\Songs|null $song
     *
     * @return SongsUser
     */
    public function setSong(\Entity\Songs $song = null)
    {
        $this->song = $song;

        return $this;
    }

    /**
     * Get song.
     *
     * @return \Entity\Songs|null
     */
    public function getSong()
    {
        return $this->song;
    }

    /**
     * Set user.
     *
     * @param \Entity\Users|null $user
     *
     * @return SongsUser
     */
    public function setUser(\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }


    /**
     * Get user.
     *
     * @return \Entity\Users|null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add user
     *
     * @param \Entity\Users $user
     *
     * @return SongsUser
     */

    public function addParticipant(\Entity\Users $users)
    {

        if ($this->participants->contains($users)) {
            return;
        }
        $this->participants->add($users);
        //var_dump($this->participants);
        $users->addSongUser($this);
    }

    /**
     * Get Participants
     *
     * @return \Doctrine\Common\Collections\Collection
     */

    public function getParticipants()
    {
        return $this->participants;
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
            'createur' => $this->user,
            'song' => $this->song,
            'date' => $this->date,
            'participants' => $this->participants->toArray()
        );
    }


}
