<?php

declare(strict_types=1);

namespace Tests\Unit;

use Src\Domain\User\ValueObject\Address;

use Tests\TestCase;
use InvalidArgumentException;

class AddressTest extends TestCase
{
    /**
     * @test
     * 仕様通りの入力は場合は正常に動作する
     *
     */
    public function testInputSuccess(): void
    {
        $address = "Shinjuku-ku, Tokyo 160-0023, Japan";

        $userAddress = (new Address($address))->get();

        $this->assertSame($address, $userAddress);
    }
}
