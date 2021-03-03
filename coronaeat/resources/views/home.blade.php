@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div class="row">
                        <p>
                          <div style="margin-bottom:20px"></div>
                        </p>
                    </div>
                    <div class="button-area mx-auto row">
                        <a href="{{ action('Admin\ShopController@show') }}" role="button" class="btn btn-info mx-auto text-white">start !</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
