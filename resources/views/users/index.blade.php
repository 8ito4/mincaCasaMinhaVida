@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Lista de Usuários</h4>
                    <a href="{{ route('users.new') }}" type="button" class="btn btn-primary px-2 py-1">
                        <i class="bi bi-plus"></i>
                        Cadastrar Usuário
                    </a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">WhatsApp</th>
                            <th scope="col">Data de nascimento</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->whatsapp }}</td>
                                    <td>{{ $user->birthdate }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('users.edit', $user->id) }}" type="button" class="btn btn-info px-2 py-1">
                                                <i class="bi bi-pencil-square p-0"></i>
                                            </a>
                                            @if ($user->id !== auth()->id())
                                                <form class="mx-1" action="{{ route('users.delete', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger px-2 py-1">
                                                        <i class="bi bi-trash p-0"></i>
                                                    </button>
                                                </form>
                                            @endif
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
