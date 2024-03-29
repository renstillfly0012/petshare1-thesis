@extends('layouts.admin')

<style>


</style>

@section('content')
<nav aria-label="breadcrumb" class="d-none d-lg-block">
    <ol class="breadcrumb bg-transparent justify-content-end p-0">
                                      <li class="breadcrumb-item text-capitalize"><a href="/home">Admin</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><a href="/pets">Pets</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><a href="/pethealth/all">Health Records</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><strong>List</strong></li>
                            </ol>
</nav>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Pet's health information</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
 
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-12 ">
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                        aria-describedby="example2_info">
                        <thead>
                            <tr role="row" class="odd text-center">
                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">Pet Health ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Pet Owner</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Pet</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Allergies</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Exisiting Conditions</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                            @foreach($petinfos as $petinfo)
                            <tr role="row" class="odd text-center">
                                <td class="sorting_1">{{$petinfo->id}}</td>
                                
                                <td>{{$petinfo->pet_owner_id != null ? $petinfo->user->name : 'None'}}</td>
                                <td>{{$petinfo->pets->name}}</td>
                                <td>{{$petinfo->pet_allergies}}</td>
                                 <td>{{$petinfo->pet_existing_conditions}}</td>
                                {{-- <td>{{$petinfo->vet_id}}</td> --}}

 
                      
                            </tr>
                            @endforeach
                           
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    {{ $petinfos->links() }}
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                        <ul class="pagination">
                            
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