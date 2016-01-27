<?php

namespace App\Http\Controllers;

use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $search_keys;
    public function index()
    {
        $this->search_keys = ['student_number', 'fname', 'lname', 'address', 'zip', 'city', 'state', 'phone','mobile', 'email', 'year', 'section_id', 'dob'];
        $search_keys = $this->search_keys;
        $students = Student::orderBy('fname')->get();
        return view('reports.index', compact('students', 'search_keys'));
    }

    public function search(Request $request)
    {
        $search_keys = $this->getSearchKeys($request);

        if ($request->get('dob') && $request->get('from') && $request->get('to')) {

            if ($request->get('from') > $request->get('to')) {
                return response()->json(['success' => false, 'message' => 'From date must be lower than TO date']);
            }

            $dt = Carbon::now();
            $dt2 = Carbon::now();
            $from = $dt->subYears($request->get('from'));
            $to = $dt2->subYears($request->get('to'));

            $students = Student::where('dob', '<=', $from)->where('dob', '>=', $to)->orderBy('fname')->get();
        } else {
            $students = Student::orderBy('fname')->get();
        }

        $reports = true;
        return response()->json(['success' => true, 'message' => 'Search successful!', 'content' => view('partials.student-table', compact('students', 'search_keys', 'reports'))->render()]);
    }

    private function getSearchKeys(Request $request)
    {
        $search_keys = [];
        if ($request->get('student_number')) {
            $search_keys[] = 'student_number';
        }

        if ($request->get('fname')) {
            $search_keys[] = 'fname';
        }

        if ($request->get('lname')) {
            $search_keys[] = 'lname';
        }

        if ($request->get('address')) {
            $search_keys[] = 'address';
        }

        if ($request->get('zip')) {
            $search_keys[] = 'zip';
        }

        if ($request->get('city')) {
            $search_keys[] = 'city';
        }
        if ($request->get('state')) {
            $search_keys[] = 'state';
        }

        if ($request->get('phone')) {
            $search_keys[] = 'phone';
        }

        if ($request->get('mobile')) {
            $search_keys[] = 'mobile';
        }

        if ($request->get('email')) {
            $search_keys[] = 'email';
        }

        if ($request->get('year')) {
            $search_keys[] = 'year';
        }

        if ($request->get('section_id')) {
            $search_keys[] = 'section_id';
        }

        if ($request->get('dob')) {
            $search_keys[] = 'dob';
        }

        return $search_keys;
    }


    public function export(Request $request) {

        if ($request->get('dob') && $request->get('from') && $request->get('to')) {
            if ($request->get('from') < $request->get('to')) {
                return response()->json(['success' => false, 'message' => 'From date must be lower than TO date']);
            }

            $dt = Carbon::now();
            $dt2 = Carbon::now();
            $from = $dt->subYears($request->get('from'));
            $to = $dt2->subYears($request->get('to'));

            $students = Student::where('dob', '<=', $from)->where('dob', '>=', $to)->orderBy('fname')->get();
        } else {
            $students = Student::orderBy('fname')->get();
        }

        header('Set-Cookie: fileDownload=true; path=/'); // This is required for the javascript triggering this will know if the transaction was successful.
        $data = $this->generateReportData($students, $request);

        Excel::create('reports-' . date('Ymd'), function($excel) use($data){

            $excel->sheet("Student Data", function($sheet) use($data){
                $sheet->fromArray($data);

            });


        })->download('xls');
    }


    private function generateReportData($students, $request)
    {
        $data = array();

        foreach($students as $student) {
            $row = array();
            if ($request->get('student_number')) {
                $row['StudentId'] = $student->student_number;
            }

            if ($request->get('fname')) {
                $row['FirstName'] = $student->fname;
            }

            if ($request->get('lname')) {
                $row['LastName'] = $student->lname;
            }

            if ($request->get('address')) {
                $row['Address'] = $student->address;
            }

            if ($request->get('zip')) {
                $row['Zip'] = $student->zip;
            }

            if ($request->get('city')) {
                $row['City'] = $student->city;
            }

            if ($request->get('state')) {
                $row['State'] = $student->state;
            }

            if ($request->get('phone')) {
                $row['Phone'] = $student->phone;
            }

            if ($request->get('mobile')) {
                $row['Mobile'] = $student->mobile;
            }

            if ($request->get('email')) {
                $row['Email'] = $student->email;
            }

            if ($request->get('year')) {
                $row['Year'] = $student->year;
            }

            if ($request->get('section_id')) {
                $row['Section'] = $student->section->id;
            }

            if ($request->get('dob')) {
                $row['DateOfBirth'] = $student->dob;
            }

            $data[] = $row;
        }

        return $data;

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
