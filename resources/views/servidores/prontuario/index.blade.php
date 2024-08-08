@extends('layouts.layoutMaster')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h4>{{ $aluno->usuario->name }}</h4>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Cadastrar
                    </button>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastrar prontuário</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('servidores.prontuario.store', $aluno->id) }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6>Terapia</h6>
                                                <textarea class="form-control w-100" name="terapia">{{ $prontuario->terapia ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6>Medicação</h6>
                                                <textarea class="form-control w-100" name="medicacao">{{ $prontuario->medicacao ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6>Observacao</h6>
                                                <textarea class="form-control w-100" name="observacao">{{ $prontuario->observacao ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <br>
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
            <div class="row">
                <div class="col-md-12">
                    <h6>Terapia</h6>
                    <textarea class="form-control w-100" disabled>{{ $prontuario->terapia ?? '' }}</textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <h6>Medicação</h6>
                    <textarea class="form-control w-100" disabled>{{ $prontuario->medicacao ?? '' }}</textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <h6>Observacao</h6>
                    <textarea class="form-control w-100" disabled>{{ $prontuario->observacao ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
@endsection