<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::orderby('id','desc')->get();
        return view('panel.pages.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.pages.subjects.create');
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
            'subject_title'    => 'The :attribute and :other must match.',
        ];

        $validator = Validator::make($request->all(), [

            'subject_title' => 'required|max:255',

        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('pages.subject.create')
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            Subject::create([

                'title' => $request->input('subject_title'),

            ]);

            return redirect()->route('panel.pages.subject');
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
        $subjects = Subject::find($id);
        return view('panel.pages.subjects.edit', compact('subjects'));
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
        $subject = Subject::findOrFail($id);

        $messages = [
            'subject_title'    => 'The :attribute and :other must match.',
        ];

        $validator = Validator::make($request->all(), [

            'subject_title' => 'required|max:255',

        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('pages.subject.edit', $subject->id)
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            $subject->title = $request->get('subject_title');
            $subject->save();
            return redirect()->route('panel.pages.subject');
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
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('panel.pages.subject');
    }
}
