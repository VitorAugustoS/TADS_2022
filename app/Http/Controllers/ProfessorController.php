<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;

class ProfessorController extends Controller
{
    
    public function index()
    {
        $professor = new Professor();
        $professors = Professor::All();
        return view("professor.index", [
            "professor" => $professor,
            "professors" => $professors
        ]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        if ( $request->get("id") != "" ) {
            $professor = Professor::Find($request->get("id"));
        } else {
            $professor = new Professor();
        }

        $professor->nome = $request->get("nome");
        $professor->email = $request->get("email");
        $professor->cpf = $request->get("cpf");

        $professor->save();

        return redirect("/professor");
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
