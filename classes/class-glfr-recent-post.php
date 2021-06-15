<?php
/**
 * 
 * To keep a consistent theme, the "recent posts" cards should should be wrapped in an anchor tag 
 * and link to the post when you click anywhere on the card, rather than the WordPress default of 
 * clicking on the title. This is not an override, but an available option to those using Gutenberg 
 * to use such cards.
 * 
 * Since this theme is not available publicly, I decided to break the rules and add a Gutenberg 
 * component to the theme, rather than adding a separate plugin.
 * 
 * Looking back at this class a few months after the fact, I can't recall why I am using public fields.
 * I may have to check this code again if I ever want to reuse it. 
 *
 * @package WordPress
 * @subpackage Gluten_Free
 * @since Gluten Free 1.0
 */
?>

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