<?php

namespace App\Http\Controllers\Admin;

use App\Specialty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecialtyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }

    public function create()
    {
        return view('specialties.create');
    }

    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }

    private function performValidate($request)
    {
        $rules = [
            'name' => 'required|min:3'
        ];

        $this->validate($request, $rules);
    }

    public function store(Request $request)
    {
        $this->performValidate($request);

        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();

        return redirect('specialties')->with('success', 'Se agrego la especialidad correctamente');
    }

    public function update(Request $request, Specialty $specialty)
    {
        $this->performValidate($request);

        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();

        return redirect('specialties')->with('update', 'Se actualizo la especialidad correctamente');
    }

    public function destroy(Specialty $specialty)
    {
        $deletedName = $specialty->name;
        $specialty->delete();
        return redirect('specialties')->with('delete', 'Se elimino la especialidad: "'. $deletedName . '", correctamente');
    }
}
