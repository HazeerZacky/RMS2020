<?php

namespace App\Http\Controllers;
//==========================================================    USE PART    ===============================
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\clas;
use App\Models\students;
use App\Models\subjects;
use App\Models\User;
use App\Models\users;
use App\Models\teaching;
use App\Models\result;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Dompdf\Adapter\PDFLib;
use PDF;
//=========================================================================================================
class MyController extends Controller
{
//==========================================================    Navigation parts Start   =======================
    // =============HOME PAGE FUNCTIONS================
        public function HomePage(){ //Home Page 
            return view('HomePage');
        }
        public function Dashboard($id){  //Dashboard
            $a = session()->getId(); 
            if(session()->get('session') != $a ){
                return redirect('/login')->with('msg','Login First');
            }
            $user = DB::table('users')->where('id',$id)->first();
            if($user->role == "Admin"){
                $cls = DB::table('clas')->where('class_status','Active')->orderBy('class_name','asc')->get();
                $subj = DB::table('subjects')->where('subjectstatus','Active')->get();
                return view('Dashboard',compact('user','cls','subj'));
            }
            return view('Dashboard',compact('user'));
        }
        public function login(){  //Login Page
            if(session()->get('session') == session()->getId()){
                return redirect()->route('Dashboard',session()->get('userid'));
                }
            session()->regenerate();
            return view('login');
        }
        public function Results(){  //Results Page
            return view('Results');
        }
        public function log(Request $req) { //Login Function
            $user = DB::table('users')->where('email',$req->email)->first();
            if($user){
                if(Hash::check($req->pw ,$user->password )){
                    session()->regenerate();
                    $sid = session()->getId();
                    session(['session'=>$sid]);
                    session(['userid'=>$user->id]);
                    return redirect()->route('Dashboard',['c'=>$user->id]);
                }   else{
                        $notification = array(
                            'message' =>'Password wrong', 
                            'alert-type' => 'warning'
                    );
                    return redirect()->back()->with($notification);
                }
            }   else{
                    $notification = array(
                        'message' =>'User does not exist', 
                        'alert-type' => 'warning'
                );
                return redirect()->back()->with($notification);
            }
        }
        public function Contact($id){  //Contact Page
            $a = session()->getId();       
                if(session()->get('session') != $a ){
                    return redirect('/login')->with('msg','Login First');
                }
            $user = DB::table('users')->where('id',$id)->first();
                return view('Pages.contact',compact('user'));              
        }
        public function ClassForm($id){  //Class Page

            $a = session()->getId();
                if(session()->get('session') != $a ){
                    return redirect('/login')->with('msg','Login First');
                }
            $user = DB::table('users')->where('id',$id)->first();
            $class = DB::table('clas')->get();  //Get All class table contants from class table(DB)
            return view('Pages.Class',compact('class','user'));  //send all class details to class page(class.blad.php)
        }
        public function Subjectform($id){  //Subject Page
            $a = session()->getId();
                
            if(session()->get('session') != $a ){
                return redirect('/login')->with('msg','Login First');
            }

            $user = DB::table('users')->where('id',$id)->first();
            $subject = DB::table('subjects')->get();  //Get All class table contants from subject table(DB)
            return view('Pages.Subject',compact('subject','user'));  //send all class details to subject page(class.blad.php)
        }
        public function UsersForm($id){  //User Page

            $a = session()->getId();
                
                if(session()->get('session') != $a ){
                    return redirect('/login')->with('msg','Login First');
                }
    
                $user = DB::table('users')->where('id',$id)->first();
                $users = DB::table('users')->get();  //Get All class table contants from class table(DB)
                $subj = DB::table('subjects')->where('subjectstatus','Active')->orderBy('subjectname','asc')->get();
                return view('Pages.Users',compact('users','subj','user'));  //send all class details to class page(class.blad.php)
        }
        public function StudentForm($id){  //Student Page

            $a = session()->getId();
                
                if(session()->get('session') != $a ){
                    return redirect('/login')->with('msg','Login First');
                }
    
            $user = DB::table('users')->where('id',$id)->first();
            $students = DB::table('students')->get();  //Get All student table contants from student table(DB)
            $cls = DB::table('clas')->where('class_status','Active')->orderBy('class_name','asc')->get();
    
            return view('Pages.Student',compact('students','cls','user'));  //send all student details to student page(student.blad.php)
        }
        public function EnterResults($id){  //Enter Results page

            $a = session()->getId();
                
                if(session()->get('session') != $a ){
                    return redirect('/login')->with('msg','Login First');
                }
    
            $user = DB::table('users')->where('id',$id)->first();
    
            $cs = DB::table('teachings')->where('trid',$id)->get();
            return view('Pages.EnterResults',compact('user','cs'));
        }
        public function TeachersReport($id){  //Teacher Report Page
            $a = session()->getId();
                
                if(session()->get('session') != $a ){
                    return redirect('/login')->with('msg','Login First');
                }
    
            $user = DB::table('users')->where('id',$id)->first();
    
            $cs = DB::table('teachings')->where('trid',$id)->get();
            return view('Pages.TeachersReport',compact('user','cs'));
        }
        public function TeachersProfile($id){  //Teacher Profile Page

            $a = session()->getId();
                
                if(session()->get('session') != $a ){
                    return redirect('/login')->with('msg','Login First');
                }
    
            $teach = DB::table('teachings')->where('trid',$id)->get();
            $cls = DB::table('clas')->where('class_status','Active')->orderBy('class_name','asc')->get();
            $user = DB::table('users')->where('id',$id)->first();
            return view('Pages.TeachersProfile',compact('user','cls','teach'));
        }
    //==========================================
//==========================================================    Navigation parts End    =======================

//=========================================================================================================

//==========================================================================================================
//=============================================     Class Table Database Connections    ====================

    public function getclass(){
        $a = session()->getId();
            
            if(session()->get('session') != $a ){
                return redirect('/login')->with('msg','Login First');
            }

        $cs = DB::table('clas')->get();

        return view('viewclass',compact('cs'));
    }

    public function addclass(Request $req)
    {
        $a = session()->getId();
            
            if(session()->get('session') != $a ){
                return redirect('/login')->with('msg','Login First');
            }

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

        $a = session()->getId();
            
            if(session()->get('session') != $a ){
                return redirect('/login')->with('msg','Login First');
            }

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
        $a = session()->getId();
            
            if(session()->get('session') != $a ){
                return redirect('/login')->with('msg','Login First');
            }
        DB::table('clas')->where('id',$i)->delete();
        
        $notification = array(
            'message' => 'Successfully Deleted', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function changeclassstatus($id){  //STATUS BUTTON PART ================

        $a = session()->getId();
            
            if(session()->get('session') != $a )
            {
                return redirect('/login')->with('msg','Login First');
            }

        $status = DB::table('clas')->where('id',$id)->value('class_status');
        if($status ==  "Active"){
            DB::table('clas')->where('id',$id)->update([
                'class_status'=>'Deactive'
            ]);
        }
        else
        {
            DB::table('clas')->where('id',$id)->update([
                'class_status'=>'Active'
            ]);
        }
        return redirect()->back();
    }
//==========================================================================================================

//=============================================     Users Table Database Connections    ====================
    public function getusers(){
        $a = session()->getId();
            
            if(session()->get('session') != $a )
            {
                return redirect('/login')->with('msg','Login First');
            }

        $us = DB::table('users')->get();

        return view('viewusers',compact('us'));
    }

    public function adduser(Request $req){  //Daa USER ======================
        $a = session()->getId();
            
            if(session()->get('session') != $a )
            {
                return redirect('/login')->with('msg','Login First');
            }

        $req->validate([
            'UName'=>'required',
            'UEmail'=>'required|min:11',
            'UPassword'=>'required|min:8',
            'USubject'=>'required', //Nullable
            'URole'=>'required',
            'UStatus'=>'required',
        ],[
            //User name Add
            'UName.required'=>'User Name is must',
            //User Email Add
            'UEmail.required'=>'User E-mail is must',
            'UEmail.min'=>'User E-mail Minimum 12 letters must',
            //User Password Add
            'UPassword.required'=>'User Password is must',
            'UPassword.min'=>'User Name Password Minimum 8 letters must',
            //User Subject Add
            // 'USubject.required'=>'Please select a class', NULLable
            //User Role Add
            'URole.required'=>'Please select a role',
             //User Status Add
            'UStatus.required'=>'Please select a status',
        ]);

        $cnt = count(DB::table('users')->get());
        
        $use = new users;
        $use->name = $req->UName;
        $use->email = $req->UEmail;
        $use->password = Hash::make($req->UPassword);
        $use->subjectname = $req->USubject;
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

        $a = session()->getId();
            
            if(session()->get('session') != $a ){
                return redirect('/login')->with('msg','Login First');
            }

        $req->validate([
            'EUName'=>'required',
            'EUEmail'=>'required|min:12',
            'EUPassword'=>'required|min:8',
            'EUSubject'=>'required',
            'EURole'=>'required',
        ],[
            //User name Add
            'EUName.required'=>'User Name is must',
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
            'subjectname' => $req->EUSubject,
            'role' => $req->EURole,
        ]);

        $notification = array(
            'message' => 'Successfully Updated', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function deleteuser($i){  //DELETE USER ==========================

        $a = session()->getId();
            
            if(session()->get('session') != $a ){
                return redirect('/login')->with('msg','Login First');
            }
        DB::table('users')->where('id',$i)->delete();
        
        $notification = array(
            'message' => 'Successfully Deleted', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function changeusersstatus($id){  //STATUS BUTTON PART ================

        $a = session()->getId();
            
            if(session()->get('session') != $a ){
                return redirect('/login')->with('msg','Login First');
            }

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

        $a = session()->getId();
            
            if(session()->get('session') != $a ){
                return redirect('/login')->with('msg','Login First');
            }
        $st = DB::table('students')->get();
        return view('viewstudent',compact('st'));
    }

    public function addstudent(Request $req){  //Daa USER ======================
        $a = session()->getId();
            
            if(session()->get('session') != $a ){
                return redirect('/login')->with('msg','Login First');
            }
        $req->validate([
            'SIndexNo'=>'required|digits:5',
            'SName'=>'required',
            'SGender'=>'required',
            'SDOB'=>'required',
            'SStatus'=>'required',
            'SCName'=>'required',
        ],[
            //Student  name Add
            'SIndexNo.required'=>'Index Number is must',
            'SIndexNo.digits'=>'Index Number size 5',
            // 'SIndexNo.digits'=>'Enter numeric Index Number',
            'SIndexNo.unique'=>'Index Number not unique',
            
            //Student name Add
            'SName.required'=>'Student name is must',

             //Student gender Add
            'SGender.required'=>'Please select Student Gender',
             //Student DOB Add
            'SDOB.required'=>'Please select Student Date of birth',
             //Student Status Add
            'SStatus.required'=>'Please select Student Status',
             //Student Class name Add
            'SCName.required'=>'Please select Student Class name',
        ]);

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

    public function editstudent(Request $req){ //EDIT USER =======================

        $a = session()->getId();
            
            if(session()->get('session') != $a ){
                return redirect('/login')->with('msg','Login First');
            }

        $req->validate([
            'ESIndexNo'=>'numeric|required|digits:5',
            'ESName'=>'required|min:12',
            'ESGender'=>'required',
            'ESDOB'=>'required',
            'ESCName'=>'required',
        ],[
            //Student  name Add
            'ESIndexNo.required'=>'Index Number is must',
            'ESIndexNo.digits:5'=>'Index Number size 5',
            //Student name Add
            'ESName.required'=>'Student name is must',
            'ESName.min'=>'Student name is minimum 12 leters',

             //Student gender Add
            'ESGender.required'=>'Please select Student Gender',
             //Student DOB Add
            'ESDOB.required'=>'Please select Student Date of birth',
             //Student Class name Add
            'ESCName.required'=>'Please select Student Class name',
        ]);

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

    public function deletestudent($i){  //DELETE USER ==========================
    
        $a = session()->getId();
            
            if(session()->get('session') != $a ){
                return redirect('/login')->with('msg','Login First');
            }
        DB::table('students')->where('index_no',$i)->delete();
        
        $notification = array(
            'message' => 'Successfully Deleted', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function changestudentstatus($index_no){  //STATUS BUTTON PART ================

        $a = session()->getId();
            
            if(session()->get('session') != $a ){
                return redirect('/login')->with('msg','Login First');
            }

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
//=============================================     Subject Table Database Connections    ====================
    public function getSubject(){

        $a = session()->getId();
            
            if(session()->get('session') != $a )
            {
                return redirect('/login')->with('msg','Login First');
            }
        $su = DB::table('subjects')->get();

        return view('viewsubject',compact('su'));
    }

    public function addsubject(Request $req){
    
        $a = session()->getId();
            
            if(session()->get('session') != $a ){
                return redirect('/login')->with('msg','Login First');
            }

        $req->validate([
            'SName'=>'required|min:3',
            'SStatus'=>'required',
        ],[
            //Student name Add
            'SName.required'=>'Subject name is must',
            'SName.min'=>'Subject name is minimum 3 leters',
             //Student Status Add
            'SStatus.required'=>'Please select Subject Status',
        ]);

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

    public function editsubject(Request $req){
    
        $a = session()->getId();
            
            if(session()->get('session') != $a ){
                return redirect('/login')->with('msg','Login First');
            }
    
        $req->validate([
            'ESName'=>'required|min:3',
        ],[
            //Student name Add
            'ESName.required'=>'Subject name is must',
            'ESName.min'=>'Subject name is minimum 3 leters',
        ]);
    
        DB::table('subjects')->where('id' , $req->ESId)->update([
            'subjectname' => $req->ESName,
            
        ]);

        $notification = array(
            'message' => 'Successfully Updated', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function deletesubject($i){  //passing variable
    
        $a = session()->getId();
            
            if(session()->get('session') != $a )
            {
                return redirect('/login')->with('msg','Login First');
            }
        DB::table('subjects')->where('id',$i)->delete();
        
        $notification = array(
            'message' => 'Successfully Deleted', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function changesubjectsstatus($id){  //STATUS BUTTON PART ================

        $a = session()->getId();
            
            if(session()->get('session') != $a )
            {
                return redirect('/login')->with('msg','Login First');
            }

        $status = DB::table('subjects')->where('id',$id)->value('subjectstatus');
        if($status ==  "Active")
        {
            DB::table('subjects')->where('id',$id)->update([
                'subjectstatus'=>'Deactive'
            ]);
        }
        else
        {
            DB::table('subjects')->where('id',$id)->update([
                'subjectstatus'=>'Active'
            ]);
        }
        return redirect()->back();
    }
//==========================================================================================================

//==========================================================================================================

//=============================================     Main Functions Part    =================================

    public function select(Request $req){  //Teacher Profile Select Class Part

        $a = session()->getId();
            
            if(session()->get('session') != $a ){
                return redirect('/login')->with('msg','Login First');
            }

            $req->validate([
                'cls'=>'required',
                
            ],[

                //Class Type Add
                'cls.required'=>'Please select a Class',
            ]);

            $ts = new teaching;
            $ts->trid = $req->id;
            $ts->classname = $req->cls;
            $ts->save();

        $notification = array
        (
            'message' => 'Successfully Added', 
            'alert-type' => 'success'
        );
        return redirect()->route('Dashboard/TeachersProfile',['c'=>$req->id])->with($notification);
    }

    public function delclass($id){ //Teacher Profile Delete Class Part

        $a = session()->getId();
            if(session()->get('session') != $a )
            {
                return redirect('/login')->with('msg','Login First');
            }
        DB::table('teachings')->where('id',$id)->delete();

        $notification = array
        (
            'message' => 'Successfully Delete', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function search(Request $req){ //Enter Results Search Student Part

        $a = session()->getId();
            if(session()->get('session') != $a )
            {
                return redirect('/login')->with('msg','Login First');
            }

            $req->validate([
                'search'=>'required',
                
            ],[

                //Class Type Add
                'search.required'=>'Please select a Class',
            ]);

        $user = DB::table('users')->where('id',$req->id)->first();
        $st = DB::table('students')->where('class_name',$req->search)->get();

        
        return redirect()->route('Dashboard/EnterResults',['c'=>$req->id])->with('st',$st)->with('class',$req->search);
    }

    public function addresult(Request $req){ //Enter Results Results saving Part
        $a = session()->getId();
                if(session()->get('session') != $a )
                {
                    return redirect('/login')->with('msg','Login First');
                }
        $a = implode($req->list);
        $a = explode(',',$a);

        $req->validate([
            'year'=>'required',
            'term'=>'required',            
        ],[

            'year.required'=>'Please select a year',
            'term.required'=>'Please select a tearm',
        ]);

        for($i = 0; $i < count($a); $i++)
            {
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
        $notification = array
        (
            'message' => 'Successfully Saved', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    
    }
    
    public function searchsubj(Request $req){ //Teacher Report Search Marks Part
        $a = session()->getId();
                if(session()->get('session') != $a )
                {
                    return redirect('/login')->with('msg','Login First');
                }
        $result = DB::table('results')->where('trname',$req->name)->where('class',$req->class)->where('year',$req->year)->where('subject',$req->subject)->where('term',$req->term)->get();
        return redirect()->back()->with('result',$result)->with('class',$req->class)->with('term',$req->term)->with('year',$req->year);
    }

    public function stresult(Request $req){ //Student Viwe Marks Part
        // $a = session()->getId();
                
        //         if(session()->get('session') != $a ){
        //             return redirect('/login')->with('msg','Login First');
        //         }

   $a = session()->getId();
                if(session()->get('session') != $a )
                {
                    return redirect('/login')->with('msg','Login First');
                }
    $cs = DB::table('students')->where('index_no', $req->index)->value('class_name'); 
    $total = [];
    $avg = [];
   $Mymarks;
   $Myavg;
    $totresult =  DB::table('results')->where('class',$cs)->where('year',$req->year)->where('term',$req->term)->select('index')->groupBy('index')->get();
        
        foreach($totresult as $tot){
            $sum = DB::table('results')->where('index',$tot->index)->where('class',$cs)->where('year',$req->year)->where('term',$req->term)->sum('result');
            $avrg = DB::table('results')->where('index',$tot->index)->where('class',$cs)->where('year',$req->year)->where('term',$req->term)->avg('result');
            $total += [$tot->index => $sum];
            $avg += [$tot->index => $avrg];

            if($tot->index == $req->index){
                $Mymarks = $sum;
                $Myavg = $avrg;
            }
        }

        arsort($total);
        arsort($avg);

       $rank =  array_search($req->index,array_keys($total)) + 1;

        
        
        $result = DB::table('results')->where('index',$req->index)->where('year',$req->year)->where('term',$req->term)->get();
        $name = DB::table('students')->where('index_no',$req->index)->value('student_name');
        
        $class = DB::table('students')->where('index_no',$req->index)->value('class_name');
        if(count($result) == 0)
        {
            return redirect()->back()->with('msg','Result is not updated');
        }
        else
        {
            $req->validate([
                'term'=>'required',
                'year'=>'required',
                'index'=>'required',
                
            ],[
                'term.required'=>'Please select a term',
                'year.required'=>'Please select a year',
                'index.required'=>'Please enter index',
            ]);
            
            return redirect()->back()->with('result',$result)->with('name',$name)->with('class',$class)->with('index',$req->index)->with('year',$req->year)->with('term',$req->term)->with('total',$Mymarks)->with('avg',$Myavg)->with('rank',$rank);
        }
        
    }

    public function getResultsPDF(){
        $resultpdf = result::all();
        return $resultpdf;
        //return view('PDFResults',compact('resultpdf'));
    }

    public function downloadPDF($index, $year, $term, $total, $avg, $rank){
           $a = session()->getId();
                if(session()->get('session') != $a )
                {
                    return redirect('/login')->with('msg','Login First');
                }
        $result = DB::table('results')->where('index',$index)->where('year',$year)->where('term',$term)->get();
        $name = DB::table('students')->where('index_no',$index)->value('student_name');
        
        $class = DB::table('students')->where('index_no',$index)->value('class_name');
        //$result = result::all();
        $pdf = PDF::loadView('PDFResults', ['result'=>$result,'name'=>$name,'class'=>$class,'index'=>$index,'year'=>$year,'term'=>$term,'total'=>$total,'avg'=>$avg,'rank'=>$rank]);
        return $pdf->download($name.' '.$term.' Result sheet.pdf');

        
    }


    public function logout(){ //Logout
        session()->flush();
        session()->regenerate();
        return view('HomePage');
    
    }


/* ============================================================================================================ */
    public function editmarks(Request $req) {

        $a = session()->getId();
            
            if(session()->get('session') != $a ){
                return redirect('/login')->with('msg','Login First');
            }

        $req->validate([
            'EINO'=>'required',
            'EMarks'=>'required|integer|between:0,100'
        
        ],[
            'EINO.required'=>'Index is must',

            'EMarks.required'=>'Select a valid marks',
        ]);

        DB::table('results')->where('index' , $req->EINO)->where('year',$req->year)->where('term',$req->term)->where('subject',$req->subject)->update([
            'index' => $req->EINO,
            'result' => $req->EMarks,
        ]);

        $notification = array(
            'message' => 'Successfully Updated', 
            'alert-type' => 'success'
        );
        $result = DB::table('results')->where('trname',$req->name)->where('class',$req->class)->where('year',$req->year)->where('subject',$req->subject)->where('term',$req->term)->get();

        return redirect()->back()->with('result',$result)->with($notification)->with('class',$req->class)->with('year',$req->year)->with('term',$req->term);
    }
//==========================================================================================================
    public function marksrep(Request $req){
           $a = session()->getId();
                if(session()->get('session') != $a )
                {
                    return redirect('/login')->with('msg','Login First');
                }
        $report = DB::table('results')->where('year',$req->year)->where('term',$req->term)->where('subject',$req->subject)->where('class',$req->class)->get();
        
        return redirect()->route('Dashboard',['c'=>$req->id])->with('report1',$report)->with('subject1',$req->subject)->with('year1',$req->year)->with('term1',$req->term)->with('class1',$req->class);
    }
    public function classrep(Request $req){
           $a = session()->getId();
                if(session()->get('session') != $a )
                {
                    return redirect('/login')->with('msg','Login First');
                }
    
    $total = [];
    $avg = [];
    $totresult =  DB::table('results')->where('class',$req->class)->where('year',$req->year)->where('term',$req->term)->select('index')->groupBy('index')->get();
        
        foreach($totresult as $tot){
            $sum = DB::table('results')->where('index',$tot->index)->where('class',$req->class)->where('year',$req->year)->where('term',$req->term)->sum('result');
            $avrg = DB::table('results')->where('index',$tot->index)->where('class',$req->class)->where('year',$req->year)->where('term',$req->term)->avg('result');
            $total += [$tot->index => $sum];
            $avg += [$tot->index => $avrg];
        }

        arsort($total);
        arsort($avg);

       return redirect()->route('Dashboard',['c'=>$req->id])->with('tot',$total)->with('avg',$avg)->with('year2',$req->year)->with('term2',$req->term)->with('class2',$req->class);
    }

    public function printmarksrep($class, $subject, $year, $term){
           $a = session()->getId();
                if(session()->get('session') != $a )
                {
                    return redirect('/login')->with('msg','Login First');
                }
        $report = DB::table('results')->where('year',$year)->where('term',$term)->where('subject',$subject)->where('class',$class)->get();
        $pdf = PDF::loadView('marksheet', ['report'=>$report,'class'=>$class,'year'=>$year,'term'=>$term,'subject'=>$subject]);
        
        return $pdf->download($subject.' '.$term.' '.$class.' '.$year.' Result sheet.pdf');
    }
    public function printclassrep($class, $year, $term){
           $a = session()->getId();
                if(session()->get('session') != $a )
                {
                    return redirect('/login')->with('msg','Login First');
                }
    $total = [];
    $avg = [];
    $totresult =  DB::table('results')->where('class',$class)->where('year',$year)->where('term',$term)->select('index')->groupBy('index')->get();
        
        foreach($totresult as $tot){
            $sum = DB::table('results')->where('index',$tot->index)->where('class',$class)->where('year',$year)->where('term',$term)->sum('result');
            $avrg = DB::table('results')->where('index',$tot->index)->where('class',$class)->where('year',$year)->where('term',$term)->avg('result');
            $total += [$tot->index => $sum];
            $avg += [$tot->index => $avrg];
        }

        arsort($total);
        arsort($avg);

       $pdf = PDF::loadView('classreport',['tot'=>$total, 'avg'=>$avg, 'year'=>$year, 'term'=>$term, 'class'=>$class]);
       return $pdf->download($class.' '.$term.' '.$year.' Result sheet.pdf');
    }

     public function teacherreportprint($name, $class, $year, $subject, $term){ //Teacher Report Search Marks Part
        $a = session()->getId();
                if(session()->get('session') != $a )
                {
                    return redirect('/login')->with('msg','Login First');
                }
                
       $result = DB::table('results')->where('trname',$name)->where('class',$class)->where('year',$year)->where('subject',$subject)->where('term',$term)->get();
        $pdf = PDF::loadView('marksheet', ['report'=>$result,'class'=>$class,'year'=>$year,'term'=>$term,'subject'=>$subject]);
       return $pdf->download($subject.' '.$term.' '.$class.' '.$year.' '.$name.' Result sheet.pdf');
        //return redirect()->back()->with('result',$result)->with('class',$req->class)->with('term',$req->term)->with('year',$req->year);
    
    }

}

