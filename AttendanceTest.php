<?php
class AttendanceTest extends \PHPUnit\Framework\TestCase

    public function testSickLeave()
    {
        $user=new \dash\models\Attendance;
		    $sick=3;
        $res='Green';
	     	$user->setSick('FAC0035',$sick);
	    	$this->assertEquals($user->getSick(),$res);
    }

    public function testODLeave()
    {
        $user=new \dash\models\Attendance;
		    $od=1;
        $res='Green';
	     	$user->setOD('FAC0035',$od);
	    	$this->assertEquals($user->getOD(),$res);
    }

    public function testCasualLeave()
    {
        $user=new \dash\models\Attendance;
		    $casual=5;
        $res='Green';
	     	$user->setCasual('FAC0035',$casual);
	    	$this->assertEquals($user->getCasual(),$res);
    }

    public function testPaidLeave()
    {
        $user=new \dash\models\Attendance;
		    $paid=7;
        $res='Green';
	     	$user->setPaid('FAC0035',$paid);
	    	$this->assertEquals($user->getPaid(),$res);
    }
}

?>
