<?php

declare(strict_types=1);

namespace ValueObject;

use Repository\IdentityInterface;

class Identity implements IdentityInterface
{
    private $firstname;
    private $lastname;

    public function __construct()
    {
    }
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }
    public function getFirstname()
    {
        return $this->firstname;
    }
    public function getLastname()
    {
        return $this->lastname;
    }
}