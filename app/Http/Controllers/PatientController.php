<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = User::patients()->paginate(10);
        return view('patients.index', ['patients' => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:6'
        ];
        $this->validate($request, $rules);

        User::create(
            $request->only('name', 'email', 'address', 'phone')
            + [
                'role'=> 'patient',
                'password' => bcrypt($request->input('password'))
            ]
        );

        return redirect('patients')->with('success', 'Se ha registrado al paciente: "' . $request->input('name') . '" correctamente');
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
        $patient = User::patients()->findOrFail($id);
        return view('patients.edit', compact('patient'));
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
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:6'
        ];
        $this->validate($request, $rules);

        $patient = User::patients()->findOrFail($id);

        $data = $request->only('name', 'email', 'address', 'phone');
        $password = $request->input('password');

        if ($password) {
            $data['password'] = bcrypt($password);
        }

        $patient->fill($data);
        $patient->save();

        return redirect('patients')->with('success', 'Se ha modificado la información del paciente: "' . $request->input('name') . '" correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $patient)
    {
        $patientName = $patient->name;
        $patient->delete();

        return redirect('patients')->with('success', 'Se elimino de manera correcta al paciente: "' . $patientName . '" correctamente');
    }
}
