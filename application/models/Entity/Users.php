<?php

namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Users
 *
 * @Table(name="users")
 * @Entity
 * @ExclusionPolicy("ALL")
 */
class Users implements \JsonSerializable
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
     * @Column(name="First_name", type="string", length=30, precision=0, scale=0, nullable=true, unique=false)
     */
    private $firstName;

    /**
     * @var string|null
     * @Expose()
     * @Column(name="Last_name", type="string", length=30, precision=0, scale=0, nullable=true, unique=false)
     */
    private $lastName;

    /**
     * @var int|null
     * @Expose()
     * @Column(name="TYPE", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $type;

    /**
     * @var string|null
     * @Expose()
     * @Column(name="email", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $email;

    /**
     * @var string|null
     * @Expose()
     * @Column(name="username", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $username;

    /**
     * @var string|null
     * @Expose()
     * @Column(name="password", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $password;

    /**
     * @var string|null
     * @Expose()
     * @Column(name="birthday", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $birthday;

    /**
     * @var string|null
     * @Expose()
     * @Column(name="description", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $description;

    /**
     * @var string
     * @Expose()
     * @Column(name="image_src", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $imageSrc;

    /**
     * @ManyToMany(targetEntity="Entity\SongsUser",inversedBy="participants")
     * @JoinColumn(nullable=true)
     * @OrderBy({"date" = "ASC"})
     * @Expose()
     */
    private $songsUsers;

    /**
     * Users constructor.
     */
    public function __construct()
    {
        $this->songsUsers = new ArrayCollection();
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
     * Set firstName.
     *
     * @param string|null $firstName
     *
     * @return Users
     */
    public function setFirstName($firstName = null)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName.
     *
     * @param string|null $lastName
     *
     * @return Users
     */
    public function setLastName($lastName = null)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName.
     *
     * @return string|null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set type.
     *
     * @param int|null $type
     *
     * @return Users
     */
    public function setType($type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return int|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set email.
     *
     * @param string|null $email
     *
     * @return Users
     */
    public function setEmail($email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set username.
     *
     * @param string|null $username
     *
     * @return Users
     */
    public function setUsername($username = null)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string|null
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password.
     *
     * @param string|null $password
     *
     * @return Users
     */
    public function setPassword($password = null)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string|null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set birthday.
     *
     * @param string|null $birthday
     *
     * @return Users
     */
    public function setBirthday($birthday = null)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday.
     *
     * @return string|null
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Users
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set imageSrc.
     *
     * @param string $imageSrc
     *
     * @return Users
     */
    public function setImageSrc($imageSrc)
    {
        $this->imageSrc = $imageSrc;

        return $this;
    }

    /**
     * Get imageSrc.
     *
     * @return string
     */
    public function getImageSrc()
    {
        return $this->imageSrc;
    }

    /**
     * Get SongsUser
     *
     * @return \Doctrine\Common\Collections\Collection
     */

    public function getSongUsers()
    {
        return $this->songsUsers;
    }
    public function addSongUser(\Entity\SongsUser $songsUser){

        if ($this->songsUsers->contains($songsUser)) {
            return;
        }
        $this->songsUsers->add($songsUser);
    }

    public  function jsonSerialize(){
        return array(
            'id' => $this->id,
            'First_name' => $this->firstName,
            'Last_name' => $this->lastName,
            'TYPE' => $this->type,
            'email' => $this->email,
            'username' => $this->username,
            'birthday' => $this->birthday,
            'description' => $this->description,
            'image_src' => $this->imageSrc
        );
    }
}
