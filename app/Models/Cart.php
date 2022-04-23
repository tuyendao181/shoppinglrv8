<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Product;
class Cart extends Model
{
    use HasFactory;
    public $items=[];
	public $totalPrice;
	public $count;
	public function __construct(){
		$this->items = session('cart') ? session('cart') : [];
		$this-> totalPrice= $this->get_total_price();
		$this -> count = count($this->items);
	}

	public function addItem($product,$quantity){
		
		if(isset($this->items[$product->id_atrr])){
			$this->items[$product->id_atrr]['quantity'] += $quantity ;	
		}
		else{
			 $item = [
				'id' =>$product->id_product,
				'image' =>$product->image,
				'name' =>$product->name,
				'price' =>$product->sale_price >0 ? $product->sale_price : $product->price,
				'quantity' => $quantity,
            	'size'  => $product -> name_color,
            	'color' => $product -> name_size
			];
		    $this->items[$product->id_atrr] = $item;
		}
		$this-> totalPrice= $this->get_total_price();
		$this -> count = count($this->items);
		session(['cart' => $this->items]);
	}


	public function updateItem($id,$quantity){
		if(isset($this->items[$id])){
			$quantity = $quantity>0 ? ceil((int)$quantity) : 1;
			$quantity = $quantity<=100 ? $quantity: 99;
			$this->items[$id]['quantity'] = $quantity ;
			$this-> totalPrice= $this->get_total_price();
			session(['cart'=> $this->items]);
		}

	}
	public function removeItem($id){
		if(isset($this->items[$id])){
			unset($this->items[$id]);
			$this -> count = count($this->items);
			$this-> totalPrice= $this->get_total_price();
			session(['cart'=> $this->items]);
		}


	}
	public function removeAll(){
		session(['cart'=>[] ]);

	}

	public function get_total_price(){
		$t=0;
		foreach ($this->items as $item) {
			$t +=$item['price']*$item['quantity'];
		}
		return $t;
	}

	// public function get_total_quantity(){
	// 	$t=0;
	// 	foreach ($this->items as $item) {
	// 		$t +=$item['quantity'];
	// 	}
	// 	return $t;
	// }

}
