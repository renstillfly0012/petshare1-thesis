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

                           <p> {{ __('You are logged in!') }} </p>
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
                        <div class="card ">

                            <!-- /.card-header -->
                            <div class="card-body ">
                               <p> {{ $petCount }}</p>
                            </div>
                            <!-- /.card-body  -->
                            <div class="card-footer">
                                Animal Count
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-md-6">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body ">
                               <p> {{ $reportCount }}</p>
                            </div>
                            <!-- /.card-body  -->
                            <div class="card-footer">
                                Reports
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

                            <!-- /.card-header -->
                            <div class="card-body ">
                              <p>  {{ $userCount }}</p>
                            </div>
                            <!-- /.card-body  -->
                            <div class="card-footer">
                                Users
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-md-6">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body ">
                               <p>{{ $appointmentCount }}</p> 
                            </div> 
                            <!-- /.card-body  -->
                            <div class="card-footer">
                                Requests
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>


        </div>

    @endsection
