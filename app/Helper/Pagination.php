<?php
namespace App\Helper;
use Illuminate\Http\Request;
use Validator;
class Pagination
{    
    public $total_page;
    public $curent;
    public $before;
    public $after;
    public function pagi($limit,$cu,$total){
        $this -> total_page = (ceil($total / $limit));
        $this -> curent = $cu;
        $this -> before = $cu - 1;
        $this -> after  = $cu + 1;
        if(isset($cu)){
            $this -> curent = $cu;
        }
        else{
            $this -> curent = 1; 
        }
        $start  = ( $this->curent - 1 ) * $limit ;
        $params['start'] = $start ;
        $params['limit'] = $limit + $start;
        return $params ;
    }
}
