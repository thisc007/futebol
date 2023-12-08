@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-lg-12 col-sm-6 col-12">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="font-weight-bold">Dados do Jogo</h5>
                </div>
                <div class="card-body">


                    <div class="row">
                        <div class="col-lg-12">
                            <h5>Configuração</h5>
                            <table class="table table-bordered dataTable">
                                <tr>
                                    <th>Jogadores por time</th>
                                    <td>
                                        {{ $game->playersteam }} Jogadores
                                    </td>
                                    <th>Data de cadastro</th>
                                    <td>
                                        {{ \Carbon\Carbon::parse($game->created_at)->format('d/m/Y') }}
                                    </td>
                                </tr>

                            </table>
                        </div>

                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($players) >= 2*$game->playersteam)
                            <a class="btn btn-icon-split btn-info "
                            href="{{ route('game-team', [$game->id]) }}"><span
                                class="icon"><i class="fa fa-users"></i></span>&nbsp;<span
                                class="icon">Separar times</span></a>

                            @endif
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <h5>Confirmados</h5>
                            
                            <table class="table table-bordered dataTable">
                                <thead>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Contato</th>
                                    <th>Nível</th>
                                    <th>Goleiro?</th>
                                </thead>
                                <tbody id="conf">
                                    @if (is_countable($players) && count($players) > 0)
                                    <?php $key=0; ?>
                                        @while ($key < count($players))
                                        
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ strtoupper($players[$key]->last_name) . ', ' . $players[$key]->first_name }}</td>

                                                <td>{{ $players[$key]->phone }}</td>
                                                <td>
                                                    @for ($i = 0; $i < $players[$key]->level; $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                </td>
                                                <td>{{ $players[$key]->is_goalkeeper ? 'SIM' : 'NÃO' }}</td>

                                            </tr>
                                            <?php $key++; ?>
                                        @endwhile
                                    @endif
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <h5>Ainda não confirmou</h5>
                            <table class="table table-bordered dataTable">
                                <thead>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Contato</th>
                                    <th>Nível</th>
                                    <th>Goleiro?</th>
                                    <th>Ação</th>
                                </thead>
                                <tbody id="nconf">
                                    @foreach ($playersnconf as $key => $p)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ strtoupper($p->last_name) . ', ' . $p->first_name }}</td>

                                            <td>{{ $p->phone }}</td>
                                            <td>
                                                @for ($i = 0; $i < $p->level; $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                            </td>
                                            <td>{{ $p->is_goalkeeper ? 'SIM' : 'NÃO' }}</td>
                                            <td>
                                                <a class="btn btn-icon-split btn-secondary "
                                                    href="{{ route('game-presence', [$p->id, $game->id]) }}"><span
                                                        class="icon"><i class="fa fa-plus"></i></span>&nbsp;<span
                                                        class="icon">Confirmar presença</span></a>

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
    </div>
@endsection
