<?php

declare(strict_types=1);

namespace Src\Domain\User\ValueObject;

use Src\Utility\Util;

final class Address
{
    private readonly string $address;
    private const MAX_LENGTH = 1000;

    public function __construct(string $address)
    {
        if (!strlen($address) >= self::MAX_LENGTH) {
            throw new \InvalidArgumentException();
        }
        $this->address = $address;
    }

    public function get(): string
    {
        return $this->address;
    }
}
