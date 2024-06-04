<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller    
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Portfolio::all();

        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //validazione campi 
        $request->validate([
            'project_name' => 'required|max:200|min:2 ',
            'description' => 'nullable|max:2000',
            'working_hours' => 'required|integer',
            'co_workers' => 'required|max:1000',
        ]);

        $form_data = $request->all();

        $new_project =  Portfolio::create($form_data);
        return to_route('admin.portfolios.show', $new_project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        return view('admin.projects.show',compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.projects.edit',compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $form_data = $request->all();
        $portfolio->fill($form_data);
        $portfolio->save();
        //oppure - fa subito il fill()e il salvataggio- save()
        //$portfolio->update();
        return to_route('admin.portfolios.show',$portfolio);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return to_route('admin.portfolios.index');
    }
}
