@extends('layouts.app')

@section('content')
    <legend>Usuários</legend>
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-icon-split btn-primary " href="{{ route('user-add') }}"><span class="icon"><i
                        class="fa fa-plus"></i></span>&nbsp;<span class="icon">Adicionar</span></a>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-lg-12">
            <table id="users" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>E-mail</th>

                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $u)
                        <tr>
                            <td><?= $key + 1 ?> </td>
                            <td><?= $u->name ?></td>
                            <td><?= $u->email ?></td>



                            <td>
                                <div class="row">



                                    <a class="btn btn-circle btn-sm btn-warning" href="{{ route('user-edit', $u->id) }}"
                                        title="Alterar dados"><i class="fas fa-pen"></i></a>&nbsp;&nbsp;

                                    <a href="{{ route('user-delete', $u->id) }}" class="btn btn-circle btn-sm btn-danger"
                                        onclick="
                                                    var result = confirm('Você quer deletar {{ $u->name }}?');
                                                    
                                                    if(result){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $u->id }}').submit();
                                                    }else{
                                                        return false;
                                                    }">


                                        <i class="fas fa-trash"></i>
                                    </a>

                                    <form method="POST" id="delete-form-{{ $u->id }}"
                                        action="{{ route('user-delete', $u->id) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                    </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
