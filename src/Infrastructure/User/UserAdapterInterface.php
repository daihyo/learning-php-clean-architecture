<?php

declare(strict_types=1);

namespace Src\Infrastructure\User;

use Src\Domain\User\ValueObject\UserId;
use Src\Domain\User\User;

interface UserAdapterInterface
{
    public function find(UserId $id): null|object;
    public function save(User $user): bool;
    public function findAll(): array;
}
