<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\District;
use App\Models\Backend\Divisions;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::orderBy('district_name', 'asc')->get();
        return view('Backend.pages.district.manage', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Divisions::orderBy('division_priority', 'asc')->get();
        return view('Backend.pages.district.create', compact('divisions'));
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
            'districtName' => 'required | max:255',
            'divisionName' => 'required | max:255'
        ],
        [
            'districtName.required' => 'District Name can not be empty',
            'divisionName.required' => 'Division Name can not be empty'
        ]);

        $district = new District();
        $district->district_name = $req->districtName;
        $district->division_id = $req->divisionName;

        $district->save();

        return redirect()->route('district.manage');
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
        $district = District::find($id);
        $divisions = Divisions::orderBy('division_priority', 'asc')->get();

        if(!is_null($district)){
            return view('Backend.pages.district.edit', compact('district','divisions'));
        } else{
            return redirect()->route('district.manage');
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
            'districtName' => 'required | max:255',
            'divisionName' => 'required | max:255'
        ],
            [
                'districtName.required' => 'District Name can not be empty',
                'divisionName.required' => 'Division Name can not be empty'
            ]);

        $district = District::find($id);
        $district->district_name = $req->districtName;
        $district->division_id = $req->divisionName;

        $district->save();

        return redirect()->route('district.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $district = District::find($id);

        if(!is_null($district)){
            $district->delete();
            return redirect()->route('district.manage');
        } else{
            return redirect()->route('district.manage');
        }
    }
}
