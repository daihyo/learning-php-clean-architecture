<?php

declare(strict_types=1);

namespace Tests\Feature;

use Src\Application\User\UseCase\GetAllData;
use Src\Domain\User\User;
use Src\Infrastructure\User\UserAdapterInterface;

use PHPUnit\Framework\TestCase;

class GetAllDataTest extends TestCase
{
    /**
     * @var UserAdapterInterface
     */
    private UserAdapterInterface $mockAdapter;

    /**
     * @test
     * 全てのユーザ情報が返却される
     */
    public function testExecUser(): void
    {
        $mapper = $this->mockAdapter;
        $getAllData = new GetAllData($mapper);
        $data = $getAllData();
        $this->assertIsArray($data);
    }

    /**
     * ユーザ情報
     */
    private function mockData(): array
    {
        return (array) [(object) [
            'id' => "0000000001",
            'name' =>  "Test Name",
            'age' => 30,
            'gender' => 1,
            'mail' => "test@example.com",
            'address' => "Shinjuku-ku, Tokyo 160-0023, Japan",
        ]];
    }

    protected function setUp(): void
    {
        $returnData = $this->mockData();
        $this->mockAdapter = $this->getMockBuilder(UserAdapterInterface::class)->getMock();
        $this->mockAdapter->method('findAll')->will($this->returnValue($returnData));
    }
}
