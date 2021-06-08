<?php


class LoginTest extends \PHPUnit\Framework\TestCase
{
    public function testUserName()
    {
        $user=new \dash\models\Login;
		$user->setUser('FAC0035');
		$this->assertEquals($user->getUser(),'FAC0035');
    }
	
	public function testPassword()
    {
        $user=new \dash\models\Login;
		$pass=SHA1('Saladfox@456');
		$user->setPassword('Saladfox@456');
		$this->assertEquals($user->getPassword(),$pass);
    }
	
	public function testCookies()
	{
		$user=new \dash\models\Login;
		$pass=SHA1('Saladfox@456');
		$user->setCookies('FAC0040','Letterman@345');
		$this->assertTrue($user->getCookies());
		
	}
}

?>