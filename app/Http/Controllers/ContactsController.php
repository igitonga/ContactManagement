<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Contact;
use App\Models\Group;
use DB;

class ContactsController extends Controller
{
    public function create(Request $request){
        try{
            DB::beginTransaction();

            $contact = new Contact;
            $contact->first_name = $request->firstName;
            $contact->last_name = $request->lastName;
            $contact->phone_number = $request->phoneNumber;
            $contact->email = $request->email;
            $contact->group_id = $request->group;
            $contact->save();

            DB::commit();
            toastr()->success('Contact has been added');

            return \redirect()->back();
        }
        catch(Exception $e){
            toastr()->error($e->getMessage());
            return \redirect()->back();
        }
    }

    public function edit(Request $request){
        try{
            DB::beginTransaction();

            $contact = Contact::find($request->id);
            $contact->first_name = $request->firstName;
            $contact->last_name = $request->lastName;
            $contact->phone_number = $request->phoneNumber;
            $contact->email = $request->email;
            $contact->group_id = $request->group;
            $contact->save();

            DB::commit();
            toastr()->success('Contact has been edited');

            return \redirect('/');
        }
        catch(Exception $e){
            toastr()->error($e->getMessage());
            return \redirect()->back();
        }
    }

    public function delete($id){
        try{
            $contact = Contact::find($id);
            $contact->delete();

            toastr()->success('Contact has been deleted');

            return \redirect()->back();
        }
        catch(Exception $e){
            toastr()->error($e->getMessage());
            return \redirect()->back();
        }
    }

    public function getAll(){
        $contacts = Contact::with('group')->latest()->get();
        $groups = Group::latest()->get();

        // Contacts count in each group
        foreach($groups as $group){
            $group->contacts_count = $group->contactsCount();
            $group->save();
        }

        return view('welcome', compact('contacts','groups'));
    }

    public function view($id){
        $details = Contact::find($id);
        $groups = Group::latest()->get();

        return view('edit_contact', compact('details','groups'));
    }
}
