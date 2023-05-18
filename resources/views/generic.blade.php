<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>🤖 DFS IA - Geral</title>

    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <h1>DFS IA 2023 🤖</h1>
        <nav>
            <a href="/">Voltar</a>
        </nav>
    </header>

    <main>
        <h2>Olá, faça uma pergunta para min!</h2>
        <article>
            <form method="post" action="{{ route('genericAcao') }}">
                @csrf
                <p>
                    <label for="question">Sua pergunta</label>
                    <input type="text" name="question" id="question" value="{{ $question ?? null }}">
                </p>
                <input type="submit" value="Gerar resposta">
            </form>
        </article>
        

        @if(!empty($result))
            {{-- <img src="{{ $image }}"><br>    --}}
            {!! preg_replace("/\r\n|\n/", "<br>", $result) !!}
        @endif
    </main>

    <footer>
        <p>DFS - 2023</p>
    </footer>
</body>
</html>