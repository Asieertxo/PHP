<?php

class Book{
    public $author;
    public $title;
    public $id;
    private static $lastId = 0;

    public function __construct($author, $title, $id){
        $this->author = $author;
        $this->title = $title;

        if($id == null){
            $this->id=++self::$lastId;
        }else{
            $this->id = $id;
        }
        if($id>self::$lastId){
            self::$lastId=$id;
        }
    }

    public function __toString(){
        return
        "<div>
            <p>$this->author</p>
            <p>$this->title</p>
            <p>$this->id</p>
        </div>"
        ;
    }
}

?>