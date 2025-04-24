<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class InstituicaoController extends Controller
{
    public function index()
    {
        $dados = json_decode(Storage::get('dados/instituicoes.json'), true);
        return response()->json($dados);
    }
}
