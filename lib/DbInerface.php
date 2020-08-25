<?php
namespace lib;

interface DbInerface
{
    public function isUniqueUser($ip);

    public function insertUser($ip);

    public function getUserQuantity();
}
