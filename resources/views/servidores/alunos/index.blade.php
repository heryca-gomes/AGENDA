@extends('layouts.layoutMaster')

@section('content')
    <div class="card">
        <div class="card-header">
            <p>
                <h4>Listando alunos cadastrados</h4>
            </p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Curso</th>
                            <th>Matrícula</th>
                            <th>Prontuário</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($alunos) == 0)
                            <tr>
                                <td colspan="5">
                                    <div class="alert border-info">
                                        Ainda não há alunos cadastrados!
                                    </div>
                                </td>
                            </tr>
                        @else
                            @foreach($alunos as $aluno)
                                <tr>
                                    <td>{{ $aluno->usuario->name }}</td>
                                    <td>{{ $aluno->usuario->email }}</td>
                                    <td>{{ $aluno->curso->descricao}}</td>
                                    <td>{{ $aluno->codigo_matricula }}</td>
                                    <td>
                                        <a href="" class="btn btn-primary">Prontuário</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection