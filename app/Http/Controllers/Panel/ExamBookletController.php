<?php

namespace App\Http\Controllers\Panel;

use App\Exam;
use App\ExamBooklet;
use App\Http\Controllers\Controller;
use App\TestBooklet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExamBookletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exam_booklets = ExamBooklet::orderby('id', 'desc')->get();
        return view('panel.pages.exam_booklets.index', compact('exam_booklets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exams = Exam::all();
        $test_booklets = TestBooklet::all();
        return view('panel.pages.exam_booklets.create', compact('exams', 'test_booklets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'exam' => 'The :attribute and :other must match.',
            'test_booklet' => 'The :attribute and :other must match.',
        ];

        $validator = Validator::make($request->all(), [

            'exam' => 'required|max:255',
            'test_booklet' => 'required|max:255',

        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('pages.test-booklet.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            ExamBooklet::create([

                'exam_id' => $request->input('exam'),
                'test_booklet_id' => $request->input('test_booklet'),

            ]);

            return redirect()->route('panel.pages.exam-booklet');
        }
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
        $exam_booklets = ExamBooklet::find($id);
        $exams = Exam::all();
        $test_booklets = TestBooklet::all();
        return view('panel.pages.exam_booklets.edit', compact('exam_booklets', 'exams', 'test_booklets'));
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
