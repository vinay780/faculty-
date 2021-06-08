<?php


class ProfileTest extends \PHPUnit\Framework\TestCase
{
    public function testQualificaton()
    {
        $user=new \dash\models\Profile;
		$qual='M. Tech';
		$user->setQual('FAC0035',$qual);
		$this->assertTrue($user->getQual());
    }
	
	public function testEmailid()
    {
        $user=new \dash\models\Profile;
		$email='ramkumar@gmail.com';
		$user->setEmail('FAC0035',$email);
		$this->assertTrue($user->getEmail());
    }
	
	public function testPhone()
    {
        $user=new \dash\models\Profile;
		$phone='9843249546';
		$user->setPhone('FAC0035',$phone);
		$this->assertTrue($user->getPhone());
    }
	public function testPosition()
    {
        $user=new \dash\models\Profile;
		$pos='Assistant Professor';
		$user->setPosition('FAC0035',$pos);
		$this->assertTrue($user->getPosition());
    }
	
	public function testDept()
    {
        $user=new \dash\models\Profile;
		$dept='Computer Science';
		$user->setDept('FAC0035',$dept);
		$this->assertTrue($user->getDept());
    }
	public function testEwallet()
    {
        $user=new \dash\models\Profile;
		$wal='150';
		$user->setWallet('FAC0035',$wal);
		$this->assertTrue($user->getWallet());
    }
	
	public function testNotify()
    {
        $user=new \dash\models\Profile;
		$wal='150';
		$user->setWallet('FAC0035',$wal);
		$this->assertEquals($user->getnotify(),'reimburse');
    }
	
	
	
	
}

?>