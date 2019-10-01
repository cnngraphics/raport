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
                        <a href="/add-rapport">
                            <button class="button btn-primary p-r" href="/addRapport">
                                <i class="fas fa-plus-circle"></i> Ajouter un Rapport
                            </button>
                        </a>
                    </div>
                    

                        <table class="table table-responsive table-stripped">
                            <tr>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Hours</th>
                            </th>
                            @foreach( $rapports as $rapport)        
                                <tr>
                                    <td>{{$rapport->month}}</td>
                                    <td>{{$rapport->year}}</td>
                                    <td>{{$rapport->hours}}</td>
                                </tr>
                            @endforeach
                        </table>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
