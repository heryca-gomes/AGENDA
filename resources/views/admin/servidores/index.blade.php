@extends ('layouts.layoutMaster')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row d-flex
            justify-content-end">
                <div class="col-md-3">
                    <x-admin.servidores.create 
                    :cargos="$cargos" />
                </div>
            </div>
        </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Cargo</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($servidores as $servidor)
                        <tr>
                            <td>{{ $servidor->usuario->name }}</td>
                            <td>{{ $servidor->usuario->email }}</td>
                            <td>{{ $servidor->cargo->descricao }}</td>
                            <td>
                                <x-admin.servidores.edit 
                                :cargos="$cargos" 
                                :servidor="$servidor" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
 </div>
@endsection