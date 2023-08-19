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
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#list"><i class="fa fa-list-ul"></i>Product Category List</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addnew"><i class="fa fa-plus"></i> Add New Category</a></li>
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
                                <h3 class="card-title">View All Product Categories</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <!--<th>#</th>-->
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Sub-Category</th>
                                                <th>Slug</th>
                                                <th>Menu Section</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                            <tr>
                                                <td class="text-capitalize">{{ $category->name }}</td>
                                                <td>
                                                    @if($category->image == '')
                                                    Image Not Found!
                                                    @else
                                                    <img src="{{ asset('ab_admin/category/'.$category->image) }}" width="80" style="border: 1px solid lightgray; padding:5px;" alt="Avatar">
                                                    @endif
                                                    </td>
                                                    <td class="text-capitalize">
                                                        @empty($category->parentcategory)
                                                        Parent
                                                        @else
                                                        {{ $category->parentcategory->name }}
                                                        @endempty
                                                      
                                                </td>
                                                <td>{{ $category->keyword }}</td>
                                                <td>@if($category->section_id == 1)
                                                    Machine
                                                    @else
                                                    Acceessories
                                                    @endif
                                                </td>
                                                <td class="text-capitalize">{{ $category->description }}</td>
                                                <td>
                                                    <label class="custom-switch m-0">
                                                        <input type="checkbox" value="0" {{($category->status == 1?'checked':'')}} class="custom-switch-input admin-change-status-user" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </td>
                                                <td class="d-flex">
                                                    <form action="/admin/edit-category" method="post" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $category->id }}">
                                                        <button class="btn btn-primary btn-sm">Edit</button>
                                                    </form>
                                                    |  <form action="/admin/delete-category" method="post" class="d-inline">
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
                                                <!--<th>#</th>-->
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Sub-Category</th>
                                                <th>Slug</th>
                                                <th>Menu Section</th>
                                                <th>Description</th>
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
                    <div class="tab-pane fade" id="addnew" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Add Category</h3>

                                    </div>
                                    <form class="card-body" method="post" action="{{url('/admin/add-category')}}" enctype="multipart/form-data">
                                        @csrf()
                                        <div class="row clearfix">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Enter Category Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Keyword</label>
                                                    <input type="text" name="Keyword" class="form-control" placeholder="category Keyword" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label>Select category</label>
                                                <select class="form-control" name="parent_category" class="selectpicker">
                                                    <option value="0">== ROOT ==</option>
                                                    @foreach ($parent_categories as $category)
                                                        @if($category->parent_id == 0)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endif
                                                        @foreach($category->subcategories as $sub_cate)
                                                            <option class="abi-custom-subcate" value="{{ $sub_cate->id }}">&nbsp;&nbsp;&nbsp; &#8594; {{ $sub_cate->name }}</option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label>Select Category Type</label>
                                                <select class="form-control" name="acceesory">
                                                    <option value="1">Machine</option>
                                                    <option value="2">Acceesories</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" name="image" class="form-control" placeholder="image">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label>Status  </label>
                                                    <div class="form-group pt-2">
                                                        <label class="custom-switch m-0">
                                                            <input type="checkbox" name="status" class="custom-switch-input" data-id=""  >
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <div class="input-group mb-3">
                                                        <textarea class="form-control" name="description"></textarea>
                                                    </div>
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
               });
       </script>
@endsection
