@extends('layouts.admin.app')
@section('mytitle','Dashboard')
@section('content')
<style>
    select option {
    background: #626263;
    color: #fff;
    }
    .abi-custom-subcate{
        background: rgba(0, 0, 0, 0.3);
    }
</style>
<div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex justify-content-between mb-2">
                                    <ul class="nav nav-tabs b-none">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#list"><i class="fa fa-list-ul"></i>Slider List</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addnewslider"><i class="fa fa-plus"></i> Add New Slider</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-body">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="list" role="tabpanel">
                    <div class="row clearfix">
                    <div class="col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">View All Slider</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <!--<th>#</th>-->
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pcategories as $category)
                                            <tr>
                                                <td class="text-capitalize">{{ $category->getCategory->name }}</td>
                                                <td>
                                                    @if($category->getCategory->image == '')
                                                    Image Not Found!
                                                    @else
                                                    <img src="{{ asset('ab_admin/category/'.$category->getCategory->image) }}" width="80" style="border: 1px solid lightgray; padding:5px;" alt="Avatar">

                                                    @endif
                                                </td>
                                                <td>
                                                    <label class="custom-switch m-0">
                                                        <input type="checkbox" value="0" {{($category->status == '1' ?'checked':'')}} class="custom-switch-input admin-change-status-populer-category" data-id="{{ $category->id }}" data-toggle="toggle" data-onstyle="outline-success" >
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </td>
                                                <td >
                                                   <form action="/admin/delete-populer-category" method="post" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $category->id }}">
                                                        <button class="btn btn-danger btn-sm">Del</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="tab-pane fade" id="addnewslider" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header"><h3 class="card-title">Add Slider</h3></div>
                                    <form class="card-body" method="post" action="{{url('/admin/add-populer-category')}}" enctype="multipart/form-data">
                                        @csrf()
                                        <div class="row clearfix">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Select Most Populer Category</label>
                                                    <select class="form-control" name="category_id" class="selectpicker">
                                                        @foreach ($categories as $category)
                                                            <option class="text-capitalize" value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label>Status</label>
                                                <div class="form-group pt-2">
                                                    <label class="custom-switch m-0">
                                                        <input type="checkbox"  name="status" class="custom-switch-input" data-id="">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="submit" class="btn btn-outline-secondary">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $('#example').DataTable({
                    scrollX: true,
                    responsive: true
                });


                $(".admin-change-status-populer-category").on("change", function() {
                var sliderId = $(this).data("id");
                var isChecked = $(this).prop("checked");

                $.ajax({
                    type: "POST",
                    url: "{{ route('updatePopulerCategoryStatus') }}",
                    data: {
                        id: sliderId,
                        status: isChecked ? 1 : 0,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        // Handle success, update UI or show a message
                        alert(response.message);
                    },
                    error: function(xhr) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            });
            });
       </script>

@endsection
