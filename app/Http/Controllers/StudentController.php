<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Student;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddStudentRequest $request)
    {

        $id = $request->get('student_number');

        $student = Student::where('student_number', $id)->first();

        if (count($student) > 0) {
            return response()->json(['success' => false, 'message' => 'Student number already exist']);
        }

        $student = Student::create([
            'student_number' => $request->get('student_number'),
            'fname' => $request->get('fname'),
            'lname' => $request->get('lname'),
            'address' => $request->get('address'),
            'zip' => $request->get('zip'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'phone' => $request->get('phone'),
            'mobile' => $request->get('mobile'),
            'email' => $request->get('email'),
            'year' => $request->get('year'),
            'section_id' => $request->get('section_id'),
            'dob'       => $request->get('dob'),
        ]);

        if (!$student->save()) {
            return response()->json(['success' => false, 'message' => 'Failed to save record']);
        }

        return response()->json(['success' => true, 'message' => 'New student saved successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find(Crypt::decrypt($id));

        return view('students.create', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, $id)
    {
        $student = Student::find(Crypt::decrypt($id));

        if (count($student) == 0) {
            return response()->json(['success' => false, 'message' => 'Failed to update record!']);
        }

        if (!$student->update($request->all())) {
            return response()->json(['success' => false, 'message' => 'Failed to update record!']);
        }
        return response()->json(['success' => true, 'message' => 'Update successful!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $student = Student::find(Crypt::decrypt($id));

        if (count($student) == 0) {
            return response()->json(['success' => false, 'message' => 'Invalid id!']);
        }

        if (!$student->delete()) {
            return response()->json(['success' => false, 'message' => 'Failed to delete record!']);
        }

        $students = Student::all();
        return response()->json(['success' => true, 'message' => 'Delete record successful!', 'content' => view('partials.student-table', compact('students'))->render()]);
    }
}
