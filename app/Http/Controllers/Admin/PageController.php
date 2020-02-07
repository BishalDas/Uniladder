<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pages = Page::query();
        if($request->keyword){
            $like = '%'.$request->keyword.'%';
            $pages->where('title', 'like', $like);
        }

        if($request->filter){
            if($request->filter == 'main_menu'){
                $pages->where('position', 'like', '%2%')->orderBy('menu_order');
                // $pages->whereIN('position', array(1,3))->orderBy('menu_order');
            }else if($request->filter == 'footer'){
                $pages->where('position', 'like', '%3%')->orderBy('footer_order');
                // $pages->whereIN('position', array(2,3))->orderBy('footer_order');
            }else if($request->filter == 'top_menu'){
                $pages->where('position', 'like', '%1%')->orderBy('top_order');
                // $pages->whereIN('position', array(2,3))->orderBy('top_order');
            }else{
                $pages->where('parent_id', $request->filter)->orderBy('order_by');
            }
        }else{
            $pages->orderBy('parent_id')->orderBy('order_by');
        }
        
        // $pages = $pages->toSql();
        $pages = $pages->paginate(15);
        // dd($pages);
        $parents = Page::where('parent_id', 0)->get();
        return view('admin.page.index', compact('pages', 'parents'));

        $pages = Page::all();
        return view('admin.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Page::all();
        return view('admin.page.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'title' => 'required|unique:pages',
            // 'slug' => 'required|unique:pages',
            'details' => 'required',
            ]);

        $slug = $request->slug? $request->slug : $request->title;
        $slug = $slug == '/'? $slug : str_slug($slug);
        $slug = $slug == 'home' ? '/' : str_slug($slug);
        
        $page = new Page;
        $page->parent_id = $request->parent_id;
        $page->title = $request->title;
        $page->slug = $slug;
        $page->position = $request->position;
        $page->details = $request->details;
        $page->meta_title = $request->meta_title;
        $page->meta_keyword = $request->meta_keyword;
        $page->meta_description = $request->meta_description;

        if($request->parent_id){
            $page->order_by = Page::where('parent_id', $request->parent_id)->max('order_by');
        }

        // if(in_array(1, $page->position)){
        //     $page->menu_order = Page::where('position', 'like',  '%1%')->max('top_order');
        // }
        // if(in_array(2, $page->position)){
        //     $page->menu_order = Page::where('position', 'like',  '%2%')->max('menu_order');
        // }
        // if(in_array(3, $page->position)){
        //     $page->menu_order = Page::where('position', 'like',  '%3%')->max('footer_order');
        // }

        $page->status = $request->status?:0;

        if($page->save()){
            if ($request->hasFile('image')) {
                $image_name = $request->title .'.'.$request->image->extension();
                $path = $request->image->move('uploads/page/', $image_name);
                $page->image = $image_name;
                $page->save();
            }
        return redirect()->route('pages.index')->with('success', 'page added.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $parents = Page::all();
        return view('admin.page.edit', compact('parents', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        // dd($request);
        $this->validate($request, [
            'title' => 'required|unique:pages,title,' . $page->id,
            // 'slug' => 'required|unique:pages,slug,' . $page->id,
            'details' => 'required',
            ]);
        $slug = $request->slug? $request->slug : $request->title;
        $slug = $slug == '/'? $slug : str_slug($slug);
        
        $slug = $slug == 'home'? '/' : str_slug($slug);

        $page->parent_id = $request->parent_id;
        $page->title = $request->title;
        $page->slug = $slug;
        $page->position = $request->position;
        $page->details = $request->details;
        $page->meta_title = $request->meta_title;
        $page->meta_keyword = $request->meta_keyword;
        $page->meta_description = $request->meta_description;
        $page->status = $request->status?:0;        

        if($page->save()){
            if ($request->hasFile('image')) {
                if($page->image && file_exists(public_path('uploads/page/'.$page->image))){
                    unlink(public_path('uploads/page/'.$page->image));
                }
                $image_name = $page->slug . '-'.$page->id . '.'.$request->image->extension();
                $path = $request->image->move('uploads/page/', $image_name);
                $page->image = $image_name;
                $page->save();
            }
            return redirect()->route('pages.index')->with('success', 'Page saved.');     
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page = Page::find($page->id);
        if($page->image && file_exists(public_path('uploads/page/'.$page->image))){
            unlink(public_path('uploads/page/'.$page->image));
        }

        if($page && $page->delete()){
            return redirect()->route('pages.index')->with('success', 'page deleted.');
        }else{
            return redirect()->route('pages.index')->with('error', 'Error while deleting page.');
        }
    }

    public function showhide(Page $page)
    {
        if($page->status){
            $page->status = 0;
        }else{
            $page->status = 1;
        }
        $page->save();
        return redirect()->route('pages.index')->with('success', 'Status Updated.');        
    }

    public function order(Request $request)
    {
        if($request->order == 'top_menu'){
            $order = 'top_order';
        }elseif($request->order == 'main_menu'){
            $order = 'menu_order';
        }elseif($request->order == 'footer'){
            $order = 'footer_order';
        }else{
            $order = 'order_by';
        }

        foreach ($request->data as $odr => $id) {
            if($id){                
                $odr = $odr + 1;
                $slide = Page::find($id);
                $slide->{$order} = $odr;
                $slide->save();
            }
        }
    }

    public function deleteimage(Page $page)
    {
        if($page && $page->image)
        {
            if(file_exists(public_path('/uploads/page/'.$page->image)))
            {
                unlink(public_path('/uploads/page/'.$page->image));
            }
            $page->image = null;
            $page->save();
        }
        return redirect()->back()->with('success','Image Deleted');
    }
}
