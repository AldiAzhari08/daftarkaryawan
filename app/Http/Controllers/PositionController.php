<?php

namespace App\Http\Controllers;
use App\Models\Positions;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $title = "";
        $positions = Positions::orderBy('id','asc')->paginate(5);
        return view('positions.index', compact(['positions','title']));
    }

    public function create()
    {
        $title ="Tambah data position";
        return view('positions.create',compact(['title']));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'keterangan',
            'alias',
        ]);
        
        Positions::create($request->post());

        return redirect()->route('positions.index')->with('success','Positions has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function show(Positions $position)
    {
        return view('positions.show',compact('positions'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $position
    * @return \Illuminate\Http\Response
    */
    public function edit(Positions $position)
    {
        $title ="Edit Data position";
        return view('positions.edit',compact('position', 'title'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $position
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Positions $position)
    {
        $request->validate([
            'name' => 'required',
            'keterangan' => 'required',
            'alias' => 'required',
        ]);
        
        $position->fill($request->post())->save();

        return redirect()->route('positions.index')->with('success','Positions Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Positions  $Positions
    * @return \Illuminate\Http\Response
    */
    public function destroy(Positions $position)
    {
        $position->delete();
        return redirect()->route('positions.index')->with('success','Positions has been deleted successfully');
    }
}