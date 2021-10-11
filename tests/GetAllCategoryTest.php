<?php
include_once  "Database_Classes/dbconfig.php";
include_once "DBFunction/GetAllCategory.php";

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertNotEquals;

class GetAllCategoryTest extends TestCase
{
    private $category;
    private $myConn;
    protected function setUp(): void
    {
        $this->myConn = (new DbConfig())->getConnection();
        $this->category = new CategoryTable();
    }

    public function testGetCategoryFromId()
    {


        $id = 1;
        $result = $this->category->getCategoryFromId($this->myConn, $id);
        assertNotEquals(false, $result);
    }

    public function testGetCategory()
    {
        $category = $this->getMockBuilder('CategoryTable')->getMock();

        $category->expects($this->any())
            ->method('getAllCategories')
            ->with($this->myConn)
            ->will($this->returnValue(true));

        $result = $category->getAllCategories($this->myConn) ? true : false;

        $this->assertEquals(true, $result);
    }
}
