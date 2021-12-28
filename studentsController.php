<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\students;

class studentsController extends Controller
{
        //connect to database
    public function display(){
        $data = students::get();  // students = table name
        return view('studentsdata',['data' => $data]);  
    }
    
    //create
    public function studentsRegister(){
        
        return view('studentRegister');

    }

    /* 

    */

    public function studentsdata(Request $request){

        #validation 
        $data = $this->validate($request, [
            "name"     => "required|string",
            "email"    => "required|email",
            "password" => "required|min:6",
            "cv"       => "required|file"
        ]);

        //$op = studentsController::studentsRegister($data);

        $op = students::insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'cv' => $request->input('cv'),
        ]);
        if($op){
            echo "Raw Inserted .";
              }else{
            $message = 'Error Try Again !';
        }
        //session()->flash('Message',$message);
        return redirect(url('/students'));
    }

    
    public function edit($id){
        // code .....

     //    $data = Admin::where('id',$id)->get();

           $data = students::find($id);

        return view('studentsedit',['data' => $data]);
    }

    public function update(Request $request){
        // code ......
  
            # Validate Data .....
            $data =   $this->validate($request,[
                "name"     => "required|string",
                "email"    => "required|email",
                "cv"       => "required|file"
           ]);
  
        $op =   students::where('id',$request->id)->update($data);
     
         if($op){
             $message = "Raw Updated";
         }else{
             $message = "Error Try Again";
         }
  
         session()->flash('Message',$message);
  
         return redirect(url('/students'));
  
  
  
      }

      

     // delete item .....

     public function destroy($id){
        // code ....
       $op  =  students::where('id',$id)->delete();    //  where([['id' => $id],['name' => $name]])
  
       if($op){
           $message = "Raw Removed";
       }else{
           $message = "Error Try Again";
       }
       session()->flash('Message',$message);
       return redirect(url('/Users'));
      }
  
  
    # Auth .....
  
  
    public function Login(){
        return view('login');
    }
  
  
  
    public function DoLogin(Request $request){
        // logic .....
  
        $data = $this->validate($request,[
            "email"    => "required|email",
            "password" => "required|min:6"
        ]);
  
  
      if(auth()->attempt($data)){
          return redirect(url('/Users'));
      }else{
          return redirect('/Login');
      }
  
    }
  
  
  
    public function logout(){
        auth()->logout();
        return redirect(url('students/Login'));
    }
  
  
  


/*
    public function edit($id){

        $data = studentsController::find($id);

        return view('Users.edit',['data' => $data]);

    }*/

}
