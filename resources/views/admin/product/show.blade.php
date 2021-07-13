@extends('admin.admin_layouts')

@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Product Section</span>
        </nav>

        <div class="sl-pagebody">


        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product Details</h6>
                 <div class="form-layout"> 
                   <div class="row mg-b-25">
                     <div class="col-lg-4">
                       <div class="form-group">
                         <label for="productName" class="form-control-label">Product Name:</label><br>
                         <strong>{{$product->product_name}}</strong>
                       </div>
                     </div><!-- col-4 -->
                     <div class="col-lg-4">
                       <div class="form-group">
                         <label for="ProductCode" class="form-control-label">Product Code: </label><br>
                         <strong>{{$product->product_code}}</strong>
                       </div>
                     </div><!-- col-4 -->
                     <div class="col-lg-4">
                       <div class="form-group">
                         <label for="quantity" class="form-control-label">Quantity: </label><br>
                         <strong>{{$product->product_quantity}}</strong>
                       </div>
                     </div><!-- col-4 -->
                     <div class="col-lg-4">
                       <div class="form-group mg-b-10-force">
                         <label for="cat" class="form-control-label">Category:</label><br>
                         <strong>{{$product->category_name}}</strong>
                       </div>
                     </div><!-- col-4 -->
                    
                     <div class="col-lg-4">
                       <div class="form-group mg-b-10-force">
                         <label for="cat" class="form-control-label">Sub Category: </label><br>
                         <strong>{{$product->subcategory_name}}</strong>
                       </div>
                     </div><!-- col-4 -->

                     <div class="col-lg-4">
                       <div class="form-group mg-b-10-force">
                         <label for="cat" class="form-control-label">Brands:</label><br>
                         <strong>{{$product->brand_name}}</strong>
                       </div>
                     </div><!-- col-4 -->
                     
                     
                     <div class="col-lg-4">
                       <div class="form-group">
                         <label for="input" class="form-control-label">Product Size:</label><br>
                         <strong>{{$product->product_size}}</strong>
                       </div>
                     </div><!-- col-4 -->

                     <div class="col-lg-4">
                       <div class="form-group">
                         <label for="input" class="form-control-label">Product Color: </label><br>
                         <strong>{{$product->product_color}}</strong>
                       </div>
                     </div><!-- col-4 -->


                     <div class="col-lg-4">
                       <div class="form-group">
                         <label for="prosel" class="form-control-label">Selling Price</label><br>
                         <strong>{{$product->selling_price}}</strong>
                       </div>
                     </div><!-- col-4 -->

                     <div class="col-lg-12">
                       <div class="form-group">
                         <label class="form-control-label">Product Details: </label>
                         <p>{!! $product->product_details !!}</p>
                       </div> 
                     </div><!-- col-4 -->

                     <div class="col-lg-12">
                       <div class="form-group">
                         <label for="provid" class="form-control-label">Video Link:</label><br>
                         <strong>{{$product->video_link}}</strong>
                       </div> 
                     </div><!-- col-4 -->

                     <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label">Image One ( Main Thumbnali):</label><br>
                          <label class="custom-file">
                            <img src="{{URL::to($product->image_one)}}" alt="image one" style="height: 80px; width: 80px;">
                          </label>
                      </div>
                      </div><!-- col-4 -->
                     <div class="col-lg-4">
                       <div class="form-group">
                         <label for="provid" class="form-control-label" style="display: block;">Image Two :</label>
                         <label class="custom-file">
                         <img src="{{URL::to($product->image_two)}}" alt="image two" style="height: 80px; width: 80px;">
                          </label>
                       </div>
                     </div><!-- col-4 -->

                     <div class="col-lg-4"> 
                       <div class="form-group">
                         <label for="provid" class="form-control-label" style="display: block;">Image Three :</label>
                         <label class="custom-file">
                         <img src="{{URL::to($product->image_three)}}" alt="image Three" style="height: 80px; width: 80px;">
                          </label>
                       </div>
                     </div><!-- col-4 -->
                   </div><!-- row -->

                   <hr>
                   <br><br>

                   <div class="row">

                   <div class="col-lg-4">
                     <label>
                        @if($product->main_slider == 1)
                        <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">Inactive</span>
                        @endif
                        <span>Main Slider</span>
                     </label>
                   </div> <!-- col 4 -->

                   <div class="col-lg-4">
                     <label>
                        @if($product->hot_deal == 1)
                        <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">Inactive</span>
                        @endif
                       <span>Hot Deal</span>
                     </label>
                   </div> <!-- col 4 -->

                   <div class="col-lg-4">
                     <label>
                        @if($product->best_rated == 1)
                        <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">Inactive</span>
                        @endif
                       <span>Best Rated</span>
                     </label>
                   </div> <!-- col 4 -->

                   
                   <div class="col-lg-4">
                     <label>
                        @if($product->trend == 1)
                        <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">Inactive</span>
                        @endif
                       <span>Trend Product</span>
                      </label>
                    </div> <!-- col 4 -->
                    
                    <div class="col-lg-4">
                      <label>
                        @if($product->mid_slider == 1)
                        <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">Inactive</span>
                        @endif
                        <span>Mid Slider</span>
                      </label>
                    </div> <!-- col 4 -->

                    <div class="col-lg-4">
                      <label>
                        @if($product->hot_new == 1)
                        <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">Inactive</span>
                        @endif
                       <span>Hot Deal</span>
                      </label>
                    </div> <!-- col 4 -->
                   </div>

                   <br><br>
       
                  
                 </div><!-- form-layout -->       
           
        </div><!-- card -->

        
        </div><!-- row -->
  </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection
