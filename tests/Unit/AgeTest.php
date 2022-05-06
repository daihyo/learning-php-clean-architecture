<?php

declare(strict_types=1);

namespace Tests\Unit;

use Src\Domain\User\ValueObject\Age;

use Tests\TestCase;
use InvalidArgumentException;

class AgeTest extends TestCase
{
    /**
     * @test
     * 仕様範囲外の入力はエラーになる
     *
     */
    public function testInputDifferentTypeError(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Age(111111);
    }

    /**
     * @test
     * 仕様通りの入力は場合は正常に動作する
     *
     */
    public function testInputSuccess(): void
    {
        $ageId = 1;

        $userAgeId = (new Age($ageId))->get();

        $this->assertSame($ageId, $userAgeId);
    }
}
