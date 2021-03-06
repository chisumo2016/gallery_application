<?php



class Paginate{

    //properties
     public  $current_page ;
     public  $items_per_page;
     public  $items_total_count;

     //constructor

    public  function __construct($page=1,$items_per_page=4,$items_total_count=0 )
    {
        //Assign to the properties
        $this->current_page      = (int)$page;
        $this->items_per_page    = (int)$items_per_page;
        $this->items_total_count = (int)$items_total_count;
    }

    //Paginate Methods

    public function  next_page(){
        return $this->current_page + 1;
    }

    public function  previous_page(){
        return $this->current_page - 1;
    }

    public  function page_total(){

        return ceil($this->items_total_count/$this->items_per_page);
    }

    //detect next or prev

    public  function  has_previous(){
        return $this->previous_page()  >=1 ? true : false;
    }


    public  function  has_next(){

        return $this->next_page() <= $this->page_total() ?true : false;
    }

    //skip set
    public function  offset(){
        return ($this->current_page - 1) *  $this->items_per_page;
    }
}








