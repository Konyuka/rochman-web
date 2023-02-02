<?php

namespace App\Http\Livewire;

use App\Models\Products\categories;
use App\Models\Products\product_category;
use Livewire\Component;

class Properties extends Component
{
   public $url;
   public $category_id;

   public function render()
   {
      $category = categories::where('url',$this->url)->first();
      $query = product_category::join('product_information','product_information.id','=','product_category_product_information.productID');
                           if($this->category_id){
                              $query->where('categoryID',$this->category_id);
                           }else{
                              $query->where('categoryID',$category->id);
                           }
      $properties = $query->orderby('product_information.id','desc')->get();

      return view('livewire.properties', compact('properties','category'));
   }
}
