<?php

declare(strict_types=1);

namespace Tests\Unit;

use Src\Domain\User\ValueObject\Gender;

use Tests\TestCase;
use InvalidArgumentException;

class GenderTest extends TestCase
{
    /**
     * @test
     * 仕様範囲外の入力はエラーになる
     *
     */
    public function testInputDifferentTypeError(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Gender(111111);
    }

    /**
     * @test
     * 仕様通りの入力は場合は正常に動作する
     *
     */
    public function testInputSuccess(): void
    {
        $genderId = 1;

        $userGenderId = (new Gender($genderId))->get();

        $this->assertSame($genderId, $userGenderId);
    }
}
