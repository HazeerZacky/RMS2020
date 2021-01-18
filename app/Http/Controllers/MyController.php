<?php

namespace App\Http\Controllers;
//==========================================================    USE PART    ===============================
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\clas;
use App\Models\student;
use App\Models\User;
use App\Models\users;
//=========================================================================================================
class MyController extends Controller
{
//==========================================================    Navigation parts    =======================
public function HomePage(){
        return view('Dashboard');
    }
    
public function Contact(){
        return view('Pages.contact');
    }

    public function ClassForm(){
        $class = DB::table('clas')->get();  //Get All class table contants from class table(DB)
        return view('Pages.Class',compact('class'));  //send all class details to class page(class.blad.php)
    }

    public function UsersForm(){
        $users = DB::table('users')->get();  //Get All class table contants from class table(DB)
        return view('Pages.Users',compact('users'));  //send all class details to class page(class.blad.php)
    }
    
    public function StudentForm(){
        $student = DB::table('students')->get();  //Get All student table contants from student table(DB)
        $cls = DB::table('clas')->where('class_status','Active')->orderBy('class_name','asc')->get();
        return view('Pages.Student',compact('student','cls'));  //send all student details to student page(student.blad.php)
    }


//==========================================================================================================
//=============================================     Class Table Database Connections    ====================

    public function getclass(){
        $cs = DB::table('clas')->get();

        return view('viewclass',compact('cs'));
    }

    public function addclass(Request $req)
    {
        $req->validate([
            'CName'=>'required|min:4',
            'CType'=>'required',
            'CStatus'=>'required',
        ],[
            //Class name Add
            'CName.required'=>'Class Name is must',
            'CName.min'=>'Class Name Minimum 4 letters must',
            //Class Type Add
            'CType.required'=>'Please select Class Type',

             //Class Status Add
            'CStatus.required'=>'Please select Class Status',
        ]);

        $cnt = count(DB::table('clas')->get());
        
        $cls = new clas;
        $cls->class_name = $req->CName;
        $cls->class_type = $req->CType;
        $cls->class_status = $req->CStatus;
        

        $cls->save();

        $notification = array(
            'message' => 'Successfully Saved', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function editclass(Request $req) {

        $req->validate([
            'ECName'=>'required|min:4',
            'ECType'=>'required',
            
        ],[
            //Class name Add
            'ECName.required'=>'Class Name is must',
            'ECName.min'=>'Class Name Minimum 4 letters must',

            //Class Type Add
            'ECType.required'=>'Please select Class Type',
        ]);

        DB::table('clas')->where('id' , $req->ECId)->update([
            'class_name' => $req->ECName,
            'class_type' => $req->ECType,
        ]);

        $notification = array(
            'message' => 'Successfully Updated', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function deleteclass($i)  //passing variable
    {
        DB::table('clas')->where('id',$i)->delete();
        
        $notification = array(
            'message' => 'Successfully Deleted', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function changeclassstatus($id){  //STATUS BUTTON PART ================

        $status = DB::table('clas')->where('id',$id)->value('class_status');
        if($status ==  "Active"){
            DB::table('clas')->where('id',$id)->update([
                'class_status'=>'Deactive'
            ]);
        }else{
            DB::table('clas')->where('id',$id)->update([
                'class_status'=>'Active'
            ]);
        }
        return redirect()->back();
    }
//==========================================================================================================

//=============================================     User Table Database Connections    ====================
    public function getusers(){
        $us = DB::table('users')->get();

        return view('viewusers',compact('us'));
    }

    public function adduser(Request $req)  //Daa USER ======================
    {

        $req->validate([
            'UName'=>'required|min:8',
            'UEmail'=>'required|min:12',
            'UPassword'=>'required|min:8',
            'USubject'=>'required',
            'URole'=>'required',
            'UStatus'=>'required',
        ],[
            //User name Add
            'UName.required'=>'User Name is must',
            'UName.min'=>'User Name Minimum 8 letters must',
            //User Email Add
            'UEmail.required'=>'User E-mail is must',
            'UEmail.min'=>'User E-mail Minimum 12 letters must',
            //User Email Add
            'UPassword.required'=>'User Password is must',
            'UPassword.min'=>'User Name Password Minimum 8 letters must',
            //Class Type Add
            'USubject.required'=>'Please select a class',
            //Class Type Add
            'URole.required'=>'Please select a role',
             //Class Status Add
            'UStatus.required'=>'Please select a status',
        ]);

        $cnt = count(DB::table('users')->get());
        
        $use = new users;
        $use->name = $req->UName;
        $use->email = $req->UEmail;
        $use->password = $req->UPassword;
        $use->subject = $req->USubject;
        $use->role = $req->URole;
        $use->user_status = $req->UStatus;

        $use->save();

        $notification = array(
            'message' => 'Successfully Saved', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function edituser(Request $req) { //EDIT USER =======================

        $req->validate([
            'EUName'=>'required|min:8',
            'EUEmail'=>'required|min:12',
            'EUPassword'=>'required|min:8',
            'EUSubject'=>'required',
            'EURole'=>'required',
        ],[
            //User name Add
            'EUName.required'=>'User Name is must',
            'EUName.min'=>'User Name Minimum 8 letters must',
            //User Email Add
            'EUEmail.required'=>'User E-mail is must',
            'EUEmail.min'=>'User E-mail Minimum 12 letters must',
            //User Email Add
            'EUPassword.required'=>'User Password is must',
            'EUPassword.min'=>'User Name Password Minimum 8 letters must',
            //Class Type Add
            'EUSubject.required'=>'Please select a class',
            //Class Type Add
            'EURole.required'=>'Please select a role',
        ]);

        DB::table('users')->where('id' , $req->EUID)->update([
            'name' => $req->EUName,
            'email' => $req->EUEmail,
            'password' => $req->EUPassword,
            'subject' => $req->EUSubject,
            'role' => $req->EURole,
        ]);

        $notification = array(
            'message' => 'Successfully Updated', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function deleteuser($i)  //DELETE USER ==========================
    {
        DB::table('users')->where('id',$i)->delete();
        
        $notification = array(
            'message' => 'Successfully Deleted', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function changeusersstatus($id){  //STATUS BUTTON PART ================

        $status = DB::table('users')->where('id',$id)->value('user_status');
        if($status ==  "Active"){
            DB::table('users')->where('id',$id)->update([
                'user_status'=>'Deactive'
            ]);
        }else{
            DB::table('users')->where('id',$id)->update([
                'user_status'=>'Active'
            ]);
        }
        return redirect()->back();
    }
//==========================================================================================================
//=============================================     Student Table Database Connections    ====================
    public function getstudent(){
        $st = DB::table('students')->get();

        return view('viewstudent',compact('st'));
    }

//==========================================================================================================


}
