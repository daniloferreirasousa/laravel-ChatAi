<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class GenericController extends Controller
{
    public function index():View
    {
        $viewData = [];

        return view('generic', $viewData);
    }

    public function genericAcao(Request $r):View
    {
        $viewData = [];

        try{
            $result = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => 'Olá, seu nome agora é "DFS IA", e agora você responderá todas as perguntas com este nome.'],
                    ['role' => 'user', 'content' => 'Eu gostaria que você me desse uma explicação bem detalhada sobre: '.$r->question],
                ]
            ]);

            $viewData['question'] = $r->question;
            $viewData['result'] = $result['choices'][0]['message']['content'];

        } catch(Exception $e) {
            $viewData['result'] = $e->getMessage();
        }
        

        

        return view('generic', $viewData);
    }
}
