<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\cms\blog;
use App\Models\cms\inquiry;
use App\Models\cms\pages;
use App\Models\cms\slider;
use App\Models\cms\template;
use App\Models\Products\product_category;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\Products\products;
use Illuminate\Http\Request;
use Newsletter;
use Session;
use CMS;

class pagesController extends Controller
{
   //home page
   public function home(){

      // $sliders = slider::where('status',15)->orderby('id','desc')->get();
      $sliders = slider::where('status',15)->orderby('id','desc')->select(['id', 'image', 'caption_one', 'caption_two', 'caption_three'])->get();
      $blogs = blog::limit(3)->orderby('id','desc')->get();
      $page = pages::find(7);
      $featured = products::where('feature_alert','!=',"")->orderby('id','desc')->limit(4)->get();
      // return dd($featured);
      $lands = product_category::join('product_information','product_information.id','=','product_category_product_information.productID')
                                    ->where('categoryID',4)
                                    ->orderby('product_information.id','desc')
                                    ->get();

      return view('pages.home', compact('sliders','page','blogs','featured','lands'));
   }

   public function mainpage(Request $request, $main){
      if($main == 'home'){
         return redirect()->route('home.page');
      }

      if($main == 'blog'){
         $blogs = blog::orderby('id','desc')->get();
         $page = pages::where('url','blog')->first();

         return view('blog.classic', compact('blogs','page'));
      }

      $page = pages::where('url',$main)->first();
      $template = template::find($page->template);

      if($page->template == ""){
         return view('pages.general',compact('page'));
      }else{
         return view('pages.'.$template->blade_name, compact('page'));
      }


   }

   public function childpage($parent,$url){
      $page = pages::where('url',$url)->first();
      $template = template::find($page->template);

      $parent = pages::where('url',$parent)->first();

      if($page->template == ""){
         $parent = [];
         return view('pages.general',compact('page'));
      }else{
         return view('pages.'.$template->blade_name, compact('page','parent'));
      }

   }

   public function blog_details($url){
      $blog = blog::where('url',$url)->first();
      return view('blog.details', compact('blog'));
   }

   public function blog_category($url){
      $category = category::where('url',$url)->first();
      $posts = blog_category::join('blogs','blogs.id','=','blog_category.blog_id')
                  ->where('blog_category.category_id', $category->id)
                  ->select('*','blogs.url as blog_url','blogs.created_at as publish_date','blogs.id as pid')
                  ->paginate(6);
      return view('pages.blog-category', compact('posts','category'));
   }

   public function view_inquiry(Request $request){
      $this->validate($request,[
         'names' => 'required',
         'phone_number' => 'required',
         'view_date' => 'required',
         'view_time' => 'required',
      ]);

      $inquiry = new inquiry;
      $inquiry->names         = $request->names;
      $inquiry->email         = $request->email;
      $inquiry->phone_number  = $request->phone_number;
      $inquiry->subject       = $request->subject;
      $inquiry->property_id   = $request->property_id;
      $inquiry->view_date     = $request->view_date;
      $inquiry->view_time     = $request->view_time;
      $inquiry->message	      = $request->message;
      $inquiry->type	         = 'Property';
      $inquiry->save();

      //send email
      // /*======= send email ======*/
      $mail = new PHPMailer(true);
      $mail->SMTPDebug = 1;                                 // Set mailer to use SMTP
      $mail->Host = 'smtp.sendgrid.net';                    // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'notification@supremepowersystems.com';                          // SMTP username
      $mail->Password = 'NmV7QH9HBm3J';                     // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      //Recipients
      //$mail->setFrom('sales@rochman-properties.co.ke', 'Rochman Properties');
      $mail->setFrom('notification@supremepowersystems.com', 'Rochman Properties');
      // Add

      // //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $request->subject;

      $mail->addAddress('sales@rochman-properties.co.ke');

      $property = CMS::property($request->property_id);

      // Compose a simple HTML email message
      $message = '<html><body>';
      $message .= '<h3 style="color:#333;">Property Viewing Request</h3>';
      $message .= '<p style="color:#333;font-size:14px;"><b>Name :</b>'. $request->names.'<br><b>Email :</b>'.$request->email.'<br><b>Phone Number :</b>'.$request->phone_number.'<br><b>Property :</b>'.$property->product_name.'<br><b>View Date :</b>'.$request->view_date.'<br><b>View Time :</b>'.$request->view_time.'<br><b>Message</b><br>'.$request->message.'</p>';
      $message .= '</body></html>';
      $mail->Body  = $message;
      $mail->send();


      Session::flash('success','Thank you for contacting us');

      return redirect()->back();
   }

   public function inquiry(Request $request){
      $this->validate($request,[
         'name' => 'required',
         'email' => 'required',
         'message' => 'required',
         'subject' => 'required',
      ]);

      // $inquiry = new inquiry;
      // $inquiry->email = $request->email;
      // $inquiry->subject = $request->subject;
      // $inquiry->sent_from = $request->names;
      // $inquiry->message	 = $request->inquiry;
      // $inquiry->status	 = 'Sent';
      // $inquiry->save();

      //send email
      // /*======= send email ======*/
      $mail = new PHPMailer(true);
      $mail->SMTPDebug = 1;                                 // Set mailer to use SMTP
      $mail->Host = 'smtp.sendgrid.net';                    // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'notification@supremepowersystems.com';                          // SMTP username
      $mail->Password = 'NmV7QH9HBm3J';                     // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      //Recipients
      //$mail->setFrom('sales@rochman-properties.co.ke', 'Rochman Properties');
      $mail->setFrom('notification@rochman-properties.co.ke', 'Rochman Properties');
      // Add

      // //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Inquiry';

      $mail->addAddress('sales@rochman-properties.co.ke');

      //send email
      // Compose a simple HTML email message
      $message = '<html><body>';
      $message .= '<h3 style="color:#333;">Inquiry</h3>';
      $message .= '<p><b>Full Names:</b>'.$request->name.'<br><b>Email:</b>'.$request->email.'<br></p><h4>Inquiry</h4><p>'.$request->message.'</p><p>Phone Number:'.$request->phone_number.'</p>';
      $message .= '</body></html>';
      $mail->Body  = $message;
      $mail->send();

      Session::flash('success','Inquiry successfully sent.');

      return redirect()->back();

   }

   public function subscription(Request $request){
      $this->validate($request,[
         'email'      => 'required',
         'first_name' => 'required',
         'last_name'  => 'required',
         'phone_number'  => 'required',
      ]);

      // return dd($request);

      if(!Newsletter::isSubscribed($request->email) ) {
         Newsletter::subscribe($request->email);
         Newsletter::subscribe($request->email, ['FNAME'=>$request->first_name,'LNAME'=>$request->last_name,'EMAIL'=>$request->email,'PHONE'=>$request->phone_number]);
      }

      Session::flash('success','Thank for subscribing');

      return redirect()->back();
   }
}
