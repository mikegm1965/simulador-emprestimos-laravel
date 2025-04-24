<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class ConvenioController extends Controller
{
    public function index()
    {
        $dados = json_decode(Storage::get('dados/convenios.json'), true);
        return response()->json($dados);
    }
}

