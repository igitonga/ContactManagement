<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use DB;

class GroupController extends Controller
{
    public function create(Request $request){
        try{
            DB::beginTransaction();

            $group = new Group;
            $group->name = $request->name;
            $group->save();

            DB::commit();
            toastr()->success('Group has been added');

            return \redirect()->back();
        }
        catch(Exception $e){
            toastr()->error($e->getMessage());
            return \redirect()->back();
        }
    }

    public function edit(Request $request, $id){
        try{
            DB::beginTransaction();

            $group = Group::find($id);
            $group->name = $request->name;
            $group->save();

            DB::commit();
            toastr()->success('Group has been edited');

            return \redirect()->back();
        }
        catch(Exception $e){
            toastr()->error($e->getMessage());
            return \redirect()->back();
        }
    }

    public function delete($id){
        try{
            $group = Group::find($id);
            $group->delete();

            toastr()->success('Group has been deleted');

            return \redirect()->back();
        }
        catch(Exception $e){
            toastr()->error($e->getMessage());
            return \redirect()->back();
        }
    }

    public function getAll(){
        $groups = Group::latest()->get();

        return view('welcome', compact('groups'));
    }
}
