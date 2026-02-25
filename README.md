<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## About this Project - Programação Web 2 com Laravel 2026.1
Código-Fonte do Projeto desenvolvido durante as aulas de programação web 2 com PHP e Laravel no curso técnico integrado do IFSC 2026.1

## Quando baixar o projeto, o que fazer? 
**1. Instalar as dependências do projeto**  
`composer install`  

**2. copia e cola o .env.example e renomeia para .env**  
`cp .env.example .env`  

**3. Criar as tabelas do banco de dados do projeto**  
`php artisan migrate` 

**Ou criar as tabelas e insere os registros no banco de dados do projeto**  
`php artisan migrate --seed` 

**4. Iniciar o sistema**  
`php artisan serve`

**5. Acessar o sistema**  
`http://localhost:8000/`

----
## Diretorios mais usados do projeto
#### Arquitetura de uma Aplicação em Laravel
![Imagem1](https://github.com/lordjack/pweb2_2024_1/assets/6691621/e579df76-d7a0-4075-ae44-546f8b285c46)

**Controller**
`App/Http/Controllers`

**Model**
`App/Http/Models`

**View**
`resources/views/nome_arquivo.blade.php`

**Rotas**
`routes/web.php`

**Arquivos de migração(geram as tabelas do banco de dados)**
`database/migrations`

----
## Banco de dados

**Criar arquivo para gerar tabela no banco de dados**  
`php artisan make:migration create_nome_tabela`

**Gerar as tabelas no banco de dados**  
`php artisan migrate` ou `php artisan migrate --seed` Gera o banco e execulta os seeds 

**Recriar as tabelas no banco de dados**  
`php artisan migrate:fresh --seed` Gera o banco e execulta os seeds 

**Salvar .SQL do banco de dados**  
`database/sql/db_aula.sql`

**Criar um arquivo para inserir registros no banco de dados**  
`php artisan make:seeder NomeSeeder`

**Inserir registros no banco de dados a partir de um arquivo**  
`php artisan db:seed NomeSeeder`

----
## Comandos básicos do Laravel  
**Listar todos os comandos do Laravel**  
`php artisan list`

**Criar um arquivo Model**  
`php artisan make:model NomeModel`

**Criar um arquivo Model e um arquivo de migração ao mesmo tempo**  
`php artisan make:model NomeModel -m`

**Criar um arquivo Controller**  
`php artisan make:controller NomeController`

**Criar um Controller e o --model associa com o Model da tabela**  
`php artisan make:controller NomeController --resource --model=NomeModel`

**Habilitar o envio de arquivo para o Storage**  
`php artisan storage:link`

**Criando multiplos arquivos junto com o Model - Migração, Factory, Seed, Controller com Resource**  
`php artisan make:model NomeModel -mfscr`

- [Mais detalhes ver documentação oficial do Laravel](https://laravel.com/docs/10.x/eloquent#generating-model-classes).


## Comandos básicos Git

**Clonar o projeto**  
`git clone URL_PROJETO`

**Configurar o email e nome do repositorio**  
`git config --global user.email "you@example.com"`\
`git config --global user.name "Your Name"`

**Adicionar todos arquivos para serem versionados**  
`git add .`

**Commitar o arquivo para ser versionado**  
`git commit -m "Sua mensagem"`

**Enviar as alterações para o repositorio remoto do Git**  
`git push`

**Atualizar arquivos do projeto local de acordo com o repositorio do Git remoto**  
`git pull`

**CRUDs do Projeto**  

![db_academico](https://github.com/lordjack/pweb2_2024_1/assets/6691621/cd722837-e1f4-41be-94f4-78b2bf9d08d6)


## Dicas atalhos no VSCode
[Vídeo com as dicas](https://youtu.be/MZgbd7bjCTk?si=0zN4B2YsXLU3a9Z8) 

**Duplicar Linha**  
`Shift + Alt + Seta`  
**Mover Linha**  
`Alt + Seta`  
**Apagar Linha**  
`Ctrl + Shift + K`  
**Multi Ocorrências**  
`Ctrl + D`  
**Multi Seleção**  
`Alt + Click`  
**Zen Mode**  
`Ctrl + K Z`   
**IntelliSense**  
`Ctrl + Espaço`   
**Apagar a linha**  
`Ctrl+Shift+K`   
**Cria a estrutura básica de HTML**  
`Alt + ! + tab`   
**Mostrar os atalhos dos comandos**  
`Ctrl+k Ctrl+s`   
## Comandos para o Node

**Instalar Pacotes do Node**  
`npm install`   

**Publicar os pacotes do node**  
`npm run build`   

**Ver versão do node que esta instalado**  
`node -v`   

### Links Úteis
- [Documentação oficial do Laravel](https://laravel.com/docs).
- [Correção do Erro de instalação do login Breeze](https://stackoverflow.com/questions/72798465/vite-manifest-not-found-at-c-users-hp-example-app-public-build-manifest-json)
- [Criando Relatório em PDF com Laravel](https://www.itsolutionstuff.com/post/laravel-create-pdf-file-with-image-exampleexample.html)
- [Criando Gráficos com Laravel](https://larapex-charts.netlify.app/)
- [Criando uma API com Laravel](https://www.itsolutionstuff.com/post/laravel-9-rest-api-authentication-using-sanctum-tutorialexample.html)
- [Curso completo Laravel versão 10 em português](https://academy.especializati.com.br/curso/laravel-10-gratuito).
