<?php

namespace App\Http\Controllers;
use App\Models\Departements;
use App\Models\User;
use App\Models\Positions;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {
        $title = "Data Karyawan";
        $departements = Departements::orderBy('id', 'asc')->paginate(5);
        return view('departements.index', compact(['departements', 'title']));
    }

    public function create()
    {
        $title = "Tambah Data Karyawan";
        $managers = User::where('position','1')->get();
        return view('departements.create', compact('managers','title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location',
            'manager_id',
        ]);

        Departements::create($request->post());

        return redirect()->route('departements.index')->with('success', 'Departement has been created successfully.');
    }


    public function show(departements $departement)
    {
        return view('departements.show', compact('departement'));
    }


    public function edit(departements $departement)
    {
        $title = "Edit data karyawan";
        $managers = User::where('position','1')->get();
        return view('departements.edit', compact('managers','title'));
    }


    public function update(Request $request, departements $departement)
    {
        $request->validate([
            'name' => 'required',
            'location',
            'manager_id'
        ]);

        $departement->fill($request->post())->save();

        return redirect()->route('departements.index')->with('success', 'Departement Has Been updated successfully');
    }


    public function destroy(departements $departement)
    {
        $departement->delete();
        return redirect()->route('departements.index')->with('success', 'Departement has been deleted successfully');
    }
}