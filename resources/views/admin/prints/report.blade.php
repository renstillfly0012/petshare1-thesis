@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb" class="d-none d-lg-block">
    <ol class="breadcrumb bg-transparent justify-content-end p-0">
                                      <li class="breadcrumb-item text-capitalize"><a href="/home">Admin</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><a href="/reports">Reports</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><strong>List</strong></li>
                            </ol>
  </nav>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Reports and their information</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-md-12">
             
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
                                        aria-label="Rendering engine: activate to sort column descending">Report ID
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Report Image</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Mobile Number</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Incident Report</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">Location</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Report Type</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Report Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">Submitted Date</th>
                                   </tr>
                            </thead>
                            <tbody>
                              
                                @foreach($reports as $report)
                                <tr role="row" class="odd text-center">
                                    <td class="sorting_1">{{$report->id}}</td>
                                   
                                    <td>{{$report->user_id != null ? $report->user->name : $report->name}}</td>
                                 
                                    <td><img src="/assets/images/reports/{{ $report->image }}" alt="User Image"
                                        class="img-responsive rounded-circle" height="129" width="129"></td>
                                        <td>{{$report->email}}</td>
                                        <td>{{$report->mobile_number}}</td>
                                    <td>{{$report->description}}</td>
                                    <td>{{$report->address}}</td>
                                    <td>{{$report->report_type}}</td>
                                    <td>{{$report->report_status}}</td>
                                    <td>{{$report->created_at}}</td>
                                  
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
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            <ul class="pagination">
                                {{ $reports->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection


<script type="text/javascript">
    window.onload = function() { window.print(); }
    window.onafterprint = function(){
        window.close();
  // console.log("Printing completed...");
}

</script>
