<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function index(Request $r):View
    {
        return view('welcome');
    }

    public function ingredientesAcao(Request $r):View
    {
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
                'prompt' => "Gere uma receita incrivel e o modo de preparo com os seguintes ingredientes: ".$r->input('ingredientes'),
                'max_tokens' => 50,
                'temperature' => 0.5,
                'n' => 1,
                'stop' => ['\n']
            ]
        ]);
        if($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody(), true);
            $viewData['receita'] = $data['choices'][0]['text'];

            return view('welcome', $viewData);
        } else {
            return ['error' => 'Deu algum erro!'];
        }
        
    }
}
