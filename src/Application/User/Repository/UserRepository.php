<?php

declare(strict_types=1);

namespace Src\Application\User\Repository;

use Src\Domain\User\Repository\UserRepositoryInterface;
use Src\Domain\User\User;
use Src\Domain\User\ValueObject\UserId;

class UserRepository implements UserRepositoryInterface
{
    private UserMapperInterface $mapper;

    public function __construct(UserMapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    public function getUser(UserId $id): null|User
    {
        return $this->mapper->getUser($id);
    }

    public function saveUser(User $user): bool
    {
        return $this->mapper->saveUser($user);
    }

    public function getAllUsers(): array
    {
        return $this->mapper->getAllUsers();
    }
}
