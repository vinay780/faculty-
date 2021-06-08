<?php


class HeadFacultyTest extends \PHPUnit\Framework\TestCase
{
    public function testDatediff()
    {
        $user=new \dash\models\HeadFaculty;
		    $today=date_create(date("Y-m-d"));
        $start=date_create("2020-06-04");

	     	$user->setDate($today,$start);
	    	$this->assertTrue($user->getDiff());
    }

    public function testAccept()
    {
        $user=new \dash\models\HeadFaculty;
		    $end=date_create("2020-08-1");
        $start=date_create("2020-08-11");
        $res='Accept';
	     	$user->setDate($end,$start);
	    	$this->assertEquals($user->getApproval(),$res);
    }

    public function testReject()
    {
        $user=new \dash\models\HeadFaculty;
		    $end=date_create("2020-10-10");
        $start=date_create("2020-12-12");
        $res='Reject';
	     	$user->setDate($end,$start);
	    	$this->assertEquals($user->getApproval(),$res);
    }






}

?>
