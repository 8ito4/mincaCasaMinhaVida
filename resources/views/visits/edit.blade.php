@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Visita</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('visits.update', ['id' => $visit->id]) }}">
                        @csrf
                        @method('PATCH')

                        <div class="row mb-3">
                            <label for="broker" class="col-md-4 col-form-label text-md-end">Corretor</label>
                            <div class="col-md-6">
                                <select id="broker" name="broker" class="form-select">
                                    <option value="" disabled selected>Selecione o corretor</option>
                                    @foreach($brokers as $broker)
                                        <option value="{{ $broker->name }}" @if($visit->broker === $broker->name) selected @endif>{{ $broker->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for "client" class="col-md-4 col-form-label text-md-end">Cliente</label>
                            <div class="col-md-6">
                                <select id="client" name="client" class="form-select">
                                    <option value="" disabled selected>Selecione o cliente</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->name }}" @if($visit->client === $client->name) selected @endif>{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="propertie" class="col-md-4 col-form-label text-md-end">Imóvel</label>
                            <div class="col-md-6">
                                <select id="propertie" name="propertie" class="form-select">
                                    <option value="" disabled selected>Selecione o Imóvel</option>
                                    @foreach($properties as $propertie)
                                        <option value="{{ $propertie->title }}" @if($visit->propertie === $propertie->title) selected @endif>{{ $propertie->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">Data e Hora</label>
                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control" id="date" name="date" value="{{ date('Y-m-d\TH:i', strtotime($visit->date)) }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="type" class="col-md-4 col-form-label text-md-end">Tipo</label>
                            <div class="col-md-6">
                                <select id="type" name="type" class="form-select" required>
                                    <option value="Agendado" @if($visit->type === 'Agendado') selected @endif>Agendado</option>
                                    <option value="Não agendado" @if($visit->type === 'Não agendado') selected @endif>Não agendado</option>
                                    <option value="Realizado" @if($visit->type === 'Realizado') selected @endif>Realizado</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Salvar
                                </button>
                                <a href="{{ route('visits.index') }}" type="submit" class="btn btn-secondary">
                                    Voltar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
