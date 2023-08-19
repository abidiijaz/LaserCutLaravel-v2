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
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#addnewslider"> Edit Slider</a></li>
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
                   
                    <div class="tab-pane fade show active" id="addnewslider" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header"><h3 class="card-title">Add Slider</h3></div>
                                    <form class="card-body" method="post" action="{{url('/admin/update-slider')}}" enctype="multipart/form-data">
                                        @csrf()
                                        <div class="row clearfix">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Slider Title</label>
                                                    <input type="hidden" name="id" value="{{ $slider->id }}" class="form-control" placeholder="Enter Slider Title" >
                                                    <input type="text" name="name" value="{{ $slider->name }}" id="slidername" class="form-control" placeholder="Enter Slider Title" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Deal or New</label>
                                                    <select class="form-control" name="category" class="selectpicker">
                                                        <option value="New Arrival">New Arrival</option>
                                                        <option value="Deals And Promotions">Deals And Promotions</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="number" name="price" value="{{ $slider->price }}" class="form-control" placeholder="Price" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Today/Old Price</label>
                                                    <input type="text" name="subValue" value="{{ $slider->label }}" class="form-control" placeholder="New Arrival(Today) or Deal(Price)" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Keyword</label>
                                                    <input type="text" name="Keyword" id="nameKeyword" value="{{ $slider->keyword }}" class="form-control" placeholder="Keyword" required readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" name="image" class="form-control" placeholder="image">
                                                    <img src="{{ asset('ab_admin/slider/'.$slider->image) }} " alt="{{ $slider->name }}" width="200">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label>Status</label>
                                                    <div class="form-group pt-2">
                                                        <label class="custom-switch m-0">
                                                            <input type="checkbox"{{($slider->status == '1' ?'checked':'')}} name="status" class="custom-switch-input" data-id="">
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
                //    Here For Auto Fill Data
                
                // When a key is released in the input field
                $("#slidername").keyup(function() {
                    // Get the value from the input field
                    var inputData = $(this).val();
                    // Replace spaces with dashes
                    var modifiedData = inputData.replace(/\s+/g, "-");
                    // Set the modified value in the output field
                    $("#nameKeyword").val(modifiedData);
                });
            });
       </script>
      
@endsection
