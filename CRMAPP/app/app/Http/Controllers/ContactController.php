<?php

namespace App\Http\Controllers;

use App\Exports\ContactExport;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{

    public function index(Request $request)
{
    $query = Contact::orderBy('id', 'DESC');

    if ($request->has('search')) {
        $searchTerm = $request->input('search');
        $query->where(function ($q) use ($searchTerm) {
            $q->where('contact_name', 'like', '%' . $searchTerm . '%')
              ->orWhere('company', 'like', '%' . $searchTerm . '%');
        });
    }

    $contact = $query->get();

    return view('contact.main', compact('contact'));
}
    public function create(){
        $contact_id = contact::all();
        return view('contact.create',['con'=>$contact_id]);
    }
    public function store(Request $request){

        $contact = new Contact();
        $contact->contact_name = request("contact_name");
        $contact->email= request("email");
        $contact->phone_num = request("phone_num");
        $contact->company = request("company");
        $contact->user_id= Auth::user()->id;
        $contact->save();

        $request->session()->flash('success','Employee added successfully');

        return redirect()->route('dashboard');
 }
 public function edit($id){
    $contact = Contact::findOrFail($id);
    return view('contact.edit',['contact'=>$contact]);

}

public function update($id, Request $request){
    $contact = Contact::find($id);
    $contact->contact_name = request("contact_name");
    $contact->email= request("email");
    $contact->phone_num = request("phone_num");
    $contact->company = request("company");
    $contact->user_id= Auth::user()->id;
    $contact->save();
    $request->session()->flash('success','Employee added successfully');

    return redirect()->route('dashboard',$contact->id);

}

public function destroy($id, Request $request){
  $contact = Contact::find($id);
  $contact->delete();

  return redirect()->route('dashboard');

}
public function export()
{
    return Excel::download(new ContactExport, 'contact.xlsx');
}
}
