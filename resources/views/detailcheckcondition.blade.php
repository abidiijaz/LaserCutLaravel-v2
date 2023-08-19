<?php
    $diameters=$focal_lengths=$powerModels=$voltages=$set_words=$sizes=$working_areas=$bone_diameterss=$models=$output_voltages=$model_numbers=$types=$calibers=$sub_strate_sizes=$wavelengths=$materials=$styles=$colors= array();

    if($product->diameter != null){
        $diameters = explode (",", $product->diameter);
    }
    if($product->focal_length != null){
        $focal_lengths = explode (",", $product->focal_length);
    }
    if($product->power_model != null){
        $powerModels = explode (",", $product->power_model);
    }
    if($product->voltage != null){
        $voltages = explode (",", $product->voltage);
    }
    if($product->set_word != null){
        $set_words = explode (",", $product->set_word);
    }
    if($product->size != null){
        $sizes = explode (",", $product->size);
    }
    if($product->working_area != null){
        $working_areas = explode (",", $product->working_area);
    }
    if($product->bone_diameters != null){
        $bone_diameterss = explode (",", $product->bone_diameters);
    }
    if($product->model != null){
        $models = explode (",", $product->model);
    }
    if($product->output_voltage != null){
        $output_voltages = explode (",", $product->output_voltage);
    }
    if($product->model_number != null){
        $model_numbers = explode (",", $product->model_number);
    }
    if($product->type != null){
        $types = explode (",", $product->type);
    }
    if($product->caliber != null){
        $calibers = explode (",", $product->caliber);
    }
    if($product->sub_strate_size != null){
        $sub_strate_sizes = explode (",", $product->sub_strate_size);
    }
    if($product->wavelength != null){
        $wavelengths = explode (",", $product->wavelength);
    }
    if($product->material != null){
        $materials = explode (",", $product->material);
    }
    if($product->style != null){
        $styles = explode (",", $product->style);
    }
    if($product->color != null){
        $colors = explode (",", $product->color);
    }
    // print_r($set_words);
?>
<!-- For Diameter Checkout -->
 @if(count($diameters)===0)
 @else
     <label for="size"><h6>Diameter</h6> </label><br/>
     @foreach ($diameters as $key=>$diameter)
@if($key === 0)
         <input type="radio" id="test_<?php echo $key; ?>" name="diameter" checked>
         <label class="ab_custom_field" for="test_<?php echo $key; ?>">{{ $diameter }}</label>
@else
<input type="radio" id="test_<?php echo $key; ?>" name="diameter">
         <label class="ab_custom_field" for="test_<?php echo $key; ?>">{{ $diameter }}</label>
@endif
     @endforeach
 @endif
 <!-- Diameters check End -->
 <!-- For FocalLength Checkout -->

 @if(count($focal_lengths)===0)
 @else
    <br/>
     <label for="size"><h6>Focal Length</h6> </label><br/>
     @foreach ($focal_lengths as $key=>$focallength)
     @if($key === 0)
         <input type="radio" id="f_length_<?php echo $key; ?>" name="focal_length" checked>
         <label class="ab_custom_field_f_length" for="f_length_<?php echo $key; ?>">{{ $focallength }}</label>
@else
<input type="radio" id="f_length_<?php echo $key; ?>" name="focal_length">
<label class="ab_custom_field_f_length" for="f_length_<?php echo $key; ?>">{{ $focallength }}</label>
@endif
     @endforeach
 @endif
 <!-- FocalLength check End -->
 <!-- For Power Model Checkout -->

 @if(count($powerModels)===0)
 @else
    <br/>
     <label for="size"><h6>Power Model</h6> </label><br/>
     @foreach ($powerModels as $key=>$powerModel)
@if($key === 0)
         <input type="radio" id="power_model<?php echo $key; ?>" name="power_model" checked>
         <label class="ab_custom_fieldpower_model" for="power_model<?php echo $key; ?>">{{ $powerModel }}</label>
@else
<input type="radio" id="power_model<?php echo $key; ?>" name="power_model">
<label class="ab_custom_fieldpower_model" for="power_model<?php echo $key; ?>">{{ $powerModel }}</label>
@endif
     @endforeach
 @endif
 <!-- Power Model check End -->
<!-- For Voltage Checkout -->
@if(count($voltages)===0)
@else
<br/>
<label for="size"><h6>Voltage</h6> </label><br/>
@foreach ($voltages as $key=>$voltage)
@if($key == 0)
    <input type="radio" id="voltage<?php echo $key; ?>" name="voltage" checked>
    <label class="ab_custom_fieldvoltage" for="voltage<?php echo $key; ?>">{{ $voltage }}</label>
@else
<input type="radio" id="voltage<?php echo $key; ?>" name="voltage">
    <label class="ab_custom_fieldvoltage" for="voltage<?php echo $key; ?>">{{ $voltage }}</label>
@endif
@endforeach
@endif
<!-- Voltage check End -->
<!-- For Set Checkout -->
@if(count($set_words)===0)
@else
<br/>
<label for="size"><h6>Set</h6> </label><br/>
@foreach ($set_words as $key=>$set_word)
@if($key === 0)
    <input type="radio" id="set_word<?php echo $key; ?>" name="set_word" checked>
    <label class="ab_custom_fieldset_word" for="set_word<?php echo $key; ?>">{{ $set_word }}</label>
@else
<input type="radio" id="set_word<?php echo $key; ?>" name="set_word">
    <label class="ab_custom_fieldset_word" for="set_word<?php echo $key; ?>">{{ $set_word }}</label>
@endif
@endforeach
@endif
<!-- Set check End -->
<!-- For Size Checkout -->
@if(count($sizes)===0)
@else
<br/>
<label for="size"><h6>Size</h6> </label><br/>
@foreach ($sizes as $key=>$size)
@if($key === 0)
    <input type="radio" id="size<?php echo $key; ?>" name="size" checked>
    <label class="ab_custom_fieldsize" for="size<?php echo $key; ?>">{{ $size }}</label>
@else
<input type="radio" id="size<?php echo $key; ?>" name="size">
    <label class="ab_custom_fieldsize" for="size<?php echo $key; ?>">{{ $size }}</label>
@endif
@endforeach
@endif
<!-- Size check End -->
<!-- For working_areas Checkout -->
@if(count($working_areas)===0)
@else
<br/>
<label for="size"><h6>Working Area</h6> </label><br/>
@foreach ($working_areas as $key=>$working_area)
@if($key === 0)
    <input type="radio" id="working_area<?php echo $key; ?>" name="working_area" checked>
    <label class="ab_custom_fieldworking_area" for="working_area<?php echo $key; ?>">{{ $working_area }}</label>
@else
<input type="radio" id="working_area<?php echo $key; ?>" name="working_area">
    <label class="ab_custom_fieldworking_area" for="working_area<?php echo $key; ?>">{{ $working_area }}</label>
@endif
@endforeach
@endif
<!-- working_areas check End -->
<!-- For bone_diameterss Checkout -->
@if(count($bone_diameterss)===0)
@else
<br/>
<label for="size"><h6>Bone Diameter</h6> </label><br/>
@foreach ($bone_diameterss as $key=>$bone_diameters)
@if($key === 0)
<input type="radio" id="bone_diameters<?php echo $key; ?>" name="bone_diameters" checked>
    <label class="ab_custom_fieldbone_diameters" for="bone_diameters<?php echo $key; ?>">{{ $bone_diameters }}</label>
@else
<input type="radio" id="bone_diameters<?php echo $key; ?>" name="bone_diameters">
    <label class="ab_custom_fieldbone_diameters" for="bone_diameters<?php echo $key; ?>">{{ $bone_diameters }}</label>
@endif
@endforeach
@endif
<!-- bone_diameterss check End -->
<!-- For models Checkout -->
@if(count($models)===0)
@else
<br/>
<label for="size"><h6>Model</h6> </label><br/>
@foreach ($models as $key=>$model)
@if($key === 0)
    <input type="radio" id="model<?php echo $key; ?>" name="model" checked>
    <label class="ab_custom_fieldmodel" for="model<?php echo $key; ?>">{{ $model }}</label>
@else
<input type="radio" id="model<?php echo $key; ?>" name="model">
    <label class="ab_custom_fieldmodel" for="model<?php echo $key; ?>">{{ $model }}</label>
@endif
@endforeach
@endif
<!-- models check End -->
<!-- For output_voltages Checkout -->
@if(count($output_voltages)===0)
@else
<br/>
<label for="size"><h6>Output Voltage</h6> </label><br/>
@foreach ($output_voltages as $key=>$output_voltage)
@if($key === 0)
    <input type="radio" id="output_voltage<?php echo $key; ?>" name="output_voltage" checked>
    <label class="ab_custom_fieldoutput_voltage" for="output_voltage<?php echo $key; ?>">{{ $output_voltage }}</label>
@else
<input type="radio" id="output_voltage<?php echo $key; ?>" name="output_voltage">
    <label class="ab_custom_fieldoutput_voltage" for="output_voltage<?php echo $key; ?>">{{ $output_voltage }}</label>
@endif
@endforeach
@endif
<!-- output_voltages check End -->
<!-- For model_numbers Checkout -->
@if(count($model_numbers)===0)
@else
<br/>
<label for="size"><h6>Model Numbers</h6> </label><br/>
@foreach ($model_numbers as $key=>$model_number)
@if($key === 0)
    <input type="radio" id="model_number<?php echo $key; ?>" name="model_number" checked>
    <label class="ab_custom_fieldmodel_number" for="model_number<?php echo $key; ?>">{{ $model_number }}</label>
@else
<input type="radio" id="model_number<?php echo $key; ?>" name="model_number">
    <label class="ab_custom_fieldmodel_number" for="model_number<?php echo $key; ?>">{{ $model_number }}</label>
@endif
@endforeach
@endif
<!-- model_numbers check End -->
<!-- For types Checkout -->
@if(count($types)===0)
@else
<br/>
<label for="size"><h6>Types</h6> </label><br/>
@foreach ($types as $key=>$type)
@if($key === 0)
    <input type="radio" id="type<?php echo $key; ?>" name="type" checked>
    <label class="ab_custom_fieldtype" for="type<?php echo $key; ?>">{{ $type }}</label>
@else
<input type="radio" id="type<?php echo $key; ?>" name="type">
    <label class="ab_custom_fieldtype" for="type<?php echo $key; ?>">{{ $type }}</label>
@endif
@endforeach
@endif
<!-- types check End -->
<!-- For calibers Checkout -->
@if(count($calibers)===0)
@else
<br/>
<label for="size"><h6>Caliber</h6> </label><br/>
@foreach ($calibers as $key=>$caliber)
@if($key === 0)
    <input type="radio" id="caliber<?php echo $key; ?>" name="caliber" checked>
    <label class="ab_custom_fieldcaliber" for="caliber<?php echo $key; ?>">{{ $caliber }}</label>
@else
<input type="radio" id="caliber<?php echo $key; ?>" name="caliber">
    <label class="ab_custom_fieldcaliber" for="caliber<?php echo $key; ?>">{{ $caliber }}</label>
@endif
@endforeach
@endif
<!-- calibers check End -->
<!-- For calibers Checkout -->
@if(count($sub_strate_sizes)===0)
@else
<br/>
<label for="size"><h6>sub strate sizes</h6> </label><br/>
@foreach ($sub_strate_sizes as $key=>$sub_strate_size)
@if($key === 0)
    <input type="radio" id="sub_strate_size<?php echo $key; ?>" name="sub_strate_size" checked>
    <label class="ab_custom_fieldsub_strate_size" for="sub_strate_size<?php echo $key; ?>">{{ $sub_strate_size }}</label>
@else
<input type="radio" id="sub_strate_size<?php echo $key; ?>" name="sub_strate_size">
    <label class="ab_custom_fieldsub_strate_size" for="sub_strate_size<?php echo $key; ?>">{{ $sub_strate_size }}</label>
@endif
@endforeach
@endif
<!-- calibers check End -->
<!-- For wavelengths Checkout -->
@if(count($wavelengths)===0)
@else
<br/>
<label for="size"><h6>WaveLength</h6> </label><br/>
@foreach ($wavelengths as $key=>$wavelength)
@if($key === 0 )
    <input type="radio" id="wavelength<?php echo $key; ?>" name="wavelength" checked>
    <label class="ab_custom_fieldwavelength" for="wavelength<?php echo $key; ?>">{{ $wavelength }}</label>
@else
<input type="radio" id="wavelength<?php echo $key; ?>" name="wavelength">
    <label class="ab_custom_fieldwavelength" for="wavelength<?php echo $key; ?>">{{ $wavelength }}</label>
@endif
@endforeach
@endif
<!-- wavelengths check End -->
<!-- For materials Checkout -->
@if(count($materials)===0)
@else
<br/>
<label for="size"><h6>Materials</h6> </label><br/>
@foreach ($materials as $key=>$material)
@if($key === 0)
    <input type="radio" id="material<?php echo $key; ?>" name="material" checked>
    <label class="ab_custom_fieldmaterial" for="material<?php echo $key; ?>">{{ $material }}</label>
@else
<input type="radio" id="material<?php echo $key; ?>" name="material">
    <label class="ab_custom_fieldmaterial" for="material<?php echo $key; ?>">{{ $material }}</label>
@endif
@endforeach
@endif
<!-- materials check End -->
<!-- For styles Checkout -->
@if(count($styles)===0)
@else
<br/>
<label for="size"><h6>Style</h6> </label><br/>
@foreach ($styles as $key=>$style)
@if($key === 0)
    <input type="radio" id="style<?php echo $key; ?>" name="style" checked>
    <label class="ab_custom_fieldstyle" for="style<?php echo $key; ?>">{{ $style }}</label>
@else
<input type="radio" id="style<?php echo $key; ?>" name="style">
    <label class="ab_custom_fieldstyle" for="style<?php echo $key; ?>">{{ $style }}</label>
@endif
@endforeach
@endif
<!-- style check End -->
<!-- For colors Checkout -->
@if(count($colors)===0)
@else
<br/>
<label for="size"><h6>Colors</h6> </label><br/>
@foreach ($colors as $key=>$color)
@if($key === 0)
    <input type="radio" id="color<?php echo $key; ?>" name="color" checked>
    <label class="ab_custom_fieldcolor" for="color<?php echo $key; ?>">{{ $color }}</label>
@else
<input type="radio" id="color<?php echo $key; ?>" name="color">
    <label class="ab_custom_fieldcolor" for="color<?php echo $key; ?>">{{ $color }}</label>
@endif
@endforeach
@endif
<!-- colors check End -->
