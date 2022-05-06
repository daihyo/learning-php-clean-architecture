<?php

declare(strict_types=1);

namespace Tests\Unit;

use Src\Domain\User\ValueObject\UserId;

use Tests\TestCase;
use InvalidArgumentException;

class UserIdTest extends TestCase
{
    /**
     * @test
     * 数値意外はエラーになる
     *
     */
    public function testInputDifferentTypeError(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new UserId("test");
    }

    /**
     * @test
     * 仕様通りのIDが入力された場合は正常に動作する
     *
     */
    public function testInputSuccess(): void
    {
        $id = "0000000010";

        $userId = (new UserId($id))->get();

        $this->assertSame($id, $userId);
    }
}
