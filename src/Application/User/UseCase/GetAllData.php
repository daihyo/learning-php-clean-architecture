<?php

declare(strict_types=1);

namespace Src\Application\User\UseCase;

use Src\Application\User\Repository\UserRepository;
use Src\Infrastructure\User\UserAdapterInterface;
use Src\Infrastructure\User\UserMapper;
use Src\Domain\User\User;

final class GetAllData
{
    private UserRepository $repository;

    public function __construct(UserAdapterInterface $adapter)
    {
        $mapper = new UserMapper($adapter);
        $this->repository = new UserRepository($mapper);
    }

    public function __invoke(): array
    {
        return $this->repository->getAllUsers();
    }
}
