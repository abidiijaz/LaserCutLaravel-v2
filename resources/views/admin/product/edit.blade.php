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
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#list"><i class="fa fa-list-ul"></i>Edit Product</a></li>

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
                                        <h3 class="card-title">Edit Product</h3>

                                    </div>
                                    <form class="card-body" method="post" action="{{url('/admin/add-product')}}" enctype="multipart/form-data">
                                        @csrf()
                                        <div class="row clearfix">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Product Title</label>
                                                    <input type="hidden" name="id" value="{{ $product->id }}" class="form-control" placeholder="Enter Product Title" required>
                                                    <input type="text" name="name" value="{{ $product->title }}" class="form-control" placeholder="Enter Product Title" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="number" name="price" value="{{ $product->price }}" class="form-control" placeholder="Price" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label>Select category</label>
                                                <select class="form-control" name="category_id">
                                                    @foreach ($categories as $category)
                                                        @if($category->parent_id == 0)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endif
                                                        @foreach($category->subcategories as $sub_cate)
                                                            <option class="abi-custom-subcate" value="{{ $sub_cate->id }}" <?php echo($category->id == $product->category_id)?'selected':'';?>>&nbsp;&nbsp;&nbsp; &#8594; {{ $sub_cate->name }}</option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" name="image[]" class="form-control" multiple>
                                                    @if($product->image == '')
                                                    Image Not Found!
                                                    @else

                                                    <?php $cus_image = json_decode($product->image); ?>
                                                    <img src="{{ asset('ab_admin/product/'.$cus_image[0]) }}" width="80" style="border: 1px solid lightgray; padding:5px;" alt="Avatar">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label>Status</label>
                                                    <div class="form-group pt-2">
                                                        <label class="custom-switch m-0">
                                                            <input type="checkbox" name="status" class="custom-switch-input" data-id="" {{($product->status == 1?'checked':'')}}>
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <div class="input-group mb-3">
                                                        <textarea id="my-summernote"  name="description">{{ $product->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Diameter &nbsp;
                                                    <input type="checkbox" value="0" {{($product->diameter != null ?'checked':'')}} class="custom-switch-input admin-diameter-1" data-id=""  data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-1">
                                                    <input type="text" value="{{ $product->diameter }}"  name="diameter"  data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Focal Length &nbsp;
                                                    <input type="checkbox" value="0" {{($product->focal_length != null ?'checked':'')}} class="custom-switch-input admin-diameter-2" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-2">
                                                    <input type="text" value="{{ $product->focal_length }}" name="focal_length" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Power Model &nbsp;
                                                    <input type="checkbox" value="0" {{($product->power_model != null ?'checked':'')}} class="custom-switch-input admin-diameter-3" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-3">
                                                    <input type="text" value="{{ $product->power_model }}" name="power_model" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Voltage &nbsp;
                                                    <input type="checkbox" value="0" {{($product->voltage != null ?'checked':'')}} class="custom-switch-input admin-diameter-4" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-4">
                                                    <input type="text" value="{{ $product->voltage }}" name="voltage" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Set &nbsp;
                                                    <input type="checkbox" value="0" {{($product->set_word != null ?'checked':'')}} class="custom-switch-input admin-diameter-5" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-5">
                                                    <input type="text" value="{{ $product->set_word }}" name="set" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Size &nbsp;
                                                    <input type="checkbox" value="0" {{($product->size != null ?'checked':'')}} class="custom-switch-input admin-diameter-6" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-6">
                                                    <input type="text" value="{{ $product->size }}" name="size" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Working Area &nbsp;
                                                    <input type="checkbox" value="0" {{($product->working_area != null ?'checked':'')}} class="custom-switch-input admin-diameter-7" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-7">
                                                    <input type="text" value="{{ $product->working_area }}" name="working_area" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Bone Diameters &nbsp;
                                                    <input type="checkbox" value="0" {{($product->bone_diameters != null ?'checked':'')}} class="custom-switch-input admin-diameter-8" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-8">
                                                    <input type="text" value="{{ $product->bone_diameters }}" name="bone_diameters" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Model &nbsp;
                                                    <input type="checkbox" value="0" {{($product->model != null ?'checked':'')}} class="custom-switch-input admin-diameter-9" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-9">
                                                    <input type="text" value="{{ $product->model }}" name="model" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    OutPut Voltage &nbsp;
                                                    <input type="checkbox" value="0" {{($product->output_voltage != null ?'checked':'')}} class="custom-switch-input admin-diameter-10" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-10">
                                                    <input type="text" value="{{ $product->output_voltage }}" name="output_voltage" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Model Number(HTD3M-Perimeter-width) &nbsp;
                                                    <input type="checkbox" value="0" {{($product->model_number != null ?'checked':'')}} class="custom-switch-input admin-diameter-11" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-11">
                                                    <input type="text" value="{{ $product->model_number }}" name="model_number" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Type &nbsp;
                                                    <input type="checkbox" value="0" {{($product->type != null ?'checked':'')}} class="custom-switch-input admin-diameter-12" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-12">
                                                    <input type="text" value="{{ $product->type }}" name="type" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Caliber &nbsp;
                                                    <input type="checkbox" value="0" {{($product->caliber != null ?'checked':'')}} class="custom-switch-input admin-diameter-13" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-13">
                                                    <input type="text" value="{{ $product->caliber }}" name="caliber" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Substrate Size &nbsp;
                                                    <input type="checkbox" value="0" {{($product->sub_strate_size != null ?'checked':'')}} class="custom-switch-input admin-diameter-14" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-14">
                                                    <input type="text" value="{{ $product->sub_strate_size }}" name="substrate_size" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    WavaLength &nbsp;
                                                    <input type="checkbox" value="0" {{($product->wavelength != null ?'checked':'')}} class="custom-switch-input admin-diameter-15" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-15">
                                                    <input type="text" value="{{ $product->wavelength }}" name="wavelength" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Material &nbsp;
                                                    <input type="checkbox" value="0" {{($product->material != null ?'checked':'')}} class="custom-switch-input admin-diameter-16" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-16">
                                                    <input type="text" value="{{ $product->material }}" name="meterial" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Style &nbsp;
                                                    <input type="checkbox" value="0" {{($product->style != null ?'checked':'')}} class="custom-switch-input admin-diameter-17" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-17">
                                                    <input type="text" value="{{ $product->style }}" name="style" data-role="tagsinput" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 pt-3 pb-3">
                                                <label class="custom-switch m-0">
                                                    Color &nbsp;
                                                    <input type="checkbox" value="0" {{($product->color != null ?'checked':'')}} class="custom-switch-input admin-diameter-18" data-id="" data-toggle="toggle" data-onstyle="outline-success" >
                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                                <div class="form-group dia-section-18">
                                                    <input type="text" value="{{ $product->color }}" name="color" data-role="tagsinput" class="form-control" />
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
                    $('#my-summernote2').summernote({airMode: true,placeholder:'Try the airmode'});

                    //
                  // Trigger the change event on input field change

                    $(".admin-diameter-1, .admin-diameter-2, .admin-diameter-3, .admin-diameter-4, .admin-diameter-5,.admin-diameter-6,.admin-diameter-7,.admin-diameter-8,.admin-diameter-9,.admin-diameter-10,.admin-diameter-11,.admin-diameter-12,.admin-diameter-13,.admin-diameter-14,.admin-diameter-15,.admin-diameter-16,.admin-diameter-17,.admin-diameter-18").on("change", function() {
                        var checkbox = $(this);
                        var sectionClass;
                        if (checkbox.hasClass("admin-diameter-1")) {
                            sectionClass = ".dia-section-1";
                        } else if (checkbox.hasClass("admin-diameter-2")) {
                            sectionClass = ".dia-section-2";
                        } else if (checkbox.hasClass("admin-diameter-3")) {
                            sectionClass = ".dia-section-3";
                        } else if (checkbox.hasClass("admin-diameter-4")) {
                            sectionClass = ".dia-section-4";
                        } else if (checkbox.hasClass("admin-diameter-5")) {
                            sectionClass = ".dia-section-5";
                        } else if (checkbox.hasClass("admin-diameter-6")) {
                            sectionClass = ".dia-section-6";
                        } else if (checkbox.hasClass("admin-diameter-7")) {
                            sectionClass = ".dia-section-7";
                        } else if (checkbox.hasClass("admin-diameter-8")) {
                            sectionClass = ".dia-section-8";
                        } else if (checkbox.hasClass("admin-diameter-9")) {
                            sectionClass = ".dia-section-9";
                        } else if (checkbox.hasClass("admin-diameter-10")) {
                            sectionClass = ".dia-section-10";
                        } else if (checkbox.hasClass("admin-diameter-11")) {
                            sectionClass = ".dia-section-11";
                        } else if (checkbox.hasClass("admin-diameter-12")) {
                            sectionClass = ".dia-section-12";
                        } else if (checkbox.hasClass("admin-diameter-13")) {
                            sectionClass = ".dia-section-13";
                        } else if (checkbox.hasClass("admin-diameter-14")) {
                            sectionClass = ".dia-section-14";
                        } else if (checkbox.hasClass("admin-diameter-15")) {
                            sectionClass = ".dia-section-15";
                        } else if (checkbox.hasClass("admin-diameter-16")) {
                            sectionClass = ".dia-section-16";
                        } else if (checkbox.hasClass("admin-diameter-17")) {
                            sectionClass = ".dia-section-17";
                        } else if (checkbox.hasClass("admin-diameter-18")) {
                            sectionClass = ".dia-section-18";
                        }
                        var inputField = checkbox.closest(".col-md-6").find("input.form-control");
                        if (checkbox.is(":checked")) {
                            $(sectionClass).show();
                            inputField.trigger("input"); // Check input value on checkbox change
                        } else {
                            $(sectionClass).hide();
                            inputField.val(""); // Reset input value on checkbox uncheck
                        }
                    });
                    // Trigger the change event on page load for all checkboxes
                    $(".admin-diameter-1, .admin-diameter-2, .admin-diameter-3, .admin-diameter-4, .admin-diameter-5,.admin-diameter-6,.admin-diameter-7,.admin-diameter-8,.admin-diameter-9,.admin-diameter-10,.admin-diameter-11,.admin-diameter-12,.admin-diameter-13,.admin-diameter-14,.admin-diameter-15,.admin-diameter-16,.admin-diameter-17,.admin-diameter-18").trigger("change");
            });
      
       </script>
@endsection
