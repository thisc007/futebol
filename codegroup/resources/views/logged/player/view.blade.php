@extends('layouts.app')

@section('content')
    <div class="row">
        
        <div class="col-lg-12 col-sm-6 col-12">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="font-weight-bold">Dados de visitante</h5>
                </div>
                <div class="card-body">


                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered dataTable">
                                <tr>
                                    <th>Nome Completo</th>
                                    <td>
                                        {{ $visitor->first_name . ' ' . $visitor->last_name }}
                                    </td>
                                    <th>Data Nasc.</th>
                                    <td>
                                        {{ \Carbon\Carbon::parse($visitor->born_date)->format('d/m/Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>E-mail</th>
                                    <td>
                                        {{ $visitor->email }}
                                    </td>
                                    <th>Telefone</th>
                                    <td>
                                        {{ $visitor->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bairro</th>
                                    <td>
                                        {{ $visitor->district }}
                                    </td>
                                    <th>Cidade/UF</th>
                                    <td>
                                        {{ $visitor->city }}
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th>Sexo</th>
                                    <td>
                                        {{ $visitor->gender ? 'Feminino' : 'Masculino' }}
                                    </td>
                                    <th>Estado civil</th>
                                    <td>
                                        @switch($visitor->civilstate)
                                            @case(0)
                                                Solteiro
                                            @break

                                            @case(1)
                                                Casado
                                            @break

                                            @case(2)
                                                Viúvo
                                            @break

                                            @case(3)
                                                Divorciado
                                            @break

                                            @default
                                                Solteiro
                                        @endswitch
                                    </td>
                                </tr>
                                <tr>
                                    <th>Deseja receber informativos?</th>
                                    <td>
                                        {{ $visitor->informatives ? "Sim" : "Não" }}
                                    </td>
                                    <th>Como ficou sabendo da igreja?</th>
                                    <td>
                                        @switch($visitor->knowing)
                                            @case(0)
                                                Não quis informar
                                            @break

                                            @case(1)
                                                Através de amigo/Familiar
                                            @break

                                            @case(2)
                                                Redes Sociais
                                            @break

                                            @case(3)
                                                Mensagem de email/whatsapp
                                            @break

                                            @case(4)
                                                Anúncio TV/Rádio/Internet
                                            @break

                                            @case(5)
                                                Por outro Pastor/Igreja
                                            @break

                                            @case(6)
                                                Site/Google/Bing
                                            @break

                                            @case(7)
                                                Evangelismo
                                            @break

                                            @case(8)
                                                Resido/Trabalho na região
                                            @break

                                            @case(9)
                                                Outro
                                            @break
                                        @endswitch

                                        
                                    </td>
                                </tr>
                                <tr>
                                    <th>Data da visita</th>
                                    <td>
                                        {{ \Carbon\Carbon::parse($visitor->created_at)->format('d/m/Y') }}
                                    </td>
                                    <th>Culto</th>
                                    <td>
                                        @switch($visitor->aboutme)
                                        @case(0)
                                            Culto noturno (18h00m)
                                        @break
        
                                        @case(1)
                                            EBD
                                        @break
        
                                        @case(2)
                                            Conexão com Deus
                                        @break
        
                                        @case(3)
                                            ECO/Culto dos Jovens
                                        @break
        
                                        @case(4)
                                            Evento especial
                                        @break
        
                                        @case(5)
                                            Vigília
                                        @break
        
                                    
                                    @endswitch

                                        
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <th>Sobre mim</th>
                                    <td>
                                        @switch($visitor->aboutme)
                                            @case(0)
                                                Não quis informar
                                            @break

                                            @case(1)
                                                Sou novo na região
                                            @break

                                            @case(2)
                                                Procuro nova igreja
                                            @break

                                            @case(3)
                                                Primeira vez na igreja
                                            @break

                                            @case(4)
                                                Retornando um convite
                                            @break

                                            @case(5)
                                                Outro
                                            @break

                                           
                                        @endswitch

                                        
                                    </td>
                                    <th>Quer oração?</th>
                                    <td>
                                        {{ $visitor->pray ? 'Sim' : 'Não' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Motivos de oração</th>
                                    <td colspan="3">
                                        {{ $visitor->praymotive }}
                                    </td>
                                    
                                </tr>
                            </table>
                        </div>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    @endsection
