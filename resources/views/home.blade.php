@extends('layouts.app')

@section('content')
@include('layouts.particle')
{{-- <div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        <i class=" bi bi-people"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection








