<?php

namespace Repository;

interface IdentityInterface
{
    public function setLastname(string $lastname);
    public function setFirstname(string $firstname);
    public function getLastname();
    public function getFirstname();
}