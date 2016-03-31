<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 29.03.16
 * Time: 22:23
 */

namespace Swimmers\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Swimmer
 * @package Swimmers\Model
 * @ORM\Entity
 * @ORM\Table(name="swimmers")
 */
class Swimmer
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    public $id;

    /**
     * @ORM\Column(type="text")
     */
    public $firstName;

    /**
     * @ORM\Column(type="text")
     */
    public $lastName;

    /**
     * @ORM\Column(type="text")
     */
    public $email;

    /**
     * @ORM\Column(type="text")
     */
    public $address;

    /**
     * @ORM\Column(type="integer")
     */
    public $age;

    /**
     * @ORM\Column(type="boolean")
     */
    public $isProfessional;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getIsProfessional()
    {
        return $this->isProfessional;
    }

    /**
     * @param mixed $isProfessional
     */
    public function setIsProfessional($isProfessional)
    {
        $this->isProfessional = $isProfessional;
    }

}