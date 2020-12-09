<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Divisions;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Divisions::orderBy('division_priority', 'asc')->get();
        return view('Backend.pages.division.manage', compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.pages.division.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'divisionName' => 'required|max:255',
            'divisionPriority' => 'required|numeric'

        ],
        [
            'divisionName.required' => 'Division Name can not be empty',
            'divisionPriority.required' => 'Division Priority can not be empty'
        ]);

        $division = new Divisions();
        $division->division_name = $req->divisionName;
        $division->division_priority = $req->divisionPriority;

        $division->save();

        return redirect()->route('division.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $division = Divisions::find($id);

        if(!is_null($division)){
            return view('Backend.pages.division.edit', compact('division'));
        } else{
            return redirect()->route('division.manage');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {

        $req->validate([
            'divisionName' => 'required|max:255',
            'divisionPriority' => 'required|numeric'

        ],
            [
                'divisionName.required' => 'Division Name can not be empty',
                'divisionPriority.required' => 'Division Priority can not be empty'
            ]);
       $division = Divisions::find($id);
       $division->division_name = $req->divisionName;
       $division->division_priority = $req->divisionPriority;

       $division->save();

       return redirect()->route('division.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $division = Divisions::find($id);

       if(!is_null($division)){
           $division->delete();
           return redirect()->route('division.manage');
       }else{
           return redirect()->route('division.manage');
       }
    }
}
