<?php

declare(strict_types=1);

namespace Src\Application\User\UseCase;

use Src\Application\User\Repository\UserRepository;
use Src\Infrastructure\User\UserAdapterInterface;
use Src\Infrastructure\User\UserMapper;
use Src\Domain\User\User;
use Src\Domain\User\ValueObject\UserId;

final class GetData
{
    private UserRepository $repository;

    public function __construct(UserAdapterInterface $adapter)
    {
        $mapper = new UserMapper($adapter);
        $this->repository = new UserRepository($mapper);
    }

    public function __invoke(string $id): null|User
    {
        return $this->repository->getUser(new UserId($id));
    }
}
