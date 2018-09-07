<?php

namespace Entity;


/**
 * Followers
 *
 * @Table(name="followers", indexes={@Index(name="followers___fk1", columns={"id_master"}), @Index(name="followers___fk2", columns={"id_guest"})})
 * @Entity
 */
class Followers
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
     * @var string|null
     *
     * @Column(name="date", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $date;

    /**
     * @var \Entity\Users
     *
     * @ManyToOne(targetEntity="Entity\Users")
     * @JoinColumns({
     *   @JoinColumn(name="id_master", referencedColumnName="id", nullable=true)
     * })
     */
    private $idMaster;

    /**
     * @var \Entity\Users
     *
     * @ManyToOne(targetEntity="Entity\Users")
     * @JoinColumns({
     *   @JoinColumn(name="id_guest", referencedColumnName="id", nullable=true)
     * })
     */
    private $idGuest;


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
     * @return Followers
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
     * Set idMaster.
     *
     * @param \Entity\Users|null $idMaster
     *
     * @return Followers
     */
    public function setIdMaster(\Entity\Users $idMaster = null)
    {
        $this->idMaster = $idMaster;

        return $this;
    }

    /**
     * Get idMaster.
     *
     * @return \Entity\Users|null
     */
    public function getIdMaster()
    {
        return $this->idMaster;
    }

    /**
     * Set idGuest.
     *
     * @param \Entity\Users|null $idGuest
     *
     * @return Followers
     */
    public function setIdGuest(\Entity\Users $idGuest = null)
    {
        $this->idGuest = $idGuest;

        return $this;
    }

    /**
     * Get idGuest.
     *
     * @return \Entity\Users|null
     */
    public function getIdGuest()
    {
        return $this->idGuest;
    }
}
