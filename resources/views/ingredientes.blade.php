<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>🤖 Muskai</title>

    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <h1>Gerador de Receitas 🤖</h1>
        <nav>
            <a href="/">Voltar</a>
        </nav>
    </header>

    <main>
        <h2>Gerador de receitas</h2>
        <p>Desafie sua criatividade culinária! Digite os ingredientes disponíveis em sua geladeira e deixe a magia acontecer. Descubra uma receita incrível e surpreenda-se com o sabor que você pode criar!</p>
        <article>
            <form method="post" action="{{ route('ingredientesAcao') }}">
                @csrf
                <label for="ing">Ingredientes</label>
                <input type="text" name="ingredientes" id="ing" value="{{ $ingredientes ?? null }}">
                <input type="submit" value="Criar">
            </form>
        </article>
        

        @if(!empty($receita))
            {!! preg_replace("/\r\n|\n/", "<br>", $receita) !!}
        @endif
    </main>

    <footer>
        <p>DFS - 2023</p>
    </footer>
</body>
</html>