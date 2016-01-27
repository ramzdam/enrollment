<?php

namespace App\Http\Controllers;

use App\Section;
use App\Student;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return view('sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('sections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');

        $section = Section::where('name', $name)->first();

        if (count($section) > 0) {
            return response()->json(['success' => false, 'message' => 'Section name already exist']);
        }

        $section = Section::create([
            'name' => $request->get('name'),

        ]);

        if (!$section->save()) {
            return response()->json(['success' => false, 'message' => 'Failed to save record']);
        }

        return response()->json(['success' => true, 'message' => 'New section saved successfully!']);
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
        $section = Section::find(Crypt::decrypt($id));

        return view('sections.create', compact('section'));
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
        $section = Section::find(Crypt::decrypt($id));

        if (count($section) == 0) {
            return response()->json(['success' => false, 'message' => 'Failed to update record!']);
        }

        if (!$section->update($request->all())) {
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
        $section = Section::find(Crypt::decrypt($id));

        if (count($section) == 0) {
            return response()->json(['success' => false, 'message' => 'Invalid id!']);
        }

        $student = Student::where('section_id', Crypt::decrypt($id))->first();

        if (count($student) > 0) {
            $sections = Section::all();
            return response()->json(['success' => false, 'message' => 'Cannot delete section. A student is enrolled in this section', 'content' => view('partials.section-table', compact('sections'))->render()]);
        }

        if (!$section->delete()) {
            return response()->json(['success' => false, 'message' => 'Failed to delete record!']);
        }

        $sections = Section::all();
        return response()->json(['success' => true, 'message' => 'Delete record successful!', 'content' => view('partials.section-table', compact('sections'))->render()]);
    }
}
