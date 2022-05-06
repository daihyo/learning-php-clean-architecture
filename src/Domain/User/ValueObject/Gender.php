<?php

declare(strict_types=1);

namespace Src\Domain\User\ValueObject;

use Src\Utility\Util;

final class Gender
{
    private readonly int $gender;

    public function __construct(int $gender)
    {
        if (!filter_var($gender, FILTER_VALIDATE_INT, ["options"=>["min_range"=>1,"max_range"=>4]])) {
            throw new \InvalidArgumentException();
        }
        $this->gender = $gender;
    }

    public function get(): int
    {
        return $this->gender;
    }
}
