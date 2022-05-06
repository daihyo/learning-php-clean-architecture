<?php

declare(strict_types=1);

namespace Tests\Unit;

use Src\Domain\User\ValueObject\Mail;

use Tests\TestCase;
use InvalidArgumentException;

class MailTest extends TestCase
{
    /**
     * @test
     * 仕様範囲外の入力はエラーになる
     *
     */
    public function testInputDifferentTypeError(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Mail("test");
    }

    /**
     * @test
     * 仕様通りの入力は場合は正常に動作する
     *
     */
    public function testInputSuccess(): void
    {
        $mail = "test@example.com";

        $userMail = (new Mail($mail))->get();

        $this->assertSame($mail, $userMail);
    }
}
