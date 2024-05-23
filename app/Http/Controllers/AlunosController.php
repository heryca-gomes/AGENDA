<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alunos;

class AlunosController extends Controller
{
    public function index()
    {
        $alunos = Alunos::all();
        return  view('create')->with("alunos", $alunos);
    }
    public function add(Request $req)
    {
        $alunos = new Alunos;
        $alunos->email = $req->email;
        $alunos->phone = $req->phone;
        $alunos->name = $req->name;
        $alunos->save();
        return redirect()->back();
    }
    public function delete(Request $req)
    {
        $alunos = Alunos::find($req->id);
        $alunos->delete();
        return redirect()->back();
    }
    public function edit(Request $req)
    {
        $alunos = Alunos::find($req->id);
        return view('edit')->with("alunos", $alunos);
    }
    public function update(Request $req)
    {
        $alunos = Alunos::find($req->id);
        $alunos->update([
            'name' => $req->name,
            'phone' => $req->phone,
            'email' => $req->email,
        ]);
        return $this->index();
    }
}
