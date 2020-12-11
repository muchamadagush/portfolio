<?php

namespace App\Http\Controllers;

use App\Models\portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::orderBy('id', 'DESC')->get();

        return view('dashboard.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = "portfolioStore";
        $button = "Save";

        return view('dashboard.portfolio.form', compact('url', 'button'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $portfolio = new Portfolio();

        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->slug = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/images/portfolio', $filename);
            $portfolio->image = $filename;
        } else {
            return $request;
            $portfolio->image = '';
        }
        
        $portfolio->save();

        return redirect()->route('portfolioIndex');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(portfolio $portfolio, $id)
    {
        $url = "portfolioUpdate";
        $button = "Update";

        $portfolio = Portfolio::where('id', $id)->first();

        return view('dashboard.portfolio.form', compact('url', 'button', 'portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, portfolio $portfolio)
    {
        $portfolio = Portfolio::find($request->id);
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $portfolio->title = $request->title;
            $portfolio->description = $request->description;
            $portfolio->slug = Str::slug($request->title);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/images/portfolio', $filename);
                $portfolio->image = $filename;
            } else {
                return $request;
                $portfolio->image = '';
            }
            
            $portfolio->update();

            return redirect()->route('portfolioIndex');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->delete();

        return redirect()->route('portfolioIndex');
    }
}
