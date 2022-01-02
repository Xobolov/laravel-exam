<?php

namespace App\Http\Controllers\Panel;

use App\Exam;
use App\Http\Controllers\Controller;
use App\Question;
use App\TestBooklet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view('panel.pages.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $test_booklets = TestBooklet::all();
        $exams = Exam::all();
        return view('panel.pages.questions.create', compact('test_booklets', 'exams'));
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

            'question' => 'The :attribute and :other must match.',
            'choice' => 'The :attribute and :other must match.',
            'test_booklet' => 'The :attribute and :other must match.',
            'exam' => 'The :attribute and :other must match.',
        ];

        $validator = Validator::make($request->all(), [

            'question' => 'required|max:255',
            'choice' => 'required|max:255',
            'test_booklet' => 'required|max:255',
            'exam' => 'required|max:255',

        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('pages.questions.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            Question::create([

                'content' => $request->input('question'),
                'choice' => $request->input('choice'),
                'test_booklet_id' => $request->input('test_booklet'),
                'exam_id' => $request->input('exam'),

            ]);

            return redirect()->route('panel.pages.questions');
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
        $question = Question::find($id);
        $test_booklets = TestBooklet::all();
        $exams = Exam::all();
        return view('panel.pages.questions.edit', compact('question', 'test_booklets', 'exams'));
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
        $question = Question::find($id);

        $messages = [

            'question' => 'The :attribute and :other must match.',
            'choice' => 'The :attribute and :other must match.',
            'test_booklet' => 'The :attribute and :other must match.',
            'exam' => 'The :attribute and :other must match.',
        ];

        $validator = Validator::make($request->all(), [

            'question' => 'required|max:255',
            'choice' => 'required|max:255',
            'test_booklet' => 'required|max:255',
            'exam' => 'required|max:255',

        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('pages.questions.edit', $question->id)
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            $question->content = $request->get('question');
            $question->choice = $request->get('choice');
            $question->test_booklet_id = $request->get('test_booklet');
            $question->exam_id = $request->get('exam');
            $question->save();

            return redirect()->route('panel.pages.questions');
        }
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
