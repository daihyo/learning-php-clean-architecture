<?php

declare(strict_types=1);

namespace Src\Domain\User\Repository;

use Src\Domain\User\User;
use Src\Domain\User\ValueObject\UserId;

interface UserRepositoryInterface
{
    public function getUser(UserId $id): null|User;
    public function saveUser(User $user): bool;
    public function getAllUsers(): array;
}
