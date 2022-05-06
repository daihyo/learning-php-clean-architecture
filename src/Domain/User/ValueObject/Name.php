<?php

declare(strict_types=1);

namespace Src\Domain\User\ValueObject;

final class Name
{
    private readonly string $name;

    public function __construct(string $name)
    {
        if (strlen($name) >= 20) {
            throw new \InvalidArgumentException();
        }
        $this->name = $name;
    }

    public function get(): string
    {
        return $this->name;
    }
}
