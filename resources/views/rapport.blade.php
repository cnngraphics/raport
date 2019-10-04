@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-push-8">
            <div class="card">
                <div class="card-header">Rapports - {{ $rapport->thisYear ??'' }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="menu p-2 m-1 w-100%">
                        <a href="/create-rapport">
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
                                <th>Placements</th>
                                <th>Videos</th>
                                <th>Visits</th>
                                <th>Studies</th>
                                <th>Comments</th>
                                
                            </th>
                            @foreach( $rapports as $rapport)  
                                <tr>
                                    <td>{{ $rapport->month??'' }}</td>
                                    <td>{{ $rapport->year??'' }}</td>
                                    <td>{{ $rapport->Hours??'' }}</td>
                                    <td>{{ $rapport->Placements??'' }}</td>
                                    <td>{{ $rapport->Videos??'' }}</td>
                                    <td>{{ $rapport->Visits??'' }}</td>
                                    <td>{{ $rapport->Studies??'' }}</td>
                                    <td>{{ $rapport->comments??'' }}</td>
                                    

                                </tr>                             
                            @endforeach
                        </table>

                    
                </div>
            </div>
        </div>
        <div class="col-md-4  col-md-pull-4">
        <div class="card">
                <div class="card-header">Rapports - {{ $rapport->thisMonth ??'' }} {{ $rapport->thisYear ??'' }}</div>
                <div class="card-body">
                    Chart comes here

                    <script>   
                        const co = require('co');
                        const generate = require('node-chartist');

                        co(function * () {

                        // options object
                        const options = {width: 400, height: 200};
                        const data = {
                            labels: ['a','b','c','d','e'],
                            series: [
                            [1, 2, 3, 4, 5],
                            [3, 4, 5, 6, 7]
                            ]
                        };
                        const bar = yield generate('bar', options, data); //=> chart HTML


                        // options function
                        const options = (Chartist) => ({width: 400, height: 200, axisY: { type: Chartist.FixedScaleAxis } });
                        const data = {
                            labels: ['a','b','c','d','e'],
                            series: [
                            [1, 2, 3, 4, 5],
                            [3, 4, 5, 6, 7]
                            ]
                        };
                        const bar = yield generate('bar', options, data); //=> chart HTML

                        });
                    
                    </script>
                </div>
        </div>
    </div>
</div>
@endsection
