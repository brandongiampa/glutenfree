<?php

class GLFR_Recent_Post {

    public $url;
    public $thumbnail; 
    public $title; 
    public $date; 
    public $author;
    public $author_url;
    public $excerpt;
    public $category;

    // private $url;
    // private $thumbnail; 
    // private $title; 
    // private $date; 
    // private $author;
    // private $author_url;
    // private $excerpt;
    // private $category;

    function __construct( $post_obj, $category ) {
        $this->url = $post_obj[ 'guid' ];
        $this->thumbnail = get_the_post_thumbnail_url( $post_obj[ 'ID' ] );
        $this->title = $post_obj[ 'post_name' ];
        $this->date = $post_obj[ 'post_date' ];
        $this->author = get_the_author_meta( 'display_name', $post_obj[ 'post_author' ] );
        $this->author_url = get_the_author_meta( 'user_url', $post_obj[ 'post_author' ] );
        $this->excerpt = $post_obj[ 'post_excerpt' ];
        $this->category = $category;
    }

    // public function get_url() {
    //     return $this->url;
    // }

    // public function get_thumbnail() {
    //     return $this->thumbnail;
    // }

    // public function get_title() {
    //     return $this->title;
    // }

    // public function get_date() {
    //     return $this->date;
    // }

    // public function get_author() {
    //     return $this->author;
    // }

    // public function get_author_url() {
    //     return $this->author_url;
    // }

    // public function get_excerpt() {
    //     return $this->excerpt;
    // }

    // public function get_category() {
    //     return $this->category;
    // }

}

?>