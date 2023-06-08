@extends('grade10student.navigation')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Honoor Roll Ranking') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>  
                    @endif

                    {{Auth::user()->username}}
                    <br>
                    {{$msg}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('pagetitle')
    <a class="navbar-brand" href="#pablo">Honor Roll Ranking</a>
@endsection