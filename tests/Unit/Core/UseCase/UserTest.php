<?php

namespace Tests\Unit\Core\UseCase;

use PHPUnit\Framework\TestCase;
use App\Core\UseCase\UserUseCase;
use App\Core\Repository\UserRepository;
use App\Core\Entity\User;
use App\Core\UseCase\UserCommentException;

class UserTest extends TestCase
{
    /**
     *  @dataProvider userDataProvider
     */
    public function testGetUserbyID($id,$name,$comments)
    {
        $userUseCase = new UserUseCase($this->getUserFetchRepoMock($id, $name, $comments));
        $user = $userUseCase->getRecord($id);

        $this->assertEquals('John Doe', $user->getName());
    }

    /**
     *  @dataProvider userDataProvider
     *  @expectedException App\Core\UseCase\UserCommentException
     */
    public function testAppendNullComments($id, $name, $comments)
    {
        $userUseCase = new UserUseCase($this->getUserAppendRepoMock($id, $name, $comments));
        $userUseCase->appendComments($id, null);
       
    }

    /**
     *  @dataProvider userDataProvider
     *  @expectedException App\Core\UseCase\UserCommentException
     */
    public function testAppendEmptyComments($id, $name, $comments)
    {
        $userUseCase = new UserUseCase($this->getUserAppendRepoMock($id, $name, $comments));
        $userUseCase->appendComments($id, "");       
    }

    /**
     *  @dataProvider userDataProvider
     *  
     */
    public function testAppendComments($id, $name, $comments)
    {
        $userUseCase = new UserUseCase($this->getUserAppendRepoMock($id, $name, $comments));
        $affectedRow = $userUseCase->appendComments($id, $comments);  
        
        $this->assertEquals(1, $affectedRow);
    }

    
    private function getUserFetchRepoMock($id, $name, $comments)
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

    private function getUserAppendRepoMock($id, $name, $comments)
    {
        $data = ['id' =>$id,
                 'name' => $name,
                 'comments'=> $comments];
        $mockObject = $this->getMockBuilder(UserRepository::class)
            ->disableOriginalConstructor()
            ->setMethods(['find','appendComments'])
            ->getMock();
        $mockObject->method('appendComments')
            ->willReturn(1);

        return $mockObject;
    }

    function userDataProvider(){
        return [
            [1, 'John Doe', 'Test Description']
        ];
    }
    
}
