<?php

declare(strict_types=1);

namespace Tests\Feature;

use Src\Application\User\UseCase\GetData;
use Src\Domain\User\User;
use Src\Infrastructure\User\UserAdapterInterface;

use PHPUnit\Framework\TestCase;

class GetDataTest extends TestCase
{
    /**
     * @var UserAdapterInterface
     */
    private UserAdapterInterface $mockAdapter;

    /**
     * @test
     * ユーザ情報が返却される
     */
    public function testExecUser(): void
    {
        $id = "0000000010";
        $mapper = $this->mockAdapter;
        $getData = new GetData($mapper);
        $data = $getData($id);
        $this->assertInstanceOf(User::class, $data);
    }

    /**
     * ユーザ情報
     */
    private function mockData(): object
    {
        return (object) [
            'id' => "0000000001",
            'name' =>  "Test Name",
            'age' => 30,
            'gender' => 1,
            'mail' => "test@example.com",
            'address' => "Shinjuku-ku, Tokyo 160-0023, Japan",
        ];
    }

    protected function setUp(): void
    {
        $returnData = $this->mockData();
        $this->mockAdapter = $this->getMockBuilder(UserAdapterInterface::class)->getMock();
        $this->mockAdapter->method('find')->will($this->returnValue($returnData));
    }
}
