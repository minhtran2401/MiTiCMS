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




}
?>