<?php

namespace App\Http\Controllers;
//==========================================================    USE PART    ===============================
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\clas;
use App\Models\students;
use App\Models\subjects;
use App\Models\User;
use App\Models\users;
use App\Models\teaching;
use App\Models\result;
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

    public function Subjectform(){
        $subject = DB::table('subjects')->get();  //Get All class table contants from subject table(DB)
        return view('Pages.Subject',compact('subject'));  //send all class details to subject page(class.blad.php)
    }


    public function UsersForm(){
        $users = DB::table('users')->get();  //Get All class table contants from class table(DB)
        return view('Pages.Users',compact('users'));  //send all class details to class page(class.blad.php)
    }
    
    public function StudentForm(){
        $students = DB::table('students')->get();  //Get All student table contants from student table(DB)
        $cls = DB::table('clas')->where('class_status','Active')->orderBy('class_name','asc')->get();
<<<<<<< Updated upstream
        return view('Pages.Student',compact('students','cls'));  //send all student details to student page(student.blad.php)
=======
        return view('Pages.Student',compact('students','cls','user'));  //send all student details to student page(student.blad.php)
    }

    public function EnterResults($id){
        $user = DB::table('users')->where('id',$id)->first();
        $cs = DB::table('teachings')->where('trid',$id)->get();
        return view('Pages.EnterResults',compact('user','cs'));
    }

    public function TeachersReport($id){
        $user = DB::table('users')->where('id',$id)->first();
        $cs = DB::table('teachings')->where('trid',$id)->get();
        return view('Pages.TeachersReport',compact('user','cs'));
    }

    public function TeachersProfile($id){
        $teach = DB::table('teachings')->where('trid',$id)->get();
        $cls = DB::table('clas')->where('class_status','Active')->orderBy('class_name','asc')->get();
        $user = DB::table('users')->where('id',$id)->first();
        return view('Pages.TeachersProfile',compact('user','cls','teach'));
    }

    public function select(Request $req){
        $ts = new teaching;
        $ts->trid = $req->id;
        $ts->classname = $req->cls;
        $ts->save();
        return redirect()->route('Dashboard/TeachersProfile',['c'=>$req->id]);
>>>>>>> Stashed changes
    }
//=========================================================================================================

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

//=============================================     Users Table Database Connections    ====================
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
            //User Password Add
            'UPassword.required'=>'User Password is must',
            'UPassword.min'=>'User Name Password Minimum 8 letters must',
            //User Subject Add
            'USubject.required'=>'Please select a class',
            //User Role Add
            'URole.required'=>'Please select a role',
             //User Status Add
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
            //User Password Add
            'EUPassword.required'=>'User Password is must',
            'EUPassword.min'=>'User Name Password Minimum 8 letters must',
            //User Subject Add
            'EUSubject.required'=>'Please select a class',
            //User Role Add
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

    public function addstudent(Request $req)  //Daa USER ======================
    {

        $cnt = count(DB::table('students')->get());
        
        $stu = new students;
        $stu->index_no = $req->SIndexNo;
        $stu->student_name = $req->SName;
        $stu->gender = $req->SGender;
        $stu->dob = $req->SDOB;
        $stu->student_status = $req->SStatus;
        $stu->class_name = $req->SCName;



        $stu->save();

        $notification = array(
            'message' => 'Successfully Saved', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function editstudent(Request $req) { //EDIT USER =======================

       

        DB::table('students')->where('index_no' , $req->ESIndexNo)->update([
            'student_name' => $req->ESName,
            'gender' => $req->ESGender,
            'dob' => $req->ESDOB,
            'class_name' => $req->ESCName,
            
        ]);

        $notification = array(
            'message' => 'Successfully Updated', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function deletestudent($i)  //DELETE USER ==========================
    {
        DB::table('students')->where('index_no',$i)->delete();
        
        $notification = array(
            'message' => 'Successfully Deleted', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function changestudentstatus($index_no){  //STATUS BUTTON PART ================

        $status = DB::table('students')->where('index_no',$index_no)->value('student_status');
        if($status ==  "Active"){
            DB::table('students')->where('index_no',$index_no)->update([
                'student_status'=>'Deactive'
            ]);
        }else{
            DB::table('students')->where('index_no',$index_no)->update([
                'student_status'=>'Active'
            ]);
        }
        return redirect()->back();
    }
//==========================================================================================================
//===========================class subject==========================================================
public function getSubject(){
    $su = DB::table('subjects')->get();

    return view('viewsubject',compact('su'));
}

public function addsubject(Request $req)
{


    $cnt = count(DB::table('subjects')->get());
    
    $sub = new subjects;
    $sub->subjectname = $req->SName;
    $sub->subjectstatus = $req->SStatus;
    

    $sub->save();

    $notification = array(
        'message' => 'Successfully Saved', 
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
}



<<<<<<< Updated upstream
=======
        $status = DB::table('subjects')->where('id',$id)->value('subjectstatus');
        if($status ==  "Active"){
            DB::table('subjects')->where('id',$id)->update([
                'subjectstatus'=>'Deactive'
            ]);
        }else{
            DB::table('subjects')->where('id',$id)->update([
                'subjectstatus'=>'Active'
            ]);
        }
        return redirect()->back();
    }
//==========================================================================================================
//Afrid

public function delclass($id){
    DB::table('teachings')->where('id',$id)->delete();

    return redirect()->back();
}

public function search(Request $req){
    $user = DB::table('users')->where('id',$req->id)->first();
    $st = DB::table('students')->where('class_name',$req->search)->get();
    
    return redirect()->route('Dashboard/EnterResults',['c'=>$req->id])->with('st',$st)->with('class',$req->search);
}
public function addresult(Request $req){
   $a = implode($req->list);
   $a = explode(',',$a);

   for($i = 0; $i < count($a); $i++){
       $re = new result;
       $re->trname = $req->name;
       $re->year = $req->year;
       $re->class = $req->class;
       $re->term = $req->term;
       $re->subject = $req->subject;
       $re->index = $a[$i];
       $re->result = $a[$i+1];
       $re->save();
    $i++;
    
       
   }
  return redirect()->back();
   
}
public function searchsubj(Request $req){
    $result = DB::table('results')->where('trname',$req->name)->where('class',$req->search)->where('subject',$req->subject)->get();
    return redirect()->back()->with('result',$result)->with('class',$req->search);
}
>>>>>>> Stashed changes

}
