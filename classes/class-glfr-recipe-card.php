<?php

class RecipeCard {

    private $__char_limit = 100;

    private $name;
    private $content;
    private $excerpt;
    private $url;
    private $author;
    private $tags = array();
    private $post_date;

    public function __construct( $name, $content, $excerpt, $url, $author, $tags, $post_date ) {

        $this->name = $name;
        $this->content = htmlspecialchars( $content );
        $this->excerpt = $excerpt !== null && $excerpt !== '' ? $excerpt : $this->truncate_content( $this->content );
        $this->url = $url;
        $this->author = $author;
        $this->tags = sizeof( $tags ) > 0 ? $tags : array( get_bloginfo( 'name' ) ) ;
        $this->post_date = $post_date;

    }

    private function truncate_content( $content ) {

        //get substring of 100 characters 
        $substr = substr( $content, 0, $this->__char_limit ); 

        //create array of individual words, cut off last word (might be partial), reassamble string from remaining words
        $explode = explode( ' ', $substr );
        array_pop( $explode );
        $output = implode( ' ', $explode );

        //return with ellipse appended
        return $output . "...";

    }


}

?>