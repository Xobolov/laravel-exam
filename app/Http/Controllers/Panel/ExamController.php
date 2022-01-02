<?php

namespace App\Http\Controllers\Panel;

use App\Exam;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Exam\Create;


class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::orderby('id', 'desc')->get();
        return view('panel.pages.exams.index' ,compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.pages.exams.create');
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
            'exam_title' => 'The :attribute and :other must match.',
            'date' => 'The :attribute and :other must match.',
        ];

        $validator = Validator::make($request->all(), [

            'exam_title' => 'required|max:255',
            'date' => 'required|date_format:Y-m-d',

        ], $messages);

//        dd($request->input('date'));

        if ($validator->fails()) {
            return redirect()->route('pages.exam.create')
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            Exam::create([

                'title' => $request->input('exam_title'),
                'provide_date' => $request->input('date'),

            ]);

            return redirect()->route('panel.pages.exam');
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
        $exam = Exam::find($id);
        return view('panel.pages.exams.edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Create $request, $id)
    {

        $validated = $request->validated();

        $exam = Exam::find($id);
        // if(!$exam) return abort(404);

        $exam->title = $validated['exam_title'];
        $exam->provide_date = $validated['date'];
        $exam->save();
        return redirect()->route('panel.pages.exam');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();

        return redirect()->route('panel.pages.exam');
    }
}
