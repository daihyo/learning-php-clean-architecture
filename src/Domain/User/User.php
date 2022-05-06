<?php

declare(strict_types=1);

namespace Src\Domain\User;

use Src\Domain\User\ValueObject\UserId;
use Src\Domain\User\ValueObject\Name;
use Src\Domain\User\ValueObject\Age;
use Src\Domain\User\ValueObject\Gender;
use Src\Domain\User\ValueObject\Mail;
use Src\Domain\User\ValueObject\Address;

final class User
{
    private UserId $id;
    private Name $name;
    private Age $age;
    private Gender $gender;
    private Mail $mail;
    private Address $address;

    public function __construct(UserId $id, Name $name, Age $age, Gender $gender, Mail $mail, Address $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->mail = $mail;
        $this->address = $address;
    }

    public function get(): User
    {
        return $this;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function age(): Age
    {
        return $this->age;
    }

    public function gender(): Gender
    {
        return $this->gender;
    }

    public function mail(): Mail
    {
        return $this->mail;
    }

    public function address(): Address
    {
        return $this->address;
    }

    public function setName(Name $name): void
    {
        $this->name = $name;
    }

    public function setAge(Age $age): void
    {
        $this->age = $age;
    }

    public function setGender(Gender $gender): void
    {
        $this->gender = $gender;
    }

    public function setMail(Mail $mail): void
    {
        $this->mail = $mail;
    }

    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }
}
