@extends('layouts.app')

@section('script')
<script>
    var url = "{{url('stock/chart')}}";
    var Years = new Array();
    var Labels = new Array();
    var Prices = new Array();
    $(document).ready(function() {
        $.get(url, function(response) {
            response.forEach(function(data) {
                Years.push(data.stockYear);
                Labels.push(data.stockName);
                Prices.push(data.stockPrice);
            });
            var ctx = document.getElementById("canvas").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: Years,
                    datasets: [{
                        label: 'Infosys Price',
                        data: Prices,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        });
    });
</script>
@endsection

@section('content')

<div class="container">

    <div class="row">
        <div id="canvas"></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Add Rapports for <b>{{ $thisMonth ??'' }}, {{ $thisYear ??'' }}</b></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="menu p-2 m-1 w-100%">
                        <form method="POST" action="/rapport-save">
                            @csrf

                            <!-- Month	Year	Hours	Placements	Videos	Visits	Studies	Comments -->
                            <div class="card-body">

                                @csrf
                                <div class="form-group">
                                    <h4 class="panel-title">{{ $thisMonth }}, {{ $thisYear  }} </h4>
                                </div>
                                <input type="hidden" name="Month" required class="form-control" value="{{ $thisMonth}}">
                                <input type="hidden" name="Year" required class="form-control" value="{{ $thisYear}}">

                                <div class="form-group">
                                    <div class="from-control">
                                        <span class="input-group-addon">Hours</span>
                                        <input type="text" name="Hours" required class="form-control" value="5">
                                    </div>
                                    <div class="from-control">
                                        <span class="input-group-addon">Placements</span>
                                        <input type="text" name="Placements" required class="form-control" value="4">
                                    </div>
                                    <div class="from-control">
                                        <span class="input-group-addon">Videos</span>
                                        <input type="text" name="Videos" required class="form-control" value="3">
                                    </div>
                                    <div class="from-control">
                                        <span class="input-group-addon">Visits</span>
                                        <input type="text" name="Visits" required class="form-control" value="2">
                                    </div>
                                    <div class="from-control">
                                        <span class="input-group-addon">Studies</span>
                                        <input type="text" name="Studies" required class="form-control" value="4">
                                    </div>
                                    <div class="from-control">
                                        <span class="input-group-addon">Comments</span>
                                        <input type="text" name="Comments" required class="form-control" value="Comment for this post">
                                    </div>
                                </div>
                                <input type="submit" value="Save Rapport" class="btn btn-info btn-block">
                            </div>
                        </form>

                    </div>
                </div>
            </div>




        </div>
    </div>
</div>
</div>
</div>
@endsection