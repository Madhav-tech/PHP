<?php
class Category
{
    private $cat_id;
    private $cat_title;

    public function getCat_id()
    {
        return $this->cat_id;
    }

    public function setCat_id($cat_id)
    {
        $this->cat_id = $cat_id;

        return $this;
    }

    public function getCat_title()
    {
        return $this->cat_title;
    }
    public function setCat_title($cat_title)
    {
        $this->cat_title = $cat_title;

        return $this;
    }
}
