<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Slide;
use App\Review;
use App\Country;
use App\Album;
use App\Photo;
use App\Video;
use Mail;
use App\Mail\ContactForm;
use App\Mail\Inquiry;

class PageController extends Controller
{
    public function home()
    {
        $page = Page::find(1);
        if(!$page){
            $page = Page::where('slug', '/')->first();
        }
        $data['page'] = $page;
        $data['slides'] = Slide::orderBy('order_by')->active()->get();
        $data['countries'] = Country::all();
        $data['reviews'] = Review::where('status',1)->latest()->get();
        $data['notice'] = Page::where('parent_id', 19)->latest()->active()->first();
        $data['services'] = Page::where('parent_id', 8)->orderBy('order_by')->get();
        return view('index', $data);
    }

    public function index(Request $request)
    {
        if($request->isMethod('post')){
            $this->validate($request,[
                'name' => 'required',
                'email' => 'required',
                'image' => 'mimes:png,jpeg,jpg',
                'review' => 'required',
            ]);

            $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'details' => $request->review,
            );

            if($review = Review::create($data))
            {
                if($request->hasFile('image'))
                {
                    $image_name = 'review-'.$review->id . '.'.$request->image->extension();
                    $path = $request->image->move('uploads/review/',$image_name);
                    $review->image = $image_name;
                    $review->save();
                }
                return redirect()->route('thankyou');
            }
            
        }
        $data['reviews'] = Review::where('status',1)->latest()->paginate(5);
        $data['page'] = $page =  Page::where('slug',$request->path())->first();   
        return view('page', $data);
    }

    public function contact(Request $request)
    {
        if($request->isMethod('post')){
            $this->validate($request,[
                'name' => 'required',
                'email' => 'required',
                'message' => 'required',
                'phone' => 'required',
                'captcha' => 'required',
            ]);
            if(\Session::get('rand_pass') <> $request->captcha){
                return redirect()->back()->withErrors(['captcha' => 'Invalid Cpatcha'])->withInput();
            }
            Mail::send(new ContactForm($request));
            return redirect()->route('thankyou');
        }
        $data['page'] = $page =  Page::where('slug',$request->path())->first();        
        return view('contact', $data);
    }

    public function services(Request $request)
    {
        $data['page'] = $page =  Page::where('slug',$request->path())->first();
        $data['services'] = Page::where('parent_id', 8)->get();
        return view('services.index', $data);
    }

    public function studyabroad(Request $request)
    {
        $data['page'] = $page =  Page::where('slug',$request->path())->first();
        return view('services.studyabroad', $data);
    }

    public function studyplace($slug)
    {
        dd($slug);
    }

    public function entrancepreparation(Request $request)
    {
        $data['page'] = $page =  Page::where('slug',$request->path())->first();
        return view('services.entrancepreparation', $data);
    }

    public function testpreparation(Request $request)
    {
        $data['page'] = $page =  Page::where('slug',$request->path())->first();
        return view('services.testpreparation', $data);
    }

    public function openbankaccount(Request $request)
    {
        $data['page'] = $page =  Page::where('slug',$request->path())->first();
        return view('services.openbankaccount', $data);
    }

    public function universities(Request $request)
    {
        $data['page'] = $page =  Page::where('slug',$request->path())->first();
        $data['universities'] = Page::where('parent_id', 50)->get();
        return view('universities.index', $data);
    }

    public function donate()
    {
        return view('donate');
    }

    public function space_register(Request $request)
    {
        $register = new Register;
        $register->first_name = $request->first_name; 
        $register->last_name = $request->last_name; 
        $register->email = $request->email;
        $register->phone = $request->phone;
        $register->message = $request->message;
        $register->save();
        Mail::send(new SpaceRegister($register));
        return redirect()->route('thankyou', ['register'=>1]);
    }

    public function inquiry(Request $request)
    {
        $this->validate($request,[
            'captcha' => 'required',
        ]);
        if(\Session::get('rand_pass') <> $request->captcha){
            return redirect()->back()->withErrors(['captcha' => 'Invalid Cpatcha'])->withInput();
        }
        Mail::send(new Inquiry($request));
        return redirect()->route('thankyou');
    }

    public function thankyou()
    {
        return view('thankyou');
    }
    public function writereview()
    {
        $data['title'] = 'Write Review';
        return view('write-review', $data);
    }

    public function savereview(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'name' => 'required',
            'image' => 'mimes:jpeg,png,jpg',
            'review'=> 'required',
            'captcha' => 'required',

        ]);
        if(\Session::get('rand_pass') <> $request->captcha){
            return redirect()->back()->withErrors(['captcha' => 'Invalid Cpatcha'])->withInput();
        }

        $review = new Review;
        $review->title = $request->title;
        $review->name = $request->name;
        $review->email= $request->email;
        $review->details= $request->review;
        if($request->hasFile('image'))
        {
            $image_name = 'review-'.$review->id . '.'.$request->image->extension();
            $path = $request->image->move('uploads/review/',$image_name);
            $review->image = $image_name;
            $review->save();
        }
        $review->save();

        return redirect('thankyoureview');
    }
    public function thankyoureview()
    {
        return view('thankyoureview');
    }
    public function photoAlbum(Request $request)
    {
        $data['page'] = $page =  Page::where('slug',$request->path())->first();
        $data['albums'] = Album::all();
        return view('gallery.gallery_photo',$data);
    }

    public function album($id)
    {
        $data['album'] = Album::find($id);
        $data['photos'] = Photo::where('album_id', $id)->paginate(10);
        return view('gallery.gallery_single', $data);
    }
    public function galleryvideo(Request $request)
    {
        $data['page'] = $page =  Page::where('slug',$request->path())->first();
        $data['videos'] = Video::all();
        return view('gallery.gallery_video',$data);
    }
}
