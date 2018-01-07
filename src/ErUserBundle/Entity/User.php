<?php

namespace ErUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User Class.
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="ErUserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(name="firstName", type="string", length=255, nullable=false)
     */
    protected $firstName;
    
    /**
     * @ORM\Column(name="lastName", type="string", length=255, nullable=false) 
     */
    protected $lastName;
    
    /**
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    protected $superior;
   

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set superior
     *
     * @param User $superior
     *
     * @return User
     */
    public function setSuperior(\ErUserBundle\Entity\User $superior = null)
    {
        $this->superior = $superior;

        return $this;
    }

    /**
     * Get superior
     *
     * @return User
     */
    public function getSuperior()
    {
        return $this->superior;
    }
}
