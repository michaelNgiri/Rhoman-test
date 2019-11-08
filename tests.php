<?php
use PHPUnit\Framework\TestCase;
class EmptyTest extends TestCase
{
    public function testFailure()
    {
        $this->assertEmpty(['Valuebound']);
    }
    public function testBaseRoute(){
    	$url = "http://localhost/account-actions.php";
    	return $url;
    }
}