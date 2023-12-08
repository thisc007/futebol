@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="font-weight-bold">Inserir dados</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('player-record') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-3 form-group">
                                <label for="first_name">Nome</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Ex.: João Pedro"
                                    @error('first_name') is-invalid @enderror required>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-3 form-group">
                                <label for="last_name">Último nome</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Ex.: Almeida"
                                    @error('last_name') is-invalid @enderror required>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-2 form-group">
                                <label for="phone">Contato</label>
                                <input type="text" class="form-control phone" name="phone" placeholder="Número do telefone com DDD"
                                    required>

                            </div>

                            <div class="col-lg-2 form-group">
                                <label for="is_goalkeeper">É Goleiro?</label>
                                <select name="is_goalkeeper" id="is_goalkeeper"  class="form-control phone">
                                    <option value="0">NÃO</option>
                                    <option value="1">SIM</option>
                                </select>

                            </div>
                            <div class="col-lg-2 form-group">
                                <label for="level">Nível</label>
                                <select name="level" id="level"  class="form-control phone" style="font-family: 'FontAwesome'">
                                    <option value="5">&#xf005;&#xf005;&#xf005;&#xf005;&#xf005;</option>                                    
                                    <option value="4">&#xf005;&#xf005;&#xf005;&#xf005;</option>
                                    <option value="3">&#xf005;&#xf005;&#xf005;</i></option>
                                    <option value="2">&#xf005;&#xf005;</i></option>
                                    <option value="1">&#xf005;</i></option>
                                </select>

                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-10"></div>
                            <div class="col-lg-2  form-group">
                                <button class="btn btn-success btn-icon-split"> <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Adicionar</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
