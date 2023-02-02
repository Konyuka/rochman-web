<?php
namespace App\Helpers;

use App\Models\Products\categories;
use App\Models\cms\pages;
use App\Models\cms\blog;
use App\Models\cms\category;
use App\Models\cms\menu;
use App\Models\cms\gallery;
use App\Models\cms\file_manager;
use App\Models\cms\page_menu;
use App\Models\general\settings;
use App\Models\cms\custom_field;
use App\Models\cms\slider;
use App\Models\Products\product_image;
use App\Models\Products\product_category;
use App\Models\Products\products;

class cms {
   public static function get_timeago( $ptime ){
     $estimate_time = time() - $ptime;

     if( $estimate_time < 1 )
     {
        return 'less than 1 second ago';
     }

     $condition = array(
                 12 * 30 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60       =>  'month',
                 24 * 60 * 60            =>  'day',
                 60 * 60                 =>  'hr',
                 60                      =>  'min',
                 1                       =>  'sec'
     );

     foreach( $condition as $secs => $str )
     {
        $d = $estimate_time / $secs;

        if( $d >= 1 )
        {
              $r = round( $d );
              return $r . ' ' . $str . ( $r > 1 ? '' : '' ) . ' ago';
        }
     }
   }

   public static function seoUrl($string) {
      //Lower case everything
      $string = strtolower($string);
      //Make alphanumeric (removes all other characters)
      $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
      //Clean up multiple dashes or whitespaces
      $string = preg_replace("/[\s-]+/", " ", $string);
      //Convert whitespaces and underscore to dash
      $string = preg_replace("/[\s_]/", "-", $string);
      return $string;
   }

   public static function generateRandomString($length = 6) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
         $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
   }

   public static function admin(){
      $link = 'https://crm.rochman-properties.co.ke/public/';
      return $link;
   }

   //check
   public function check_string($string,$stringToSearch){
      if (stripos($string,$stringToSearch) !== false) {
         return 'true';
      }
   }

   //=====================================================================================================================
   //============================================ Pages ==================================================================
   //=====================================================================================================================
   /*======== check if the page is main page =======*/
   public static function check_if_page_is_parent($id){
      $check = pages::where('id',$id)->where('parentID',0)->count();
      return $check;
   }

   /*======== get main pages =======*/
   public static function main_page($order){
      $pages = pages::where('parentID',0)
               ->where('status',31)
               ->where('visibility','public')
               ->orderby('id',$order)
               ->get();
      return $pages;
   }

   /*======== get parent page of a child page =======*/
   public static function get_main_page($id){
      $main = pages::where('parentID',0)->where('id',$id)->first();
      return $main;
   }

   public static function page($id){
      $parent = pages::find($id);
      return $parent;

   }

   /*======== check child pages =======*/
   public static function check_child($id){
      $check = pages::where('parentID',$id)->where('status',31)->where('visibility','public')->count();
      return $check;
   }

   /*======== get child pages =======*/
   public static function child_page($id,$order){
      $children =  pages::where('parentID',$id)->where('status',31)->where('visibility','public')->orderby('id',$order)->get();
      return $children;
   }

   /*======== check custom field =======*/
   public static function custom_field($id,$title){
      $field = custom_field::where('pageID',$id)->where('title',$title);
      return response()->json([
         "field" => $field->first(),
         "check" => $field->count(),
      ]);
   }

   //=====================================================================================================================
   //============================================ Menu ===================================================================
   //=====================================================================================================================
   //check if menu exists
   public static function check_menu($id){
      $check = menu::where('id',$id)->where('status',15)->count();
      return $check;
   }

   //get menu pages
   public static function menu_main_pages($id){
      $page = page_menu::join('pages','pages.id','=','page_menu.pageID')
                        ->where('menuID',$id)
                        ->where('page_menu.parentID',0)
                        ->orderby('position')
                        ->select('*','pages.id as pageID')
                        ->get();

      return $page;
   }

   //check if has menu page has children
   public static function check_menu_page_children($menuID,$pageID){
      $check = page_menu::where('parentID',$pageID)->where('menuID',$menuID)->count();
      return $check;
   }

   //get menu page children
   public static function menu_page_children($menuID,$pageID){
      $children = page_menu::join('pages','pages.id','=','page_menu.pageID')
                           ->where('page_menu.parentID',$pageID)
                           ->where('menuID',$menuID)
                           ->select('*','page_menu.position as position','page_menu.pageID as pageID','page_menu.id as menuItemID')
                           ->orderby('page_menu.position','asc')
                           ->get();
      return $children;
   }

   //=====================================================================================================================
   //============================================ settings ==================================================================
   //=====================================================================================================================

   /*======== settings =======*/
   public static function settings($name){
      $settings = settings::where('name',$name)->first()->value;
      return $settings;
   }

   //=====================================================================================================================
   //============================================ blog ===================================================================
   //=====================================================================================================================
   /*======== get posts =======*/
   public static function posts(){
      $posts = blog::where('status',31)->where('visibility','public')->orderby('id','desc')->get();
      return $posts;
   }

   /*======== get by category =======*/
   public static function post_categories($id){
      $blog = category::join('blog_category','blog_category.category_id','=','category_blogs.id')
               ->where('blog_id',$id)
               ->get();
      return $blog;
   }

   public static function all_post_categories(){
      $categories = category::where('status',15)->get();
      return $categories;
   }

   /*======== latest article =======*/
   public static function latest($id){
      $latest = blog::join('blog_category','blogs.id','=','blog_category.blog_id')
               ->where('blog_category.id',$id)
               ->orderby('blogs.id','desc')
               ->select('*','blogs.created_at as blog_date','blogs.url as blog_url')
               ->get();

      return $latest;
   }


   //========================================================================================================================
   //============================================ Gallery ===================================================================
   //========================================================================================================================
   /*======== get gallery =======*/
   public static function get_gallery($id){
      $gallery = gallery::where('id',$id)->where('status',15)->firts();
      return $gallery;
   }

   /*======== check gallery =======*/
   public static function check_gallery($id){
      $check = gallery::where('id',$id)->where('status',15)->count();
      return $check;
   }

   /*======== get gallery images =======*/
   public static function get_gallery_images($id){
      $check = file_manager::where('parentID',$id)->get();
      return $check;
   }


   //========================================================================================================================
   //============================================ Products ===================================================================
   //========================================================================================================================
    /*======== property =======*/
    public function property($id){
      $property = products::find($id);
      return $property;
    }
   /*======== get Products =======*/
   public function product_categories($id){
      $categories = categories::where('parentID',$id)->orderby('id','asc')->get();
      return $categories;
   }

   /*======== check cover image =======*/
   public function check_cover_image($id){
      $check = product_image::where('productID',$id)->where('cover',1)->count();
      return $check;
   }

   /*======== cover image =======*/
   public function cover_image($id){
      $cover = product_image::where('productID',$id)->where('cover',1)->first();
      return $cover;
   }

   public function single_product_categories($id){
      $categories = product_category::join('product_category','product_category.id','=','product_category_product_information.categoryID')
                        ->where('productID',$id)
                        ->orderby('product_category.id','desc')

                        ->get();

      return $categories;
   }


   //========================================================================================================================
   //============================================ Slider ===================================================================
   //========================================================================================================================
   public static function sliders(){
      $sliders = slider::where('status',15)->orderby('id','desc')->get();
      return $sliders;
   }
}
