@extends('layouts.layoutMaster')

@section('content')
    <div class="card card-body">
        <div class="col-md-12">
            <div class="row">
                <h2 class="text-center">Horários disponíveis</h2>
            </div>
            <hr>
            <div class="row">
                @if(count($horarios) == 0)
                    <div class="alert border-info text-center">
                        Ainda não há horários disponíveis
                    </div>
                @else
                    @foreach($horarios as $agenda)
                        <div class="col-md-3">
                            <div class="card card-body text-center">
                                <h6>{{ $agenda->data }}</h6>
                                <h1 class="text-success">{{ $agenda->horario }}h</h1>
                                <hr>
                                {{ $agenda->servidor->usuario->name }}
                                <hr>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agenda-{{ $agenda->id }}">
                                    Agendar
                                </button>
                                <div class="modal fade" id="agenda-{{ $agenda->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>
                                                            Confirmar o agendamento de consulta em <strong>{{ $agenda->data }} as {{ $agenda->horario }}</strong>?
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a href="{{ route('aluno.horarios.agendar', $agenda->id) }}" class="btn btn-success w-100">Confirmar</a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection