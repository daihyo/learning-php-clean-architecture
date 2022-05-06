<?php

declare(strict_types=1);

namespace Src\Infrastructure\User;

use Src\Domain\User\User;
use Src\Application\User\Repository\UserMapperInterface;
use Src\Infrastructure\User\UserAdapterInterface;
use Src\Domain\User\ValueObject\UserId;
use Src\Domain\User\ValueObject\Name;
use Src\Domain\User\ValueObject\Age;
use Src\Domain\User\ValueObject\Gender;
use Src\Domain\User\ValueObject\Mail;
use Src\Domain\User\ValueObject\Address;

class UserMapper implements UserMapperInterface
{
    private UserAdapterInterface $adapter;

    public function __construct(UserAdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getUser(UserId $id): null|User
    {
        $user = $this->adapter->find($id);
        return $this->convUserObj($user);
    }

    public function saveUser(User $user): bool
    {
        return $this->adapter->save($user);
    }

    public function getAllUsers(): array
    {
        $users = $this->adapter->findAll();
        return array_map(array($this,'convUserObj'), $users);
    }

    private function convUserObj(object $user): null|User
    {
        foreach (["id","name","age","gender","mail", "address"] as $i) {
            if (!property_exists($user, $i)) {
                return null;
            }
        }

        return new User(
            new UserId($user->id ?? null),
            new Name($user->name ?? null),
            new Age($user->age ?? null),
            new Gender($user->gender ?? null),
            new Mail($user->mail ?? null),
            new Address($user->address ?? null)
        );
    }
}
