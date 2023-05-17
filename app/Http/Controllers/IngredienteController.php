<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class IngredienteController extends Controller
{
    public function index():View
    {
        return view('ingredientes');
    }

    public function ingredientesAcao(Request $r):View
    {
        $viewData = [];

        $client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY')
            ]
        ]);

        $response = $client->post('completions', [
            'json' => [
                'model' => 'text-davinci-003',
                'prompt' => "Gere uma receita incrivel SOMENTE com os seguintes ingredientes: ".$r->input('ingredientes').". Não inclua ingredientes extras! Se não conseguir gerar a receita, responda: Impossível, vá ao mercado!",
                'max_tokens' => 500,
                'temperature' => 0.5,
                'n' => 1,
                'stop' => ['\n']
            ]
        ]);

        if($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody(), true);
            $viewData['ingredientes'] = $r->input('ingredientes');
            $viewData['receita'] = $data['choices'][0]['text'];

            return view('ingredientes', $viewData);
        } else {
            return ['error' => 'Houve um erro ao gerar a receita!'];
        }
    }
}
