<?php
class Posts
{
    private $postId;
    private $postsCategoryId;
    private $postTitle;
    private $postAuthor;
    private $postDate;
    private $postImage;
    private $postContent;
    private $postTags;
    private $postCommentCount;
    private $postStatus;
    // function __construct($post_category_id, $post_title, $post_author, $post_date, $post_image, $post_content, $post_tags)
    // {
    //     $this->post_category_id = $post_category_id;
    //     $this->post_title = $post_title;
    //     $this->post_author = $post_author;
    //     $this->post_date = $post_date;
    //     $this->post_image = $post_image;
    //     $this->post_content = $post_content;
    //     $this->post_tags = $post_tags;
    // }
    public function getPostId()
    {
        return $this->postId;
    }
    public function setPostId($postId)
    {
        $this->postId = $postId;
        return $this;
    }

    public function getPostsCategoryId()
    {
        return $this->postsCategoryId;
    }
    public function setPostsCategoryId($postsCategoryId)
    {
        $this->postsCategoryId = $postsCategoryId;
        return $this;
    }
    public function getPostTitle()
    {
        return $this->postTitle;
    }
    public function setPostTitle($postTitle)
    {
        $this->postTitle = $postTitle;
        return $this;
    }
    public function getPostAuthor()
    {
        return $this->postAuthor;
    }
    public function setPostAuthor($postAuthor)
    {
        $this->postAuthor = $postAuthor;
        return $this;
    }
    public function getPostDate()
    {
        return $this->postDate;
    }
    public function setPostDate($postDate)
    {
        $this->postDate = $postDate;
        return $this;
    }
    public function getPostImage()
    {
        return $this->postImage;
    }
    public function setPostImage($postImage)
    {
        $this->postImage = $postImage;
        return $this;
    }
    public function getPostContent()
    {
        return $this->postContent;
    }
    public function setPostContent($postContent)
    {
        $this->postContent = $postContent;
        return $this;
    }
    public function getPostTags()
    {
        return $this->postTags;
    }
    public function setPostTags($postTags)
    {
        $this->postTags = $postTags;
        return $this;
    }
    public function getPostCommentCount()
    {
        return $this->postCommentCount;
    }
    public function setPostCommentCount($postCommentCount)
    {
        $this->postCommentCount = $postCommentCount;
        return $this;
    }
    public function getPostStatus()
    {
        return $this->postStatus;
    }
    public function setPostStatus($postStatus)
    {
        $this->postStatus = $postStatus;
        return $this;
    }
}
?>
