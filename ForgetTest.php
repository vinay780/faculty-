<?php


class ForgetTest extends \PHPUnit\Framework\TestCase
{
    public function testForgetsq1()
    {
        $user=new \dash\models\Forget;
		$sq1='Geetha';
		$user->setsq1($sq1);
		$this->assertEquals($user->getsq1(),$sq1);
    }
	
	public function testForgetsq2()
    {
        $user=new \dash\models\Forget;
		$sq2='Trichy';
		$user->setsq2($sq2);
		$this->assertEquals($user->getsq2(),$sq2);
    }
	
	
}

?>