<a id="readme-top"></a>

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Issues][issues-shield]][issues-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

<br> 
<div align="center">
    <h3 align="center">🛒 E-commerce Fortify</h3> 
    <p align="center"> Plataforma digital de e-commerce desenvolvida com Laravel, Fortify, PHP, TailwindCSS e MySQL. <br> 
    <a href="https://github.com/Matvops/e-commerce-fortify"><strong>Veja o código »</strong></a> 
    <br><br> 
    <a href="https://github.com/Matvops/e-commerce-fortify/issues/new?labels=bug">Reportar Bug</a> · <a href="https://github.com/Matvops/e-commerce-fortify/issues/new?labels=enhancement">Sugerir Funcionalidade</a> </p> 
</div>



<!-- TABLE OF CONTENTS -->
<details> 
    <summary>📑 Sumário</summary> 
    <ol> 
        <li>
            <a href="#about-the-project">Sobre o Projeto</a>
        </li> 
        <li>
            <a href="#built-with">Tecnologias Utilizadas</a>
        </li> 
        <li>
            <a href="#requirements">Requisitos</a>
        </li> 
        <li>
            <a href="#installation">Instalação</a>
        </li> 
        <li>
            <a href="#usage">Exemplos de Uso</a>
        </li> 
        <li>
            <a href="#roadmap">Planejamento</a>
        </li> 
        <li>
            <a href="#contributing">Contribuindo</a>
        </li> 
        <li>
            <a href="#contact">Contato</a>
        </li> 
    </ol> 
</details>



<!-- ABOUT THE PROJECT -->
<br>
<h1 id="about-the-project"> 📖 Sobre o Projeto </h1>

O E-commerce Fortify é uma aplicação web desenvolvida com o objetivo de praticar e aplicar conceitos de autenticação, arquitetura MVC, rotas, controllers, views e integração de templates Blade com TailwindCSS.

Funcionalidades incluem:

    Cadastro, listagem, edição e exclusão de produtos

    Interface responsiva com TailwindCSS

    Autenticação com Laravel Fortify

    Integração com banco de dados relacional (MySQL)

    Organização modular de controllers e rotas

Este projeto é um estudo prático das funcionalidades principais de uma plataforma de e-commerce, focando na base estrutural e boas práticas com Laravel.

<p align="right">(<a href="#readme-top">voltar ao topo</a>)</p>


<br>
<h1 id="built-with">🛠️ Tecnologias Usadas</h1>
<br>

[![PHP][PHP.com]][PHP-url]
<br>
[![Laravel][Laravel.com]][Laravel-url]
<br>
[![Tailwind][Tailwind.com]][Tailwind-url]
<br>
[![MySQL][MySql.com]][MySql-url]
<br>
[![VsCode][VsCode.com]][VsCode-url]
<br>
[![Ubuntu][Ubuntu.com]][Ubuntu-url]


<p align="right">(<a href="#readme-top">voltar ao topo</a>)</p>


<br>
<h1 id="requirements">✅ Requisitos</h1>

Antes de começar, você precisa ter instalado:

    PHP 8.x+

    Composer

    MySQL

    Node.js e NPM (para compilar o TailwindCSS)

    Laravel CLI

<p align="right">(<a href="#readme-top">voltar ao topo</a>)</p>
<br>
<h1 id="installation">⚙️ Instalação</h1>

Clone o repositório:

    git clone https://github.com/Matvops/e-commerce-fortify.git

    cd e-commerce-fortify

Instale as dependências PHP:

    composer install

Instale as dependências front-end:

    npm install && npm run dev

Crie e configure seu arquivo .env:

    cp .env.example .env

    php artisan key:generate

Para usar imagens 

    php artisan storage:link

Configure o banco de dados no .env e rode as migrações:

    php artisan migrate

Inicie o servidor local:

    php artisan serve

<p align="right">(<a href="#readme-top">voltar ao topo</a>)</p>

<br>
<h1 id="usage">📸 Funcionalidades</h1>

Abaixo estão algumas funcionalidades do projeto.

<h3>• Login <br>• Cadastro</h3>
<div>
    <img src="https://github.com/user-attachments/assets/434e1911-6512-4f32-ab17-3c92f1d01b29" width="49%">
    <img src="https://github.com/user-attachments/assets/208d513f-c9c7-4da1-ae69-f25d7a78d8a3" width="49%">
</div>

<br>

<h2>• Recuperar conta <br>• Redefinir senha</h2>
<div>
    <img src="https://github.com/user-attachments/assets/8c8ff991-3461-410a-86cf-eef6de747538" width="49%">
    <img src="https://github.com/user-attachments/assets/a7f5a220-dc27-4d2b-a007-7a6c1732b43e" width="49%">
</div>

<br>

<h2>• Listar produtos <br>• Pesquisar/Filtrar <br>• Adicionar protudos ao carrinho</h2>
<div>
    <img src="https://github.com/user-attachments/assets/6aab1bb4-1a53-4146-80f8-0d5f006490b1" width="49%">
    <img src="https://github.com/user-attachments/assets/1813ed91-a210-4a7b-9a14-8142790e0789" width="49%">
</div>

<br>

<h2>• Remover produtos do carrinho <br>• Finalizar pedido <br>• Listar produtos do carrinho</h2>
<div>
    <img src="https://github.com/user-attachments/assets/14b8b790-2412-49a3-a270-337a1c4e9af6">
</div>

<br>

<h2>• Listar pedidos <br>• Atualizar email e nome de usuário</h2>
<div>
    <img src="https://github.com/user-attachments/assets/ef629bca-026d-4474-8f21-abcfd4ad491a">
</div>

<br>

<p align="right">(<a href="#readme-top">voltar ao topo</a>)</p>


<br>
<h1 id="roadmap">🛣️ Planejamento</h1>

[x] - Estrutura base com Laravel

[x] - Autenticação com Laravel Fortify

[x] - Carrinho de compras

[x] - Finalização de pedidos

[x] - Histórico de compras

[ ] - Sistema de autorização

[ ] - Painel administrativo

<p align="right">(<a href="#readme-top">voltar ao topo</a>)</p>


<br>
<h1 id="contributing">🤝 Contribuindo</h1>

    Faça um fork do projeto

    Crie sua branch com a feature (git checkout -b feature/NovaFuncionalidade)

    Commit suas alterações (git commit -m 'Adiciona nova funcionalidade')

    Dê push na branch (git push origin feature/NovaFuncionalidade)

    Abra um Pull Request

<p align="right">(<a href="#readme-top">voltar ao topo</a>)</p>


<br>
<h1 id="contact">📬 Contato</h1>

Matheus Cadenassi - @Matvops

Link do projeto: https://github.com/Matvops/e-commerce-fortify
<p align="right">(<a href="#readme-top">voltar ao topo</a>)</p>


[contributors-shield]: https://img.shields.io/github/contributors/matvops/Biblioteca-Digital?style=for-the-badge
[contributors-url]: https://github.com/Matvops/Biblioteca-Digital/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/matvops/Biblioteca-Digital?style=for-the-badge
[forks-url]: https://github.com/Matvops/Biblioteca-Digital/network/members
[issues-shield]: https://img.shields.io/github/issues/matvops/Biblioteca-Digital?style=for-the-badge
[issues-url]: https://github.com/Matvops/Biblioteca-Digital/issues
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/matheus-cadenassi-799125321/
[product-screenshot]: images/screenshot.png
[PHP.com]: https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white
[PHP-url]: https://www.mysql.com/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[Tailwind.com]: https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white
[Tailwind-url]: https://tailwindcss.com/
[MySql.com]: https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white
[MySql-url]: https://www.mysql.com/
[VsCode.com]: https://img.shields.io/badge/Visual%20Studio%20Code-0078d7.svg?style=for-the-badge&logo=visual-studio-code&logoColor=white
[VsCode-url]: https://www.mysql.com/
[Ubuntu.com]: https://img.shields.io/badge/Ubuntu-E95420?style=for-the-badge&logo=ubuntu&logoColor=white
[Ubuntu-url]: https://www.mysql.com/
