@extends('layouts.layoutMaster')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h4>Listando horários disponibilizados</h4>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Cadastrar
                    </button>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar horário</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('servidor.agenda.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Data *</label>
                                                <input type="date" name="data" class="form-control"/>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Horário *</label>
                                                <input type="time" name="horario" class="form-control"/>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-success w-100" type="submit">Salvar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Horário</th>
                            <th>Status</th>
                            <th>Remover</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($horarios) == 0)
                            <tr>
                                <td colspan="3">
                                    <div class="alert border-info">
                                        Ainda não há horários disponibilizados
                                    </div>
                                </td>
                            </tr>
                        @endif
                        @foreach($horarios as $horario)
                            <tr>
                                <td>{{ $horario->data }}</td>
                                <td>{{ $horario->horario }}</td>
                                <td>
                                    @if($horario->status == 1)
                                        <strong class="text-success">DISPONÍVEL</strong>
                                    @elseif($horario->status == 2)
                                        <strong class="text-danger">AGENDADO</strong>
                                    @elseif($horario->status == 5)
                                        <strong class="text-warning">CANCELADO</strong>
                                    @endif
                                </td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection