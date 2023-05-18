<div align="center">
<h1>
    DFS IA 🤖
</h1>
<p>

Sistema integrado com a API **OpenAI** para geração de respostas baseadas no que o usuário inserir
</p>
<P>
A IA é treinada para responder o usuáiro da melhor forma possível.
</P>
</div>

#
## Existema 3 módulos no sistema:
> - ### Gerador de Receitas Culinárias
> - ### Gerador de Copy's
> - ### Gerador de respostas de caráter geral
#

## INSTALAÇÃO

1 - Primeiramente é necessário criar uma conta na plataforma OpenAI e gerar uma **key** da API. Para isso siga as instrução em [OpenAI](https://beta.openai.com/docs/authentication/)

2 - Faça o clone do repositório na pasta que você desejar com o seguinte comando: 
```
git clone https://github.com/daniloferreirasousa/laravel-ChatAi.git
```

3 - Após fazer o clone do reposítório é necessário executar os comandos abaixo:
```
composer install

composer require openai-php/laravel -W

composer dump-autoload
```

4 - Para iniciar o servidor de teste do sistema, utilize:
```
php artisan key:generate
```

5 - É nessário criar uma cópia do arquivo **.env.example**, com o seguinte comando:
```
cp .env.example .env
```

6 - Cria a seguite variável de ambiente no arquivo **.env**:
```
OPENAI_API_KEY=$suaApiKeyGerada
```
Lembre-se de subistituir o valor da variável pela sua **key** gerada no início do processo.

7 - Sua cópia do sistema já deve estar pronta para uso, execute o seguinte comando e bons testes:
```
php artisan serve
```

[My Profile](https://github.com/daniloferreirasousa)