<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Subject;
use App\TestBooklet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestBookletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test_booklets = TestBooklet::orderby('id','desc')->get();
        return view('panel.pages.test_booklets.index', compact('test_booklets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('panel.pages.test_booklets.create', compact('subjects'));
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
            'test_booklet' => 'The :attribute and :other must match.',
        ];

        $validator = Validator::make($request->all(), [

            'test_booklet' => 'required|max:255',
            'subject' => 'required|max:255',

        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('pages.test-booklet.create')
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            TestBooklet::create([

                'title' => $request->input('test_booklet'),
                'subject_id' => $request->input('subject'),

            ]);

            return redirect()->route('panel.pages.test-booklet');
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
        $test_booklet = TestBooklet::find($id);
        $subjects = Subject::all();
        return view('panel.pages.test_booklets.edit', compact('test_booklet','subjects'));
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
        $test_booklet = TestBooklet::find($id);

        $messages = [
            'test_booklet' => 'The :attribute and :other must match.',
        ];

        $validator = Validator::make($request->all(), [

            'test_booklet' => 'required|max:255',
            'subject' => 'required|max:255',

        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('pages.test-booklet.edit', $test_booklet->id)
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            $test_booklet->title = $request->get('test_booklet');
            $test_booklet->subject_id = $request->get('subject');
            $test_booklet->save();
            return redirect()->route('panel.pages.test-booklet');
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
