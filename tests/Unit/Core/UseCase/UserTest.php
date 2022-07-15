<?php

namespace Tests\Unit\Core\UseCase;

use PHPUnit\Framework\TestCase;
use App\Core\UseCase\UserUseCase;
use App\Core\Repository\UserRepository;
use App\Core\Entity\User;

class UserTest extends TestCase
{
    /**
     *  @dataProvider userDataProvider
     */
    public function testGetUserbyID($id,$name,$comments)
    {
        $userUseCase = new UserUseCase($this->getUserRepoMock($id, $name, $comments));
        $user = $userUseCase->getRecord($id);

        $this->assertEquals('John Doe', $user->getName());
    }


    
    private function getUserRepoMock($id, $name, $comments)
    {
        $data = ['id' =>$id,
                 'name' => $name,
                 'comments'=> $comments];
        $mockObject = $this->getMockBuilder(UserRepository::class)
            ->disableOriginalConstructor()
            ->setMethods(['find','appendComments'])
            ->getMock();
        $mockObject->method('find')
            ->willReturn($data);

        return $mockObject;
    }

    function userDataProvider(){
        return [
            [1, 'John Doe', 'Test Description']
        ];
    }
}
