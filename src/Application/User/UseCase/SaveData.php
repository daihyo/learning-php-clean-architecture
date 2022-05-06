<?php

declare(strict_types=1);

namespace Src\Application\User\UseCase;

use Src\Application\User\Repository\UserRepository;
use Src\Infrastructure\User\UserAdapterInterface;
use Src\Infrastructure\User\UserMapper;
use Src\Domain\User\User;
use Src\Domain\User\ValueObject\UserId;
use Src\Domain\User\ValueObject\Name;
use Src\Domain\User\ValueObject\Age;
use Src\Domain\User\ValueObject\Gender;
use Src\Domain\User\ValueObject\Mail;
use Src\Domain\User\ValueObject\Address;

final class SaveData
{
    private UserRepository $repository;

    public function __construct(UserAdapterInterface $adapter)
    {
        $mapper = new UserMapper($adapter);
        $this->repository = new UserRepository($mapper);
    }

    public function __invoke(string $id, string $name, int $age, int $gender, string $mail, string $address): bool
    {
        return $this->repository->saveUser(new User(
            new UserId($id),
            new Name($name),
            new Age($age),
            new Gender($gender),
            new Mail($mail),
            new Address($address)
        ));
    }
}
