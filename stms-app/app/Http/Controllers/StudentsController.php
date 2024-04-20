<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    function show(){
        $data = User::where('role', 1)->paginate(4);
        return view('manageStudents.manageStudents',compact('data'),['user'=> auth()->user()]);

    }
    function add(Request $request){
        $request->validate([
            'id'=>'required|min:8|max:10|unique:users',
            'username'=> 'required',
            'email'=> 'required|email|unique:users',
            'major'=> 'required',
            'hours'=> [
                'required',
                function ($attribute, $value, $fail) {
                    if ($value < 120) {
                        $fail($attribute . ' must be at least 120 hours.');
                    }
                },
            ],
            'company'=> 'required',
            'password' => 'required|min:8',
            'confirmpass' => 'required|same:password',
            'attachment' => 'file',
          ]);
          $data= new User();
          $data['id']= $request->id;
          $data['username']= $request->username;
          $data['email']= $request->email;
          $data['major']= $request->major;
          $data['hours']= $request->hours;
          $data['company']= $request->company;
          $data['password']= Hash::make($request->password);
          if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $attachmentName = time() . '.' . $attachment->getClientOriginalExtension();
            $attachment->move('attachmentFile', $attachmentName);
            $data->attachment = $attachmentName;
        }


        $data->save();

          return redirect(route('show.students'))->with("Success","student Added Succesffully");


    }
    function updatestuedent(User $student,Request $request){
        $data=$request->validate([
            'id'=>'required',
            'username'=> 'required',
            'email'=> 'required',
            'major'=> 'required',
            'hours'=> [
                'required',
                function ($attribute, $value, $fail) {
                    if ($value < 120) {
                        $fail($attribute . ' must be at least 120 hours.');
                    }
                },
            ],
            'company'=> 'required',
            'password' => 'required',

          ]);
        $student->update($data);
        return redirect(route('show.students'))->with('Success','Student Updated succesffully');
    }

    public function updateActivation($id, $status)
    {
        // Find the user by ID
        $user = User::find($id);

        // Update the activation status
        $user->activation = $status;
        $user->save();

        // You can redirect back or return a response as needed
        return redirect(route('show.students'))->with('Success','Activation Status updated succesffully');
    }

    public function search(Request $request){
        $query= DB::table('users');
        $search = $request->search;
        if ($search){
            $query->where(function($q)use($search){
                $q->where('username','like','%'.$search.'%')
                ->orWhere('company','like','%'.$search.'%')
                ->orWhere('major','like','%'.$search.'%');
            });
        }
        $data = $query->where('role', 1)->paginate(7);

        return view('manageStudents.manageStudents',compact('data','search'),['user'=> auth()->user()]);

    }
    public function download($attachment)
    {

        return response()->download(public_path('attachmentFile/' .$attachment));
    }

}
