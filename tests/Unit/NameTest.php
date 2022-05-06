<?php

declare(strict_types=1);

namespace Tests\Unit;

use Src\Domain\User\ValueObject\Name;

use Tests\TestCase;
use InvalidArgumentException;

class NameTest extends TestCase
{
    /**
     * @test
     * 仕様範囲外の入力はエラーになる
     *
     */
    public function testInputDifferentTypeError(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Name("testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest");
    }

    /**
     * @test
     * 仕様通りの入力は場合は正常に動作する
     *
     */
    public function testInputSuccess(): void
    {
        $name = "Test Name";

        $userName = (new Name($name))->get();

        $this->assertSame($name, $userName);
    }
}
