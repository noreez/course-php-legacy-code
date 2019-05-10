<?php

namespace Repository;

interface PdoInterface
{
    public function getPdo(): \PDO;
}