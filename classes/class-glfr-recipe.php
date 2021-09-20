<?php

class Recipe {

    private $__char_limit = 100;

    private $name;
    private $content;
    private $excerpt;
    private $url;
    private $author;
    private $tags = array();
    private $post_date;
    private $thumb_url;

    public function __construct( $name, $content, $excerpt, $url, $author, $tags, $post_date, $thumb_url ) {

        $this->name = $name;
        $this->content = wp_filter_nohtml_kses( $content );
        $this->excerpt = $excerpt !== null && $excerpt !== '' ? filter_var( $excerpt, FILTER_SANITIZE_STRING ) : $this->truncate_content( $this->content );
        $this->url = $url;
        $this->author = $author;
        $this->tags = $tags ? $tags : get_bloginfo( 'name' );
        $this->post_date = $post_date;
        $this->thumb_url = $thumb_url;

    }

    public function create_assoc_array() {

        return array(

            'name'          =>          $this->name,
            'content'       =>          $this->content,
            'excerpt'       =>          $this->excerpt,
            'url'           =>          $this->url,
            'author'        =>          $this->author,
            'tags'          =>          $this->tags,
            'post_date'     =>          $this->post_date,
            'thumb_url'       =>        $this->thumb_url

        );

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