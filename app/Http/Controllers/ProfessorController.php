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

        $request->session()->flash("status", "salvo");
		return redirect("/professor");
    }

    public function edit($id)
    {
        $professor = Professor::Find($id);
		$professors = Professor::All();
		return view("professor.index", [
			"professor" => $professor,
			"professors" => $professors
		]);
    }

    public function destroy($id, Request $request)
    {
        Professor::Destroy($id);
		$request->session()->flash("status", "excluido");
		return redirect("/professor");
    }
}
