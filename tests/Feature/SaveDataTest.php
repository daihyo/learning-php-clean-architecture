<?php

declare(strict_types=1);

namespace Tests\Feature;

use Src\Application\User\UseCase\SaveData;
use Src\Infrastructure\User\UserAdapterInterface;

use PHPUnit\Framework\TestCase;

class SaveDataTest extends TestCase
{
    /**
     * @var UserAdapterInterface
     */
    private UserAdapterInterface $mockAdapter;

    /**
     * @test
     * ユーザ情報の登録結果が返却される
     */
    public function testExecUser(): void
    {
        $id = "0000000010";
        $name = "Test Name";
        $age = 30;
        $gender = 1;
        $mail = "test@example.com";
        $address = "Shinjuku-ku, Tokyo 160-0023, Japan";

        $mapper = $this->mockAdapter;
        $getData = new SaveData($mapper);
        $data = $getData($id, $name, $age, $gender, $mail, $address);
        $this->assertTrue($data);
    }

    /**
     * 登録結果
     */
    private function mockData(): bool
    {
        return true;
    }

    protected function setUp(): void
    {
        $returnData = $this->mockData();
        $this->mockAdapter = $this->getMockBuilder(UserAdapterInterface::class)->getMock();
        $this->mockAdapter->method('save')->will($this->returnValue($returnData));
    }
}
