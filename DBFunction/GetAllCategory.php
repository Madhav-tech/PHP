<?php
class CategoryTable
{
    private $query;
    private $queryResult;


    public function getQuery()
    {
        return $this->query;
    }
    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }

    public function getQueryResult()
    {
        return $this->queryResult;
    }
    public function setQueryResult($queryResult)
    {
        $this->queryResult = $queryResult;
        return $this;
    }

    public function getAllCategories($connection)
    {
        $this->query = "Select * from categories";
        $this->queryResult = mysqli_query($connection, $this->query);
        if (!$this->queryResult) {
            die(mysqli_error($connection));
        }
        return $this->queryResult;
    }
    public function insertIntoCategoryTable($connection, $catPojo)
    {
        $cat_title = $catPojo->getCat_title();
        $this->query = "Insert Into categories(cat_title) value('$cat_title')";
        $this->query_result = mysqli_query($connection, $this->query);
        if (!$this->queryResult) {
            die(mysqli_error($connection));
        }
        return $this->query_result;
    }

    public function getAllCategoriesFromTitle($connection, $cat_title)
    {
        $this->query = "Select * from categories Where cat_title = '$cat_title'";
        $this->queryResult = mysqli_query($connection, $this->query);
        if (!$this->queryResult) {
            die(mysqli_errno($connection));
        }
        return  $this->queryResult;
    }
    public function getCategoryFromId($connection, $cat_id)
    {

        $this->query = "Select * from categories Where cat_id = '$cat_id'";
        $this->queryResult = mysqli_query($connection, $this->query);
        if (!$this->queryResult) {
            die(mysqli_errno($connection));
        }
        return $this->queryResult;
    }

    function update($connection, $catPojo)
    {
        $id = $catPojo->getCat_id();
        $title = $catPojo->getCat_title();
        $this->query  = "UPDATE categories SET  cat_title ='$title' ";
        $this->query .= " where cat_id = $id";
        $this->queryResult = mysqli_query($connection, $this->query);
        if (!$this->queryResult) {
            die("Query Failed<br>" . mysqli_error($connection));
        }
        return $this->queryResult;
    }
    public function delete($connection,$id)
    {
        $this->query = "DELETE from categories where cat_id = $id";
        $this->queryResult = mysqli_query($connection, $this->query);

        if (!$this->queryResult ) {
            die("Query Faild<br>" . mysqli_error($connection));
        }
        return   $this->queryResult;
    }
}
