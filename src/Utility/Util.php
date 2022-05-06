<?php

declare(strict_types=1);

namespace Src\Utility;

class Util
{
    private const MAX_ID_DIGIT = 10;

    public static function isId(string $id): bool
    {
        return ctype_digit($id) && strlen($id) === self::MAX_ID_DIGIT;
    }
}
