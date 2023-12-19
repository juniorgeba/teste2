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
        <header class=" card-header noborder">
            <h4 class="card-title"></h4>
        </header>
        <div class="card-body px-6 pb-6">

            <a href="{{ route('profile.create') }}" class="btn inline-flex justify-center btn-primary">Adicionar Novo</a>

            <div class="overflow-x-auto -mx-6 dashcode-data-table">
                <span class=" col-span-8  hidden"></span>
                <span class="  col-span-4 hidden"></span>
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <table
                            class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                            <thead class=" bg-slate-200 dark:bg-slate-700">
                            <tr>
                                <th scope="col" class=" table-th ">
                                    #ID
                                </th>
                                <th scope="col" class=" table-th ">
                                    NOME
                                </th>
                                <th scope="col" class=" table-th ">
                                    CPF
                                </th>
                                <th scope="col" class=" table-th ">
                                    EMAIL
                                </th>
                                <th scope="col" class=" table-th ">
                                    PERFIL DE ACESSO
                                </th>
                                <th scope="col" class=" table-th ">
                                    UNIDADE
                                </th>
                                <th scope="col" class=" table-th ">
                                    STATUS
                                </th>
                                <th scope="col" class=" table-th ">
                                    AÇÕES
                                </th>
                            </tr>
                            </thead>
                            <tbody
                                class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                            @foreach($users as $user)
                                <tr>
                                    <td class="table-td">{{$user->id}}</td>
                                    <td class="table-td ">{{$user->name}}</td>
                                    <td class="table-td ">{{$user->cpf}}</td>
                                    <td class="">{{$user->email}}</td>
                                    <td class="table-td">{{ ($user->perfil == 'user') ? "Usuário Comum" : (($user->perfil == 'superuser') ? "Coordenador" : "Vigilância")  }}</td>
                                    <td class="">{{$user->unidade}}</td>
                                    <td class="table-td">
                                        <div
                                            class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] <?= $user->status == 'ativo' ? 'bg-opacity-25 text-success-500 bg-success-500' : 'bg-opacity-25 text-warning-500 bg-warning-500'; ?>">
                                            {{ $user->status }}
                                        </div>
                                    </td>
                                    <td class="table-td ">
                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                            <button class="btn inline-flex justify-center btn-secondary btn-sm">
                                            <span class="flex items-center">
                                                <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                <span>Editar</span>
                                            </span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
