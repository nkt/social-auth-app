<?php

namespace Nkt\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="users", indexes={
 *     @ORM\Index(name="vk_id", columns={"vk_id"}),
 *     @ORM\Index(name="twitter_id", columns={"twitter_id"})
 * })
 */
class User implements UserInterface
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $username;
    /**
     * @var integer
     *
     * @ORM\Column(name="twitter_id", type="integer", nullable=true)
     */
    private $twitterId;
    /**
     * @var integer
     *
     * @ORM\Column(name="vk_id", type="integer", nullable=true)
     */
    private $vkId;
    /**
     * @var string
     * @ORM\Column(nullable=true)
     */
    private $email;

    public function getId()
    {
        return $this->id;
    }

    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setTwitterId($twitterId)
    {
        $this->twitterId = $twitterId;

        return $this;
    }

    public function getTwitterId()
    {
        return $this->twitterId;
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function getPassword()
    {
        return null;
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
    }

    public function getVkId()
    {
        return $this->vkId;
    }

    public function setVkId($vkId)
    {
        $this->vkId = $vkId;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}
