<?php 
namespace App\Models;
class Cart{
    public $products = null;
  

    public function __construct($cart){
        if($cart){
            $this->products = $cart->products;
           
        }
    }

    public function AddCart($data, $id){
        $newProduct =  $data;
        if($this->products){
            if(isset($id, $this->products)){
                $newProduct = $this->products;
            }
        }
        $this->products =  $newProduct;
                // dd($product);
   
    }



    public function DeleteItemCart($id){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }


}
?>