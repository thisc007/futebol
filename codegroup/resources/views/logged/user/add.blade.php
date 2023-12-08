@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="font-weight-bold">Inserir dados</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                    @endif
                    <form action="{{ route('user-record') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="last_access_date" value="{{ date('Y-m-d h:i:s') }}">
                        <div class="row">
                            <div class="col-lg-5 form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" name="name" placeholder="Ex.: João Pedro"
                                    @error('name') is-invalid @enderror required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-7 form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" name="email"
                                    placeholder="Ex.: email@dominio.com.br" @error('email') is-invalid @enderror required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>
                        <div class="row">

                            <div class="col-lg-3 form-group">
                                <label for="password">Senha</label>
                                <input type="password" class="form-control" name="password"
                                    @error('password') is-invalid @enderror required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="password_confirmation">Confirmar senha</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    @error('password_confirmation') is-invalid @enderror required>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
