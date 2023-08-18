<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Contact;

class TagController extends Controller
{
    public function index(){
        $tag = Tag::orderBy('id','DESC')->get();
       return view('tag.index',['tag'=> $tag]);
    }

    public function create(){
        $contact = Contact::orderBy('id','DESC')->get();
        return view('tag.create',['contact'=>$contact]);
    }

    public function store(Request $request){

        $tag = new Tag();
        $tag->tag_name = request("tag_name");
        $tag->contact_id = request('contact_id');
        $tag->save();

        $request->session()->flash('success','tag added successfully');

        return redirect()->route('tag.index');



    }
}
