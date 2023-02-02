<?php

namespace App\Http\Controllers;

use App\Models\Products\categories;
use App\Models\Products\product_category;
use App\Models\Products\product_image;
use App\Models\Products\products;
use Illuminate\Http\Request;
use CMS;

class propertyController extends Controller
{
   public function list(Request $request, $url){

      $category = categories::where('url',$url)->first();
      $query = product_category::join('product_information','product_information.id','=','product_category_product_information.productID');
                           if($request->category_id){
                              $query->where('categoryID',$request->category_id);
                           }else{
                              $query->where('categoryID',$category->id);
                           }
      $properties = $query->orderby('product_information.id','desc')->get();

      $maps =  $query->where('latitude','!=',"")->orderby('product_information.id','desc')->get();

      if($maps->count() > 0){
         foreach($maps as $prop){
            if(CMS::check_cover_image($prop->id) == 1){
               $image = CMS::admin().'media/products/'.CMS::cover_image($prop->id)->file_name;
            }else{
               $image = asset('images/plan-personal.svg');
            }
            $mapData[] = array(
               'id' => $prop->id,
               'title' => $prop->product_name,
               'photo' => $image,
               'position' => [
                  'lat' => $prop->latitude,
                  'lng' => $prop->longitude
               ],
               'price' => [
                  'long' => 'ksh '.$prop->price,
                  'short' => 0
               ],
               'link' => route('properties.details',$prop->url),
               'features' => [
                  'beds' => $prop->bedrooms,
                  'baths' => $prop->bathrooms,
                  'size' => $prop->size. 'SF',
               ]
            );
         }
      }else{
         $mapData = [];
      }


      return view('property.list', compact('category','url','properties','mapData'));
   }

   public function details($url){

      $property = products::where('url',$url)->first();
      $images = product_image::where('productID',$property->id)->limit(4)->get();
      $categories = product_category::join('product_category','product_category.id','=','product_category_product_information.categoryID')
                              ->where('productID',$property->id)
                              ->orderby('product_category.id','desc')
                              ->get();

      $simCat = product_category::where('productID',$property->id)->first();

      $similarProperties =  product_category::join('product_information','product_information.id','=','product_category_product_information.productID')
                                          ->where('categoryID',$simCat->categoryID)
                                          ->orderby('product_information.id','desc')
                                          ->limit(3)
                                          ->get();


      return view('property.details', compact('property','images','categories','similarProperties'));
   }
}
