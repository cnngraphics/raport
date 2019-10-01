@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rapports - {{ $thisMonth ??'' }} {{ $thisYear ??'' }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="menu p-2 m-1 w-100%">
                        <form method="POST" action="/profile">
                            @csrf
                            <label for="title">Month</label>

                            <input id="month" type="text" class="@error('month') is-invalid @enderror">

                            @error('month')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </form>
                    </div>
                        

                      
                               

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
