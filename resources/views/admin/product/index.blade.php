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
    .dia-section-1 , .dia-section-2{
        margin-top: 1rem;
    }
    .title-column {
            max-width: 350px; /* Adjust this value to your needs */

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
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#list"><i class="fa fa-list-ul"></i>Product List</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addnew"><i class="fa fa-plus"></i> Add New Prodcut</a></li>
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
                                <h3 class="card-title">View All Product</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <!--<th>#</th>-->
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Category</th>
                                                {{-- <th>Sale</th> --}}
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                            <tr>
                                                <td class="text-capitalize title-column">{{ $product->title }}</td>
                                                <td>
                                                    @if($product->image == '')
                                                    Image Not Found!
                                                    @else

                                                    <?php $cus_image = json_decode($product->image); ?>
                                                    <img src="{{ asset('ab_admin/product/'.$cus_image[0]) }}" width="80" style="border: 1px solid lightgray; padding:5px;" alt="Avatar">
                                                    @endif
                                                </td>
                                                <td>{{ $product->price }}</td>
                                                <td class="text-capitalize ">
                                                       {{ $product->getCategory->name }}
                                                </td>
                                                {{-- <td>{{ $product->sale }}</td> --}}

                                                <td>
                                                    <label class="custom-switch m-0">
                                                        <input type="checkbox" value="0" {{($product->status == 1?'checked':'')}} class="custom-switch-input admin-change-status-user" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </td>
                                                <td class="d-flex">
                                                    <form action="/admin/edit-product" method="post" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                                        <button class="btn btn-primary btn-sm">Edit</button>
                                                    </form>
                                                    |  <form action="/admin/delete-product" method="post" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                                        <button class="btn btn-danger btn-sm">Del</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Category</th>
                                                {{-- <th>Sale</th> --}}

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
                                    <form class="card-body" method="post" action="{{url('/admin/add-product')}}" enctype="multipart/form-data">
                                        @csrf()
                                        <div class="row clearfix">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Product Title</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Enter Product Title" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="number" name="price" class="form-control" placeholder="Price" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label>Select Product category</label>
                                                <select class="form-control" name="category_id">
                                                    @foreach ($categories as $category)
                                                        @if($category->parent_id == 0)
                                                            <option value="{{ $category->id }}" disabled>{{ $category->name }}</option>
                                                        @endif
                                                        @foreach($category->subcategories as $sub_cate)
                                                            <option class="abi-custom-subcate" value="{{ $sub_cate->id }}" >&nbsp;&nbsp;&nbsp; &#8594; {{ $sub_cate->name }}</option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" name="image[]" class="form-control" multiple>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label>Status</label>
                                                    <div class="form-group pt-2">
                                                        <label class="custom-switch m-0">
                                                            <input type="checkbox" name="status" class="custom-switch-input" data-id=""  >
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Briefly Description</label>
                                                    <div class="input-group mb-3">
                                                        <textarea id="my-summernote"  name="description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Full Description</label>
                                                    <div class="input-group mb-3">
                                                        <textarea id="my-summernote-1"  name="full_description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Diameter &nbsp;
                                                    <input type="checkbox" value="0" class="custom-switch-input admin-diameter-1" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-1">
                                                    <input type="text" name="diameter" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Focal Length &nbsp;
                                                    <input type="checkbox" value="0" class="custom-switch-input admin-diameter-2" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-2">
                                                    <input type="text" name="focal_length" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Power Model &nbsp;
                                                    <input type="checkbox" value="0" class="custom-switch-input admin-diameter-3" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-3">
                                                    <input type="text" name="power_model" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Voltage &nbsp;
                                                    <input type="checkbox" value="0" class="custom-switch-input admin-diameter-4" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-4">
                                                    <input type="text" name="voltage" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Set &nbsp;
                                                    <input type="checkbox" value="0" class="custom-switch-input admin-diameter-5" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-5">
                                                    <input type="text" name="set" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Size &nbsp;
                                                    <input type="checkbox" value="0" class="custom-switch-input admin-diameter-6" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-6">
                                                    <input type="text" name="size" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Working Area &nbsp;
                                                    <input type="checkbox" value="0" class="custom-switch-input admin-diameter-7" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-7">
                                                    <input type="text" name="working_area" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Bone Diameters &nbsp;
                                                    <input type="checkbox" value="0" class="custom-switch-input admin-diameter-8" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-8">
                                                    <input type="text" name="bone_diameters" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Model &nbsp;
                                                    <input type="checkbox" value="0" class="custom-switch-input admin-diameter-9" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-9">
                                                    <input type="text" name="model" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    OutPut Voltage &nbsp;
                                                    <input type="checkbox" value="0" class="custom-switch-input admin-diameter-10" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-10">
                                                    <input type="text" name="output_voltage" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Model Number(HTD3M-Perimeter-width) &nbsp;
                                                    <input type="checkbox" value="0" class="custom-switch-input admin-diameter-11" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-11">
                                                    <input type="text" name="model_number" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Type &nbsp;
                                                    <input type="checkbox" value="0" class="custom-switch-input admin-diameter-12" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-12">
                                                    <input type="text" name="type" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Caliber &nbsp;
                                                    <input type="checkbox" value="0" class="custom-switch-input admin-diameter-13" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-13">
                                                    <input type="text" name="caliber" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Substrate Size &nbsp;
                                                    <input type="checkbox" value="0" class="custom-switch-input admin-diameter-14" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-14">
                                                    <input type="text" name="substrate_size" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    WavaLength &nbsp;
                                                    <input type="checkbox" value="0" class="custom-switch-input admin-diameter-15" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-15">
                                                    <input type="text" name="wavelength" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Material &nbsp;
                                                    <input type="checkbox" value="0" class="custom-switch-input admin-diameter-16" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-16">
                                                    <input type="text" name="meterial" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Style &nbsp;
                                                    <input type="checkbox" value="0" class="custom-switch-input admin-diameter-17" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-17">
                                                    <input type="text" name="style" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Color &nbsp;
                                                    <input type="checkbox" value="0" class="custom-switch-input admin-diameter-18" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-18">
                                                    <input type="text" name="color" data-role="tagsinput" class="form-control" />
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
                    //For Textarea

                    $('#my-summernote').summernote({
                    minHeight: 100,
                    width: 1200,
                    placeholder: 'Description Of Your Product!',
                    focus: false,
                    airMode: false,
                    fontNames: ['Roboto', 'Calibri', 'Times New Roman', 'Arial'],
                    fontNamesIgnoreCheck: ['Roboto', 'Calibri'],
                    dialogsInBody: true,
                    dialogsFade: true,
                    disableDragAndDrop: false,
                    toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['para', ['style', 'ul', 'ol', 'paragraph']],
                        ['fontsize', ['fontsize']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['height', ['height']],
                        ['misc', ['undo', 'redo', 'print', 'help', 'fullscreen']]
                    ],
                    popover: {
                        air: [
                        ['color', ['color']],
                        ['font', ['bold', 'underline', 'clear']]
                        ]
                    },
                    print: {
                        //'stylesheetUrl': 'url_of_stylesheet_for_printing'
                    }
                    });
                    $('#my-summernote-1').summernote({
                    minHeight: 200,
                    width: 1200,
                    placeholder: 'Description Of Your Product!',
                    focus: false,
                    airMode: false,
                    fontNames: ['Roboto', 'Calibri', 'Times New Roman', 'Arial'],
                    fontNamesIgnoreCheck: ['Roboto', 'Calibri'],
                    dialogsInBody: true,
                    dialogsFade: true,
                    disableDragAndDrop: false,
                    toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['para', ['style', 'ul', 'ol', 'paragraph']],
                        ['fontsize', ['fontsize']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['height', ['height']],
                        ['misc', ['undo', 'redo', 'print', 'help', 'fullscreen']]
                    ],
                    popover: {
                        air: [
                        ['color', ['color']],
                        ['font', ['bold', 'underline', 'clear']]
                        ]
                    },
                    print: {
                        //'stylesheetUrl': 'url_of_stylesheet_for_printing'
                    }
                    });
                    $('#my-summernote').summernote({airMode: true,placeholder:'Try the airmode'});

                    //
                   $(".dia-section-1").hide();
                   $(".dia-section-2").hide();
                   $(".dia-section-3").hide();
                   $(".dia-section-4").hide();
                   $(".dia-section-5").hide();
                   $(".dia-section-6").hide();
                   $(".dia-section-7").hide();
                   $(".dia-section-8").hide();
                   $(".dia-section-9").hide();
                   $(".dia-section-10").hide();
                   $(".dia-section-11").hide();
                   $(".dia-section-12").hide();
                   $(".dia-section-13").hide();
                   $(".dia-section-14").hide();
                   $(".dia-section-15").hide();
                   $(".dia-section-16").hide();
                   $(".dia-section-17").hide();
                   $(".dia-section-18").hide();
               });
               $(".admin-diameter-1").on("click", function() {
                    if ($('.admin-diameter-1').is(":checked"))
                    {
                        $(".dia-section-1").show();
                    }else{
                        $(".dia-section-1").hide();
                    }

               });
               $(".admin-diameter-2").on("click", function() {
                    if ($('.admin-diameter-2').is(":checked"))
                    {
                        $(".dia-section-2").show();
                    }else{
                        $(".dia-section-2").hide();
                    }
               });
               $(".admin-diameter-3").on("click", function() {
                    if ($('.admin-diameter-3').is(":checked"))
                    {
                        $(".dia-section-3").show();
                    }else{
                        $(".dia-section-3").hide();
                    }
               });
               $(".admin-diameter-4").on("click", function() {
                    if ($('.admin-diameter-4').is(":checked"))
                    {
                        $(".dia-section-4").show();
                    }else{
                        $(".dia-section-4").hide();
                    }
               });
               $(".admin-diameter-5").on("click", function() {
                    if ($('.admin-diameter-5').is(":checked"))
                    {
                        $(".dia-section-5").show();
                    }else{
                        $(".dia-section-5").hide();
                    }
               });
               $(".admin-diameter-6").on("click", function() {
                    if ($('.admin-diameter-6').is(":checked"))
                    {
                        $(".dia-section-6").show();
                    }else{
                        $(".dia-section-6").hide();
                    }
               });
               $(".admin-diameter-7").on("click", function() {
                    if ($('.admin-diameter-7').is(":checked"))
                    {
                        $(".dia-section-7").show();
                    }else{
                        $(".dia-section-7").hide();
                    }
               });
               $(".admin-diameter-8").on("click", function() {
                    if ($('.admin-diameter-8').is(":checked"))
                    {
                        $(".dia-section-8").show();
                    }else{
                        $(".dia-section-8").hide();
                    }
               });
               $(".admin-diameter-9").on("click", function() {
                    if ($('.admin-diameter-9').is(":checked"))
                    {
                        $(".dia-section-9").show();
                    }else{
                        $(".dia-section-9").hide();
                    }
               });
               $(".admin-diameter-10").on("click", function() {
                    if ($('.admin-diameter-10').is(":checked"))
                    {
                        $(".dia-section-10").show();
                    }else{
                        $(".dia-section-10").hide();
                    }
               });
               $(".admin-diameter-11").on("click", function() {
                    if ($('.admin-diameter-11').is(":checked"))
                    {
                        $(".dia-section-11").show();
                    }else{
                        $(".dia-section-11").hide();
                    }
               });
               $(".admin-diameter-12").on("click", function() {
                    if ($('.admin-diameter-12').is(":checked"))
                    {
                        $(".dia-section-12").show();
                    }else{
                        $(".dia-section-12").hide();
                    }
               });
               $(".admin-diameter-13").on("click", function() {
                    if ($('.admin-diameter-13').is(":checked"))
                    {
                        $(".dia-section-13").show();
                    }else{
                        $(".dia-section-13").hide();
                    }
               });
               $(".admin-diameter-14").on("click", function() {
                    if ($('.admin-diameter-14').is(":checked"))
                    {
                        $(".dia-section-14").show();
                    }else{
                        $(".dia-section-14").hide();
                    }
               });
               $(".admin-diameter-15").on("click", function() {
                    if ($('.admin-diameter-15').is(":checked"))
                    {
                        $(".dia-section-15").show();
                    }else{
                        $(".dia-section-15").hide();
                    }
               });
               $(".admin-diameter-16").on("click", function() {
                    if ($('.admin-diameter-16').is(":checked"))
                    {
                        $(".dia-section-16").show();
                    }else{
                        $(".dia-section-16").hide();
                    }
               });
               $(".admin-diameter-17").on("click", function() {
                    if ($('.admin-diameter-17').is(":checked"))
                    {
                        $(".dia-section-17").show();
                    }else{
                        $(".dia-section-17").hide();
                    }
               });
               $(".admin-diameter-18").on("click", function() {
                    if ($('.admin-diameter-18').is(":checked"))
                    {
                        $(".dia-section-18").show();
                    }else{
                        $(".dia-section-18").hide();
                    }
               });

       </script>
@endsection
