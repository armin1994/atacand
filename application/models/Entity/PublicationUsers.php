<?php

namespace Entity;



/**
 * PublicationUsers
 *
 * @Table(name="publication_users", indexes={@Index(name="publication_users___fk1", columns={"user_id"})})
 * @Entity
 */
class PublicationUsers
{
    /**
     * @var int
     *
     * @Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Entity\Users
     *
     * @ManyToOne(targetEntity="Entity\Users")
     * @JoinColumns({
     *   @JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $user;


    /**
     * @var \Entity\SongsUser
     *
     * @ManyToOne(targetEntity="Entity\SongsUser")
     * @JoinColumns({
     *   @JoinColumn(name="song_user_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $song_user;


    /**
     * @var string|null
     *
     *@Column(name="date", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $date;

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
     * @param \Entity\Users|null $user
     *
     * @return PublicationUsers
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
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return \Entity\SongsUser|null
     */
    public function getSongUser()
    {
        return $this->song_user;
    }

    /**
     * Set songUser.
     *
     * @param \Entity\SongsUser|null $song_user
     *
     * @return SongsUser
     */
    public function setSongUser($song_user)
    {
        $this->song_user = $song_user;
    }


}
