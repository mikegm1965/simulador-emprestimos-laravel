<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SimulacaoController extends Controller
{
    public function simular(Request $request)
    {
        $dados = $request->validate([
            'valor_emprestimo' => 'required|numeric',
            'instituicoes' => 'array',
            'convenios' => 'array',
            'parcela' => 'integer'
        ]);

        $valor = $dados['valor_emprestimo'];
        $filtroInstituicoes = $dados['instituicoes'] ?? null;
        $filtroConvenios = $dados['convenios'] ?? null;
        $filtroParcela = $dados['parcela'] ?? null;

        $taxas = json_decode(Storage::get('dados/taxas.json'), true);
        $instituicoes = json_decode(Storage::get('dados/instituicoes.json'), true);
        $convenios = json_decode(Storage::get('dados/convenios.json'), true);

        $resultados = [];

        foreach ($taxas as $item) {
            if (
                (!$filtroInstituicoes || in_array($item['instituicao_id'], $filtroInstituicoes)) &&
                (!$filtroConvenios || in_array($item['convenio_id'], $filtroConvenios)) &&
                (!$filtroParcela || $item['parcelas'] == $filtroParcela)
            ) {
                $valorParcela = $valor * $item['coeficiente'];

                $resultados[] = [
                    'instituicao' => $instituicoes[$item['instituicao_id']],
                    'convenio' => $convenios[$item['convenio_id']],
                    'parcelas' => $item['parcelas'],
                    'valor_parcela' => round($valorParcela, 2),
                    'taxa' => $item['coeficiente']
                ];
            }
        }

        return response()->json($resultados);
    }
}
