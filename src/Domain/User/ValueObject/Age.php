<?php

declare(strict_types=1);

namespace Src\Domain\User\ValueObject;

use Src\Utility\Util;

final class Age
{
    private readonly int $age;

    public function __construct(int $age)
    {
        if (!filter_var($age, FILTER_VALIDATE_INT, ["options"=>["min_range"=>1,"max_range"=>100]])) {
            throw new \InvalidArgumentException();
        }
        $this->age = $age;
    }

    public function get(): int
    {
        return $this->age;
    }
}
