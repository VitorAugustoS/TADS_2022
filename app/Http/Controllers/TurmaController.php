<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurmaController extends Controller
{
    
    public function listaProfessor(){
        return DB::table("turma AS t")
                    ->join("professor AS p", "t.professor_id", "=", "p.id")
                    ->select("t.*", "p.nome AS nome_professor")
                    ->get();
    }

    public function index()
    {
        $turma = new Turma();
        $turmas = $this->listaProfessor();
        $professores = Professor::All();
        return view("turma.index", [
            "turma" => $turma,
            "turmas" => $turmas,
            "professores" => $professores
        ]);
    }


    public function store(Request $request)
    {
        if ($request->get("id") != ""){
            $turma = Turma::Find($request->get("id"));
        } else {
            $turma = new Turma();
        }
        $turma->nome = $request->get("nome");
        $turma->semestre = $request->get("semestre");
        $turma->ano = $request->get("ano");
        $turma->professor_id = $request->get("professor_id");  
        $turma->save();
        $request->session()->get("status", salvo);
        
        return redirect("/turma");
    }

    
    public function edit($id)
    {
        $turma = Turma::Find($id);
        $turmas = $this->listaProfessor();
        $professores = Professor::All();
        return view("turma.index", [
            "turma" => $turma,
            "turmas" => $turmas,
            "professores" => $professores
        ]);
    }

    
    public function destroy($id)
    {
        Turma::Destroy($id);
        $request->session()->get("status", "excluido");
        return redirect("/turma");
    }
}
