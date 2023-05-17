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
        <h1>Copy Generator 2023 - Muskai🤖</h1>
        <nav>
            <a href="/">Voltar</a>
        </nav>
    </header>

    <main>
        <h2>Gerador de Copy's</h2>
        <p>Digeite apenas o nome do seu produto no campo abaixo para gerar uma copy, que convença qualquer pessoa</p>
        <article>
            <form method="post" action="{{ route('copyAcao') }}">
                @csrf
                <p>
                    <label for="nome">Nome do Produto</label>
                    <input type="text" name="nome_produto" id="nome">
                </p>
                <p>
                    <label for="preco">Preço do Produto</label>
                    <input type="number" name="preco_produto" id="preco">
                </p>
                <p>
                    <label for="caracteristica">Características do Produto</label>
                    <input type="text" name="caracteristicas_produto" id="caracteristica">
                </p>
                <p>
                    <label for="publico">Público Alvo</label>
                    <input type="text" name='publico_alvo' id="publico">
                </p>
                <p>
                    <label for="estilo">Estilo da Copy</label>
                    <select name="estilo_copy" id="estilo">
                        <option value="formal">Formal</option>
                        <option value="descontrida">Descontraída</option>
                        <option value="Vida Louca">Vida Louca</option>
                    </select>
                </p>

                <input type="submit" value="Criar copy">
            </form>
        </article>
        

        @if(!empty($copyGerada))
            <img src="{{ $image }}">
            {!! preg_replace("/\r\n|\n/", "<br>", $copyGerada) !!}
        @endif
    </main>

    <footer>
        <p>DFS - 2023</p>
    </footer>
</body>
</html>