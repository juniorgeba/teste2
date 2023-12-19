@extends('sistema.tema')
@section('title', 'Equipe')
@section('content')
    @if(session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif
    <?php
    //        echo '<pre>';
    //        var_dump($_SERVER);
    //        var_dump($_SERVER['REQUEST_URI']);
    ?>

    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">Cadastrar novo membro da equipe</div>
                </div>
            </header>
            <div class="card-text h-full ">
                <form class="space-y-4" action="{{ route('profile.add') }}" method="post">
                    @csrf
                    <div class="input-area relative">
                        <label for="name" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" placeholder="Nome Completo" id="name" name="name">
                    </div>
                    <div class="input-area relative">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" placeholder="CPF" id="cpf" name="cpf">
                    </div>
                    <div class="input-area relative">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" placeholder="E-mail" id="email" name="email">
                    </div>
                    <div class="input-area relative">
                        <label for="unidade" class="form-label">Unidade</label>
                        <input type="text" class="form-control" placeholder="Unidade de Trabalho" id="unidade" name="unidade">
                    </div>
                    <div class="input-area">
                        <label for="perfil" class="form-label">Perfil de Acesso</label>
                        <select id="perfil" class="form-control" name="perfil">
                            <option value="" class="dark:bg-slate-700">Selecione...</option>
                            <option value="user" class="dark:bg-slate-700">Usuário comum</option>
                            <option value="superuser" class="dark:bg-slate-700">Coordenador</option>
                        </select>
                    </div>
                    <div class="input-area relative">
                        <label for="largeInput" class="form-label">Senha</label>
                        <input type="password" class="form-control" placeholder="" id="password" name="password">
                    </div>
                    <button class="btn inline-flex justify-center btn-dark">Cadastrar</button>
                    <a href="{{ route('profile.index')  }}" class="btn inline-flex justify-center btn-warning">Voltar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
