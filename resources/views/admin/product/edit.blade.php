@extends('admin.admin_layouts')

 @section('css')
<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
@endsection 

@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Product Section</span>
        </nav>

        <div class="sl-pagebody">
         <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Product

            <a href="{{route('all.product')}}" class="btn btn-success btn-sm pull-right">All Products</a>
          </h6>
          <p class="mg-b-20 mg-sm-b-30">Update Product Form</p>
             <form action="{{url('update/product/withoutphoto/'.$product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                 <div class="form-layout"> 
                   <div class="row mg-b-25">
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label for="productName" class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                         <input id="productName" class="form-control" type="text" name="product_name" value="{{$product->product_name}}">
                       </div>
                     </div><!-- col-4 -->
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label for="ProductCode" class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                         <input id="productCode" class="form-control" type="text" name="product_code"  value="{{$product->product_code}}">
                       </div>
                     </div><!-- col-4 -->
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label for="quantity" class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                         <input id="quantity" class="form-control" type="text" name="product_quantity"  value="{{$product->product_quantity}}">
                       </div>
                     </div><!-- col-4 -->
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label for="quantity" class="form-control-label">Discount Price: <span class="tx-danger">*</span></label>
                         <input id="quantity" class="form-control" type="text" name="discount_price"  value="{{$product->discount_price}}">
                       </div>
                     </div><!-- col-4 -->

                     <div class="col-lg-4">
                       <div class="form-group mg-b-10-force">
                         <label for="cat" class="form-control-label">Category: <span class="tx-danger">*</span></label>
                         <select id="cat" class="form-control select2"  name="category_id">
                         <option label="Choose Category"></option>
                            @foreach($categories as $category) 
                            <option value="{{$category->id}}"
                             <?php
                                if ($category->id == $product->category_id){
                                    echo "selected";
                                }
                             ?>
                            >{{$category->category_name}}</option>
                           @endforeach
                         </select>
                       </div>
                     </div><!-- col-4 -->
                    
                     <div class="col-lg-4">
                       <div class="form-group mg-b-10-force">
                         <label for="cat" class="form-control-label">Sub Category: </label>
                         <select id="cat" class="form-control select2" name="subcategory_id">
                            @foreach($subcategories as $subcategory)
                                <option value="{{$subcategory->id}}"
                                    <?php 
                                    if($subcategory->id == $product->subcategory_id){
                                        echo "selected";
                                    
                                    } 
                                        
                                    ?>
                                >{{$subcategory->subcategory_name}}</option>
                            @endforeach
                         </select>
                       </div>
                     </div><!-- col-4 -->

                     <div class="col-lg-4">
                       <div class="form-group mg-b-10-force">
                         <label for="cat" class="form-control-label">Brands:</label>
                         <select id="cat" class="form-control select2" name="brand_id">
                         <option label="Choose Brand"></option>
                         @foreach($brands as $brand)
                            <option value="{{$brand->id}}" 
                             <?php
                                if($brand->id == $product->brand_id){
                                    echo "selected";
                                }
                             ?>
                            >{{$brand->brand_name}}</option>
                          @endforeach
                         </select>
                       </div>
                     </div><!-- col-4 -->
                     
                     
                     <div class="col-lg-4">
                       <div class="form-group">
                         <label for="input" class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                         <input id="input" class="form-control" type="text" name="product_size" data-role="tagsinput" value="{{$product->product_size}}" >
                       </div>
                     </div><!-- col-4 -->

                     <div class="col-lg-4">
                       <div class="form-group">
                         <label for="input" class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                         <input id="input" class="form-control" type="text" name="product_color" data-role="tagsinput" value="{{$product->product_size}}">
                       </div>
                     </div><!-- col-4 -->


                     <div class="col-lg-4">
                       <div class="form-group">
                         <label for="prosel" class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                         <input id="prosel" class="form-control" type="text" name="selling_price"  value="{{$product->selling_price}}" >
                       </div>
                     </div><!-- col-4 -->

                     <div class="col-lg-12">
                       <div class="form-group">
                         <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                         <textarea id="summernote" class="form-control" name="product_details" >
                            {{$product->product_details}}
                         </textarea>
                       </div> 
                     </div><!-- col-4 -->

                     <div class="col-lg-12">
                       <div class="form-group">
                         <label for="provid" class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                         <input id="provid" class="form-control" type="text" name="video_link" value="{{$product->video_link}}">
                       </div>
                     </div><!-- col-4 -->
                   </div><!-- row -->

                   <hr>
                   <br><br>

                   <div class="row">

                   <div class="col-lg-4">
                     <label class="ckbox">
                       <input type="checkbox" name="main_slider" value="1" <?php if($product->main_slider == 1) {
                           echo "checked";
                       } ?>>
                       <span>Main Slider</span>
                     </label>
                   </div> <!-- col 4 -->

                   <div class="col-lg-4">
                     <label class="ckbox">
                       <input type="checkbox" name="hot_deal" value="1" <?php if($product->hot_deal == 1) {
                           echo "checked";
                       } ?>>
                       <span>Hot Deal</span>
                     </label>
                   </div> <!-- col 4 -->

                   <div class="col-lg-4">
                     <label class="ckbox">
                       <input type="checkbox" name="best_rated" value="1" <?php if($product->best_rated == 1) {
                           echo "checked";
                       } ?>>
                       <span>Best Rated</span>
                     </label>
                   </div> <!-- col 4 -->

                   
                   <div class="col-lg-4">
                     <label class="ckbox">
                       <input type="checkbox" name="trend" value="1"  <?php if($product->trend == 1) {
                           echo "checked";
                       } ?>>
                       <span>Trend Product</span>
                      </label>
                    </div> <!-- col 4 -->
                    
                    <div class="col-lg-4">
                      <label class="ckbox">
                        <input type="checkbox" name="mid_slider" value="1" <?php if($product->mid_slider == 1) {
                           echo "checked";
                       } ?>>
                        <span>Mid Slider</span>
                      </label>
                    </div> <!-- col 4 -->

                    <div class="col-lg-4">
                      <label class="ckbox">
                        <input type="checkbox" name="hot_new" value="1" <?php if($product->hot_new == 1) {
                           echo "checked";
                       } ?>>
                        <span>Hot New</span>
                      </label>
                    </div> <!-- col 4 -->
                   </div>

                   <br><br>
       
                   <div class="form-layout-footer">
                     <button class="btn btn-info mg-r-5">Update Product</button>
                   </div><!-- form-layout-footer -->
                 </div><!-- form-layout -->       
             </form>
         </div><!-- card -->
        </div><!-- row -->

                                
        <div class="sl-pagebody">
           <div class="card pd-20 pd-sm-40">
              <h6 class="card-body-title">Update Product </h6>
             <form action="{{url('update/product/photo/'.$product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                   <div class="col-lg-6 col-sm-6">
                          <label class="form-control-label">Image One ( Main Thumbnali): <span class="tx-danger">*</span>
                          </label><br>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);" >
                            <span class="custom-file-control"></span>
                            <br>
                            <input type="hidden" name="old_one" value="{{$product->image_one}}">
                            <img src="#" id="one">
                        </label>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                       <img src="{{URL::to($product->image_one)}}" style="width: 80px; height: 80px;">
                    </div>
                </div><!-- row- -->
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                         <label for="provid" class="form-control-label" style="display: block;">Image Two : <span class="tx-danger">*</span></label>
                         <label class="custom-file">
                            <input type="file" id="file1" class="custom-file-input" name="image_two" onchange="readURL2(this);">
                            <span class="custom-file-control custom-file-control-primary"></span>
                            <br>
                            <input type="hidden" name="old_two" value="{{$product->image_two}}">
                            <img src="#" id="two">
                          </label>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                       <img src="{{URL::to($product->image_two)}}" style="width: 80px; height: 80px;">
                    </div>
                </div><!-- row -->
                <div class="row">
                    <div class="col-lg-6 col-sm-6"> 
                         <label for="provid" class="form-control-label" style="display: block;">Image Three : <span class="tx-danger">*</span></label>
                         <label class="custom-file">
                            <input type="file" id="file1" class="custom-file-input" name="image_three" onchange="readURL3(this);">
                            <span class="custom-file-control custom-file-control-primary"></span>
                            <br>
                            <input type="hidden" name="old_three" value="{{$product->image_three}}">
                            <img src="#" id="three">
                          </label>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                       <img src="{{URL::to($product->image_three)}}" style="width: 80px; height: 80px;">
                    </div>
                </div>   
                
                <div class="row" style="margin: 30px 0 0 10px;">
                   <button type="submit" class="btn btn-sm btn-warning">Update Photo</button>
                </div>        
              </form>
            </div><!-- Card -->
        </div>
  </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    @section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    
    <script type="text/javascript">
      $(document).ready(function(){
     $('select[name="category_id"]').on('change',function(){
          var category_id = $(this).val();
          if (category_id) {
            
            $.ajax({
              url: "{{ url('/get/subcategory/') }}/"+category_id,
              type:"GET",
              dataType:"json",
              success:function(data) { 
              var d =$('select[name="subcategory_id"]').empty();
              $.each(data, function(key, value){
              
              $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + 
              value.subcategory_name + '</option>');

              });
              },
            });

          }else{
            alert('danger');
          }

            });
      });

 </script>
 <script type="text/javascript">
  function readURL(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
 <script type="text/javascript">
  function readURL2(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#two')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
 <script type="text/javascript">
  function readURL3(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#three')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
    @endsection
@endsection
