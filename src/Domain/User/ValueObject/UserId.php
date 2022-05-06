<?php

declare(strict_types=1);

namespace Src\Domain\User\ValueObject;

use Src\Utility\Util;

final class UserId
{
    private readonly string $id;

    public function __construct(string $id)
    {
        if (!Util::isId($id)) {
            throw new \InvalidArgumentException();
        }
        $this->id = $id;
    }

    public function get(): string
    {
        return $this->id;
    }
}
