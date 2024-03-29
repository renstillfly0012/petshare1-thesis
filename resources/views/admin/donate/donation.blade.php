@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb" class="d-none d-lg-block">
    <ol class="breadcrumb bg-transparent justify-content-end p-0">
                                      <li class="breadcrumb-item text-capitalize"><a href="/home">Admin</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><a href="/donations">Donations</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><strong>List</strong></li>
                            </ol>
  </nav>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Donations and their informations</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-md-12">
                    <div class="float-left ">
                        Filter By:
                        <select  name="form" onchange="location = this.value;">
                        <option value="/donations?order=asc">Ascending</option>  
                        <option value="/donations?order=desc">Descending</option> 
                        <option value="/donations?start=1&end=1000">Amount: 1-1000</option>  
                        <option value="/donations?start=1000&end=100000">Amount: 1000-100,000</option> 
                        <option value="/donations?start=100000&end=1000000">Amount: 100,000-1,000,000</option> 
                        <option value="/donations?all" >All</option> 
                        <option value="/donations">Reset</option>
                        <option value="/donations" selected style="display: none"   ></option>
                    </select>
                    <br>
                    <button class="btn bg-maroon btn-flat mt-2" id="printQuery" onclick="printByQuery()" target="_blank" >PRINT PDF</button>
                    </div>
           
       

                
              
                        <div class="float-right" id="datepicker">
                            Filter By:
                            <input style="font-size:20px" id="select_date" type="date" class="form-control mb-2" >
                            <button class="btn bg-navy btn-flat mb-2 float-right" id="submitDate" href="" onclick="filterByDate()" >Filter By Date</button>
                        </div>
                      

                      
                    </div>
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                        aria-describedby="example2_info">
                        <thead>
                            <tr role="row" class="odd text-center">
                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">Donation ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Donation Email</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Donation Amount</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Currency</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Transaction ID</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donations as $donation)
                            <tr role="row" class="odd text-center">
                                <td class="sorting_1">{{$donation->id}}</td>
                                <td>{{$donation->donation_name}}</td>
                                <td>{{$donation->donation_email}}</td>
                                <td>{{$donation->donation_amount}}</td>
                                <td>{{$donation->currency}}</td>
                                <td>{{$donation->donation_transaction_id}}</td>

                                <td>
                                    {{ $donation->created_at }}
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                   
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                   
                </div>
                <div class="col-sm-12 col-md-7">
                    {{ $donations->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>

@endsection

<script>
    function filterByDate(){
       
        var date = document.getElementById("select_date").value;
    window.location.href = "/donations?date="+date;
   
    }

    function printByQuery(){
            var url = window.location.href;
            var newUrl = url.substring(url.indexOf("?"));
        console.log(newUrl == url);
            if(newUrl != url){
        window.open("/print/donations"+newUrl);
            }
        
        }

    
    
    </script>
