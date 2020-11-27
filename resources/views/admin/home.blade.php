@extends('layouts.admin')

<style>
    .card-body {
        background: rgb(14, 64, 30);
        background: linear-gradient(180deg, rgba(14, 64, 30, 1) 0%);
        color: #fdc370;
    }

    .card-footer{
        font-size:22px;
    }
    .card-body > p {
        font-size:18px;
    }
  
   

</style>
@section('Notification_Count')
@if($notifications->count() > 0)
({{$notifications->count()}}) 
@endif
@endsection
@section('refresh')
<meta http-equiv="refresh" content="5">
@endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">


                        <div class="card-body ">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            
                            @forelse ($notifications as $notification)
                          
                           
                            {{-- @if($notification->type == 'App\Notifications\newUserNotification')
                            <div class="alert alert-success" role="alert">
                               <span style="color: black; font-size:18px">
                                [{{$notification->created_at}}] 
                                <br>
                                User: {{$notification->data['name']}} 
                                (Email: {{ $notification->data['email'] }}) has just registered.
                            
                            
                            </span>
                                <a style="color: black; font-size:18px" href="#" class="float-right markbtn" data-id="{{ $notification->id }}">
                                Mark as read
                                </a> --}}
                            @if($notification->type == 'App\Notifications\newReportNotification')
                            <div class="alert alert-danger" role="alert">
                            <span style="color: black; font-size:18px">
                                Notification:
                                <br>
                                [{{$notification->created_at}}] 
                                <br>
                                Foster Name: {{$reportName->first()->name}}
                                <a style="color: black; font-size:18px" href="#" class="float-right markbtn" data-id="{{ $notification->id }}">
                                Mark as read
                                </a>
                                <br>
                                (Address: {{ $notification->data['address'] }}) 
                            </span>
                            @endif
                           </div>
                                {{-- @if($loop->last)
                                <a style=" font-size:18px"href="#" id="mark-all">
                                    Mark all as read
                                </a>
                                @endif --}}
                             @empty
                            There are no new notifications
                            @endforelse
                          
                           {{-- <p> {{ __('You are logged in!') }} </p> --}}
                            <span class="flag-icon flag-icon-gr"></span>
                            <span class="flag-icon flag-icon-gr flag-icon-squared"></span>
                            <i class="ion-ios-paper-plane-outline"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"> Users</div>
    
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <h1>{{ $chart1->options['chart_title'] }}</h1>
                                {!! $chart1->renderHtml() !!}
                            </div>
                            <!-- /.card-body  -->
                            <div class="card-footer">
                                <p>  Total: {{ $userCount }}</p>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"> Pets</div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <h1>{{ $chart4->options['chart_title'] }}</h1>
                                {!! $chart4->renderHtml() !!}
                            </div>
                            <!-- /.card-body  -->
                            <div class="card-footer">
                                <p>Total: {{ $petCount }}</p>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"> Incident Reports</div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <h1>{{ $chart3->options['chart_title'] }}</h1>
                                {!! $chart3->renderHtml() !!}
                            </div>
                            <!-- /.card-body  -->
                            <div class="card-footer">
                                <p> Total: {{ $reportCount }}</p>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"> Appointments</div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <h1>{{ $chart2->options['chart_title'] }}</h1>
                                {!! $chart2->renderHtml() !!}
                            </div> 
                            <!-- /.card-body  -->
                            <div class="card-footer">
                                <p>Total: {{ $appointmentCount }}</p> 
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>


        </div>

        <div id="chart" style="height: 300px;"></div>

    @endsection

    @section('notification_script')
    <script type="text/javascript">
        $(document).ready(function() {
            function sendMarkRequest(id = null) {
            return $.ajax("/home/"+id, {
                method: 'GET',
                data: {
                    id
                }
            });
        }
            
            $('.markbtn').click(function() {
                let request = sendMarkRequest($(this).data('id'));
                request.done(() => {
                    $(this).parents('div.alert').remove();
                });
            });

            $('#mark-all').click(function() {
            let request = sendMarkRequest();
            request.done(() => {
                $('div.alert').remove();
            });
        });

            
        });
    </script>

    @endsection

    @section('javascript')
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
    {!! $chart2->renderJs() !!}
    {!! $chart3->renderJs() !!}
    {!! $chart4->renderJs() !!}
    @endsection

    @section('javascript')
    const chart = new Chartisan({
        el: '#chart',
        url: "@chart('sample_chart')",
      });
    @endsection

    