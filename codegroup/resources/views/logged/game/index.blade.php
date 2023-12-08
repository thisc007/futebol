@extends('layouts.app')

@section('content')
    <legend>Jogos</legend>
    <div class="row">
        <div class="col-lg-2">
            <a class="btn btn-icon-split btn-primary " href="{{ route('game-add') }}"><span class="icon"><i
                        class="fa fa-plus"></i></span>&nbsp;<span class="icon">Adicionar</span></a>
        </div>
        
    </div>
    <br><br>
    <div class="row">
        <div class="col-lg-12">
            <table id="games" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Data de Cadastro</th>
                        <th>Quantidade de Jogadores</th>                        
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($games as $key => $g)
                        <tr>
                            <td>{{  $key + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($g->created_at)->format('d/m/Y h:i:s') }}</td>
                            <td>{{  $g->playersteam }}</td>
                            
                            <td>
                                <a class="btn btn-circle btn-sm btn-info" href="{{ route('game-view', $g->id) }}"><i
                                        class="fas fa-eye"></i></a>&nbsp;&nbsp;
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
