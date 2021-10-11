<?php
use PHPUnit\Framework\TestCase;
include_once "Database_Classes/dbconfig.php";
class DbConfigTest extends TestCase{

    private $dbconfig;
    protected function setUp(): void
    {
        $this->dbconfig = new DbConfig();
    }

    protected function tearDown(): void
    {
        $this->dbconfig =NULL;
    }
    public function testGetConnection()
    {
        $result = $this->dbconfig->getConnection();
        $this->assertEquals(false,!$result );
    }
}

?>