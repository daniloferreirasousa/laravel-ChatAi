<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function index():View
    {
        return view('home');
    }


    public function copyAcao(Request $r):View
    {
        dd($r->all());

        $client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer '. env('OPENAI_API_KEY')
            ]
        ]);

        $response = $client->post('completions', [
            'json' => [
                'model' => 'text-davinci-003',
                'prompt' => 'Gere uma copy que convença qualquer um a comprar o produto, baseando-se no seguinte nome de produto: '.$r->input('copy'),
                'max_tokens' => 500,
                'temperature' => 0.5,
                'n' => 1,
                'stop' => ['\n']
            ]
        ]);

        if($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody(), true);
            $viewData['copyEnv'] = $r->input('copy');
            $viewData['copy'] = $data['choices'][0]['text'];

            return view('copy', $viewData);
        } else {
            return ['error' => 'Houve um erro ao gerar a copy!'];
        }
    }
}
