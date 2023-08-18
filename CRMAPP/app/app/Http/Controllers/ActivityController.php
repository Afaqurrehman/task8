<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Contact;
class ActivityController extends Controller
{
    public function index(){

        $activity = Activity::orderBy('id','DESC')->get();
       return view('activity.index',['activity'=> $activity]);
    }

    public function create(){
        $contact = Contact::orderBy('id','DESC')->get();
        return view('activity.create',['contact'=>$contact]);
    }

    public function store(Request $request){

        $activity = new Activity();
        $activity->type = request("type");
        $activity->description =  request("description");
        $activity->contact_id = request("contact_id");
        $activity->save();

        $request->session()->flash('success','Employee added successfully');

        return redirect()->route('activity.index');



    }
    public function edit($id){
        $contact = Contact::orderBy('id','DESC')->get();
        $activity= Activity::findOrFail($id);
        return view('activity.edit',['activity'=>$activity,'contact'=>$contact]);
    }

    public function update($id, Request $request){
        $activity = Activity::find($id);
        $activity->type = request("type");
        $activity->description =  request("description");
        $activity->save();

        $request->session()->flash('success','Employee added successfully');

        return redirect()->route('activity.index',$activity->id);

    }

    public function destroy($id, Request $request){
      $activity = Activity::find($id);
      $activity->delete();

      return redirect()->route('activity.index');

    }
}
