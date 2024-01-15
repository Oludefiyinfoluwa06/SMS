<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index () {
        if (!session()->has('email')) {
            return redirect('/login');
        }

        $email = session()->get('email');

        $user = User::where('email', $email)->first();

        if ($user) {
            $username = $user->name;
        } else {
            return redirect('/login')->with('error', "You're not logged in");
        }

        $students = DB::table('students')->get();

        return view('home', [
            'username' => $username,
            'students' => $students
        ]);
    }

    public function add_student_page () {
        if (!session()->has('email')) {
            return redirect('/login');
        }

        $email = session()->get('email');
        
        $user = User::where('email', $email)->first();
        
        if ($user) {
            $username = $user->name;
        } else {
            return redirect('/login')->with('error', "You're not logged in");
        }

        return view('add_student', [
            'username' => $username,    
        ]);
    }

    public function add_student (Request $request) {
        $request->validate([
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'student_id' => 'required|string|unique:students,student_id|max:255',
            'email' => 'required|string|unique:students,email|max:255',
            'phone' => 'required|string|max:255',
            'entry_year' => 'required|string|max:255',
            'dob' => 'required|date|max:255',
            'gender' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
        ]);

        DB::table('students')->insert([
            'lastname' => $request->input('lastname'),
            'firstname' => $request->input('firstname'),
            'student_id' => $request->input('student_id'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'entry_year' => $request->input('entry_year'),
            'dob' => $request->input('dob'),
            'gender' => $request->input('gender'),
            'nationality' => $request->input('nationality'),
            'timestamps' => now(),
        ]);

        return redirect('/')->with('message', 'Student created successfully');
    }

    public function view_student ($studentId) {
        if (session()->has('email')) {
            $email = session()->get('email');

            $user = User::where('email', $email)->first();

            if ($user) {
                $username = $user->name;
            } else {
                return redirect('/login');
            }
            
            $student = DB::table('students')->where('id', $studentId)->first();
        
            if (!$student) {
                abort(404);
            }
        
            return view('view_student', [
                'username' => $username,
                'student' => $student
            ]);
        }
        return redirect('/login');
    }

    public function edit_student_page ($studentId) {
        if (!session()->has('email')) {
            return redirect('/login');
        }

        $email = session()->get('email');
        
        $user = User::where('email', $email)->first();
        
        if ($user) {
            $username = $user->name;
        } else {
            return redirect('/login')->with('error', "You're not logged in");
        }

        $student = DB::table('students')->where('id', $studentId)->first();

        if (!$student) {
            abort(404);
        }

        return view('edit_profile', [
            'username' => $username,  
            'student' => $student  
        ]);
    }

    public function edit_student (Request $request, $studentId) {
        $request->validate([
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'student_id' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'entry_year' => 'required|string|max:255',
            'dob' => 'required|date|max:255',
            'gender' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
        ]);

        DB::table('students')->where('id', $studentId)->update([
            'lastname' => $request->input('lastname'),
            'firstname' => $request->input('firstname'),
            'student_id' => $request->input('student_id'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'entry_year' => $request->input('entry_year'),
            'dob' => $request->input('dob'),
            'gender' => $request->input('gender'),
            'nationality' => $request->input('nationality'),
            'timestamps' => now(),
        ]);

        return redirect('/'.$studentId)->with('message', 'Student updated successfully');
    }

    public function delete_student ($studentId) {
        $student = DB::table('students')->where('id', $studentId)->first();

        if (!$student) {
            abort(404);
        }

        DB::table('students')->where('id', $studentId)->delete();

        return redirect('/')->with('message', 'Student profile deleted successfully!');
    }
}
