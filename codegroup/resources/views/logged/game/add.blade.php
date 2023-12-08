@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="font-weight-bold">Inserir dados</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('game-record') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-4 form-group">
                                <label for="playersteam">Número de jogadores por time</label>
                                <input type="number" min="1"class="form-control" name="playersteam" value="5"> 
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
