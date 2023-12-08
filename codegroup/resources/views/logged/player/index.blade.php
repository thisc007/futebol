@extends('layouts.app')

@section('content')
    <legend>Jogadores</legend>
    <div class="row">
        <div class="col-lg-2">
            <a class="btn btn-icon-split btn-primary " href="{{ route('player-add') }}"><span class="icon"><i
                        class="fa fa-plus"></i></span>&nbsp;<span class="icon">Adicionar</span></a>
        </div>
        <div class="col-lg-3">
            <a class="btn btn-icon-split btn-secondary " href="{{ route('player-addfake') }}"><span class="icon"><i
                        class="fa fa-plus"></i></span>&nbsp;<span class="icon">Criar jogador fake (linha)</span></a>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-lg-12">
            <table id="players" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Contato</th>
                        <th>Nível</th>
                        <th>Goleiro?</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($players as $key => $p)
                        <tr>
                            <td>{{  $key + 1 }}</td>
                            <td>{{  $p->first_name }}</td>
                            <td>{{  $p->last_name }}</td>
                            <td>{{  $p->phone }}</td>
                            <td>@for($i=0;$i<$p->level; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </td>
                            <td>{{  $p->is_goalkeeper ? 'SIM' : 'NÃO' }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
