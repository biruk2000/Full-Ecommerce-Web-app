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
          <h6 class="card-body-title">Add New Product

            <a href="{{route('all.product')}}" class="btn btn-success btn-sm pull-right">All Products</a>
          </h6>
          <p class="mg-b-20 mg-sm-b-30">New Product Form</p>
             <form action="{{route('store.product')}}" method="post" enctype="multipart/form-data">
                @csrf
                 <div class="form-layout"> 
                   <div class="row mg-b-25">
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label for="productName" class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                         <input id="productName" class="form-control" type="text" name="product_name" placeholder="Enter Product Name">
                       </div>
                     </div><!-- col-4 -->
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label for="ProductCode" class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                         <input id="productCode" class="form-control" type="text" name="product_code"  placeholder="Enter Product Code">
                       </div>
                     </div><!-- col-4 -->
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label for="quantity" class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                         <input id="quantity" class="form-control" type="text" name="product_quantity"  placeholder="Product Quantity">
                       </div>
                     </div><!-- col-4 -->
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label for="quantity" class="form-control-label">Discount Price: <span class="tx-danger">*</span></label>
                         <input id="quantity" class="form-control" type="text" name="discount_price"  placeholder="Discount Price">
                       </div>
                     </div><!-- col-4 -->

                     <div class="col-lg-4">
                       <div class="form-group mg-b-10-force">
                         <label for="cat" class="form-control-label">Category: <span class="tx-danger">*</span></label>
                         <select id="cat" class="form-control select2" data-placeholder="Choose Category" name="category_id">
                         <option label="Choose Category"></option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                           @endforeach
                         </select>
                       </div>
                     </div><!-- col-4 -->
                    
                     <div class="col-lg-4">
                       <div class="form-group mg-b-10-force">
                         <label for="cat" class="form-control-label">Sub Category: </label>
                         <select id="cat" class="form-control select2" data-placeholder="Choose Sub Category" name="subcategory_id">
                        
                         </select>
                       </div>
                     </div><!-- col-4 -->

                     <div class="col-lg-4">
                       <div class="form-group mg-b-10-force">
                         <label for="cat" class="form-control-label">Brands:</label>
                         <select id="cat" class="form-control select2" data-placeholder="Choose Brand" name="brand_id">
                         <option label="Choose Brand"></option>
                         @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                          @endforeach
                         </select>
                       </div>
                     </div><!-- col-4 -->
                     
                     
                     <div class="col-lg-4">
                       <div class="form-group">
                         <label for="input" class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                         <input id="input" class="form-control" type="text" name="product_size" data-role="tagsinput" >
                       </div>
                     </div><!-- col-4 -->

                     <div class="col-lg-4">
                       <div class="form-group">
                         <label for="input" class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                         <input id="input" class="form-control" type="text" name="product_color" data-role="tagsinput" >
                       </div>
                     </div><!-- col-4 -->


                     <div class="col-lg-4">
                       <div class="form-group">
                         <label for="prosel" class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                         <input id="prosel" class="form-control" type="text" name="selling_price" placeholder ="Selling Price" >
                       </div>
                     </div><!-- col-4 -->

                     <div class="col-lg-12">
                       <div class="form-group">
                         <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                         <textarea id="summernote" class="form-control" name="product_details"  cols="30" rows="10"></textarea>
                       </div> 
                     </div><!-- col-4 -->

                     <div class="col-lg-12">
                       <div class="form-group">
                         <label for="provid" class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                         <input id="provid" class="form-control" type="text" name="video_link" placeholder ="Video Link" >
                       </div>
                     </div><!-- col-4 -->

                     <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label">Image One ( Main Thumbnali): <span class="tx-danger">*</span></label>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);" required="">
                            <span class="custom-file-control"></span>
                            <br><br>
                            <img src="#" id="one">
                        </label>

                      </div>
                      </div><!-- col-4 -->
                     <div class="col-lg-4">
                       <div class="form-group">
                         <label for="provid" class="form-control-label" style="display: block;">Image Two : <span class="tx-danger">*</span></label>
                         <label class="custom-file">
                            <input type="file" id="file1" class="custom-file-input" name="image_two" onchange="readURL2(this);" required="">
                            <span class="custom-file-control custom-file-control-primary"></span>
                            <br><br>
                            <img src="#" id="two">
                          </label>
                       </div>
                     </div><!-- col-4 -->

                     <div class="col-lg-4"> 
                       <div class="form-group">
                         <label for="provid" class="form-control-label" style="display: block;">Image Three : <span class="tx-danger">*</span></label>
                         <label class="custom-file">
                            <input type="file" id="file1" class="custom-file-input" name="image_three" onchange="readURL3(this);">
                            <span class="custom-file-control custom-file-control-primary"></span>
                            <br><br>
                            <img src="#" id="three">
                          </label>
                       </div>
                     </div><!-- col-4 -->
                   </div><!-- row -->

                   <hr>
                   <br><br>

                   <div class="row">

                   <div class="col-lg-4">
                     <label class="ckbox">
                       <input type="checkbox" name="main_slider" value="1">
                       <span>Main Slider</span>
                     </label>
                   </div> <!-- col 4 -->

                   <div class="col-lg-4">
                     <label class="ckbox">
                       <input type="checkbox" name="hot_deal" value="1">
                       <span>Hot Deal</span>
                     </label>
                   </div> <!-- col 4 -->

                   <div class="col-lg-4">
                     <label class="ckbox">
                       <input type="checkbox" name="best_rated" value="1">
                       <span>Best Rated</span>
                     </label>
                   </div> <!-- col 4 -->

                   
                   <div class="col-lg-4">
                     <label class="ckbox">
                       <input type="checkbox" name="trend" value="1">
                       <span>Trend Product</span>
                      </label>
                    </div> <!-- col 4 -->
                    
                    <div class="col-lg-4">
                      <label class="ckbox">
                        <input type="checkbox" name="mid_slider" value="1">
                        <span>Mid Slider</span>
                      </label>
                    </div> <!-- col 4 -->

                    <div class="col-lg-4">
                      <label class="ckbox">
                        <input type="checkbox" name="hot_new" value="1">
                        <span>Hot New</span>
                      </label>
                    </div> <!-- col 4 -->

                    <div class="col-lg-4">
                      <label class="ckbox">
                        <input type="checkbox" name="buyOne_getOne" value="1">
                        <span>Buyone Getone</span>
                      </label>
                    </div> <!-- col 4 -->
                   </div>

                   <br><br>
       
                   <div class="form-layout-footer">
                     <button class="btn btn-info mg-r-5">Submit</button>
                     <button class="btn btn-secondary">Cancel</button>
                   </div><!-- form-layout-footer -->
                 </div><!-- form-layout -->       
             </form>
        </div><!-- card -->

        
        </div><!-- row -->
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
