@extends('layouts.admin.app')
@section('mytitle','Dashboard')
@section('content')
<div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex justify-content-between mb-2">
                                    <ul class="nav nav-tabs b-none">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#list"><i class="fa fa-list-ul"></i>Edit Product Category</a></li>
                                        
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
                    <div class="tab-pane fade show active" id="addnew" role="tabpanel">
                    
            </div>
                    <div class="tab-pane fade active show" id="addnew" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Category</h3>

                                    </div>
                                    <form class="card-body" method="post" action="{{url('/admin/update-category')}}" enctype="multipart/form-data">
                                        @csrf()
                                        <div class="row clearfix">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="hidden" name="id" value="{{ $category->id }}" class="form-control" placeholder="Enter Category Name" required>
                                                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Enter Category Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Keyword</label>
                                                    <input type="text" name="Keyword" value="{{ $category->keyword }}" class="form-control" placeholder="category Keyword" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label>Select category</label>
                                                <select class="form-control" name="parent_category">
                                                    <option value="0">== ROOT ==</option>
                                                    @foreach ($categories as $pcategory)
                                                    <option value="{{ $pcategory->id }}" <?php echo($pcategory->id == $category->parent_id)?'selected':'';?>>{{ $pcategory->name }}</option>
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
                                                    <input type="file" name="image" value="{{ $category->image }}" class="form-control" placeholder="image">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label>Status  </label>
                                                    <div class="form-group pt-2">
                                                        <label class="custom-switch m-0">
                                                            <input type="checkbox" value="0" name="status" class="custom-switch-input" data-id="" {{($category->status == 1?'checked':'')}} >
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
    
                                                    </div>
                                                </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <div class="input-group mb-3">
                                                        <textarea class="form-control" name="description">{{ $category->description }}</textarea>
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

@endsection
