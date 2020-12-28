<?php

namespace App\Http\Controllers;

use App\Models\skill;
use Illuminate\Http\Request;
use Validator;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::orderBy('id', 'DESC')->get();

        return view('dashboard.skill.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = "skillStore";
        $button = "Save";

        return view('dashboard.skill.form', compact('url', 'button'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $skill = new Skill();
        $valuemin = 0;
        $valuemax = 100;

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'background' => 'required',
            'valuenow' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $skill->title = $request->title;
            $skill->background = $request->background;
            $skill->width = $request->valuenow;
            $skill->valuemin = $valuemin;
            $skill->valuemax = $valuemax;
            $skill->valuenow = $request->valuenow;

            $skill->save();

            return redirect()->route('skillIndex');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(skill $skill)
    {
        $url = "skillUpdate";
        $button = "Update";

        $skill = Skill::where('id', $id)->first();

        return view('dashboard.skill.form', compact('url', 'button', 'skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, skill $skill)
    {
        $skill = Skill::find($request->id);

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'background' => 'required',
            'width' => 'required',
            'valuemin' => 'required',
            'valuemax' => 'required',
            'valuenow' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            
            $skill->title = $request->title;
            $skill->background = $request->background;
            $skill->width = $request->width;
            $skill->valuemin = $request->valuemin;
            $skill->valuemax = $request->valuemax;
            $skill->valuenow = $request->valuenow;

            $skill->update();

            return redirect()->route('skillIndex');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(skill $skill)
    {
        $skill = Skill::find($skill->id);
        $skill->delete();

        return redirect()->route('skillIndex');
    }

    public function display()
    {
        $skills = Skill::orderBy('id', 'DESC')->get();

        return view('dashboard.views.about', compact('skills'));
    }
}
