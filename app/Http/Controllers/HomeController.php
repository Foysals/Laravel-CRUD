<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userinfo;
class HomeController extends Controller
{

   // public function __construct()
    //{
      //  $this->middleware('auth');
    //}
    public function dash(){
        return view("dashboard.dash");
    }
    public function index()
    {
        $userinfo = Userinfo::latest()->get();
        return view("dashboard.alluser",compact('userinfo'));
    }
    public function adduser()
    {
        return view("dashboard.adduser");
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'number'=>'required',
            'address'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('image');
        $img_name = hexdec(uniqid()).'.'. $image ->getClientOriginalExtension();
        $request->image->move(public_path('upload'),$img_name);
        $img_url = 'upload/' . $img_name;

        Userinfo::insert([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'address' => $request->address,
            'image' =>  $img_url,
        ]);
        return redirect()->route('user')->with('message','User Information  added successfully!');
    }
    public function edit($id){
        $userinfo = Userinfo::findOrFail($id);
        return view("dashboard.edit", compact('userinfo'));
    }
    public function update(Request $request){
        $userid = $request->id;
         $request->validate([
            'name'=>'required',
            'email'=>'required',
            'number'=>'required',
            'address'=>'required',
        ]);
        Userinfo::findOrFail($userid)->update([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'address' => $request->address,
        ]);
    return redirect()->route('user')->with('message','User Infomation Updated Successfully!');

    }
    public function delete($id){
        Userinfo::findOrFail($id)->delete();
        return redirect()->route('user')->with('message','User Infomation delete successfully!');
       }
       public function trash()
       {
          $userinfo = Userinfo::onlyTrashed()->orderBy('id','DESC')->paginate(50);
           return view("dashboard.restore",['userinfo'=>$userinfo]);
       }
       public function restore($id)
       {
          $userinfo = Userinfo::withTrashed()->findOrFail($id);
          if(!empty($userinfo)){
            $userinfo->restore();
          }
        return redirect()->route('user')->with('message','User Infomation Restore successfully!');
          
       }
    public function deletePermanently($id){
        $userinfo = Userinfo::withTrashed()->findOrFail($id);
        if(!empty($userinfo)){
          $userinfo->forceDelete();
        }
        return redirect()->route('user')->with('message','User Infomation Permanently Delete successfully!');
    }

}