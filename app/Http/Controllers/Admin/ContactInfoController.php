<?php

namespace App\Http\Controllers\Admin;


use App\ContactInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactinfos = ContactInfo::all();
        return view('admin.contactinfo.index', compact('contactinfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.contactinfo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'contact_person'=>'required|min:3',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $contactinfo = new ContactInfo();
        $contactinfo->name = $request->name;
        $contactinfo->contact_person=$request->contact_person;
        $contactinfo->email = $request->email;
        $contactinfo->address = $request->address;
        $contactinfo->phone = $request ->phone;
        $contactinfo->status=0;
        $contactinfo->save();

        return redirect()->route('contactinfos.index')->with('success', 'Contact Info added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function show(ContactInfo $contactInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactInfo $contactinfo)
    {

        return view('admin.contactinfo.edit', compact('contactinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactInfo $contactinfo)
    {
        $this->validate($request, [
            'name' => 'required',
            'contact_person'=>'required|min:3',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            ]);

        $contactinfo->name = $request->name;
        $contactinfo->contact_person=$request->contact_person;
        $contactinfo->email = $request->email;
        $contactinfo->address = $request->address;
        $contactinfo->phone = $request ->phone;

        $contactinfo->save();


        return redirect()->route('contactinfos.index')->with('success', 'Contact Info saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactInfo $contactinfo)
    {
        if($contactinfo && $contactinfo->delete()){
            return redirect()->route('contactinfos.index')->with('success', 'Contact Info deleted.');
        }else{
            return redirect()->route('contactinfos.index')->with('error', 'Error while deleting Contact Info.');
        }
    }
}
