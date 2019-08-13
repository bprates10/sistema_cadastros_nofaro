Passos para a instalação:
- Clone o projeto;
- Configure o arquivo .env de acordo com a configuração da sua base de dados
> Por padrão, o arquivo está apontando para a base nofaro, usuário root e senha 10.
> Se a configuração do banco de dados divergir, atualize o arquivo .env

- Execute os comandos a seguir:

php artisan crud:generate Posts --fields='name#string; mail#string; ddd#string; phone#string' --route=yes --pk=id
~ Este comando é o responsável por criar a estrutura de CRUD da aplicação (model, migration, view, route e controller) ~

php artisan migrate
~ Este comando roda a migration ~

php artisan vendor:publish --provider="Appzcoder\CrudGenerator\CrudGeneratorServiceProvider"
~ Publica as views do package na vendor ~

php artisan serve
~ Sobe o servidor nativo ~

Após, é só acessar http://localhost:8000/posts

XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

Objetivo do Projeto

x Criar uma aplicação que contenha​:

- Lista de pessoas (concluído)
- Inclusão de uma pessoa (concluído)
- Remoção de uma pessoa (concluído)
- Filtro por nome e por e-mail (concluído)

x Descrição (concluído)
Uma pessoa terá as seguintes informações cadastradas:
- Nome
- E-mail
- DDD
- Telefone
- A lista de pessoas deve mostrar todas as informações cadastradas e ser ordenada por nome.

Ao incluir uma pessoa as seguintes validações devem ser feitas no backend:
- Nome: obrigatório e com no mínimo 2 caracteres (concluído)
- E-mail: obrigatório, ser um e-mail válido e único na base de dados (concluído)
- DDD: opcional, numérico com no máximo 2 dígitos (concluído)
- Telefone: opcional, numérico com 9 dígitos (concluído)
- Antes de remover uma pessoa é preciso mostrar uma confirmação da ação. (concluído)

O filtro por nome ou e-mail deve ser feito no backend.
- O nome poderá ser buscado por strings parciais, já o e-mail deve ser por busca exata. (concluído)
- Caso a busca seja feita por nome e por e-mail deve ser retornada a lista de pessoas que passem em uma ou (não exclusivo) em outra condição. (concluída parcialmente, pois apenas um filtro é responsável pela busca tanto por nome (parcial) quanto por e-mail(total))

x Regras
- Utilizar Laravel para o desenvolvimento do backend (concluído)
- Utilizar MySQL como base de dados (concluído)
- Recomenda-se o uso de Vue.js para o desenvolvimento do frontend (não realizado - uma vez que o Laravel trás a estrutura básica do bootstrap e as validações devem ser feitas no backend, a implementação do vue.js na aplicação não se justifica)
- O uso de libs é livre (concluído)

Entregar o resultado através de um sistema de controle de versão (Github, Bitbucket, ...)
- Ter instruções de como instalar a aplicação (concluído)
