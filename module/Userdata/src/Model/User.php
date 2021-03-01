<?php

declare(strict_types=1);

namespace Userdata\Model;


class User
{
    /**
     * Ab PHP 7.4 kann my die typen auch vor die Variable schreiben hier z.B: public int id dann.
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $lastname;

    /**
     * @var int
     */
    public $firstname;

    /**
     * @var int
     */
    public $address;

    /**
     * @var int
     */
    public $country;

    /**
     * @var int
     */
    public $role;

    /**
     * @param array $data
     */
    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->lastname = !empty($data['lastname']) ? $data['lastname'] : null;
        $this->firstname = !empty($data['firstname']) ? $data['firstname'] : null;
        $this->address = !empty($data['address']) ? $data['address'] : null;
        $this->country = !empty($data['country']) ? $data['country'] : null;
    }
}