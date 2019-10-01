@extends('layouts.app')

@section('script')
<script>
        var url = "{{url('stock/chart')}}";
        var Years = new Array();
        var Labels = new Array();
        var Prices = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            response.forEach(function(data){
                Years.push(data.stockYear);
                Labels.push(data.stockName);
                Prices.push(data.stockPrice);
            });
            var ctx = document.getElementById("canvas").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels:Years,
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
                                  beginAtZero:true
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
                <div class="card-header">Add Rapports for Month of- {{ $thisMonth ??'' }} {{ $thisYear ??'' }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="menu p-2 m-1 w-100%">
                        <form method="POST" action="/profile">
                            @csrf

                            <form>
                                <div class="form-group" action="/save-rapport" method="POST">
                                    <label for="month">Month / Mwa</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ $thisMonth ?? '' }}">
                                   
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>


                        </form>
                    </div>
                    <!-- /**
         * Placements (Printed Electronics)
         * Video Showings
         * Hours
         * Return Visits
         * Number of Different Bible Studies Conducted
         * 
         */ -->



                    </form>
                </div>






            </div>
        </div>
    </div>
</div>
</div>
@endsection