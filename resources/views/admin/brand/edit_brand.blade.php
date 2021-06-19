@extends('admin.admin_layouts');

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
     
     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Brand Update</h5>
       </div><!-- sl-page-title -->

       <div class="card pd-20 pd-sm-40">
         <h6 class="card-body-title">Brand Update</h6>
         
         <div class="table-wrapper">
         
         
         <form method="post" action="{{url('update/brand/'.$brand->id)}}" enctype="multipart/form-data">
                 @csrf
                   <div class="modal-body pd-20">
                       <div class="form-group">
                           <label for="brandName">Brand Name</label>
                           <input type="text" class="form-control" id="brandName" aria-describedby="emailHelp" 
                           value= "{{$brand->brand_name}}" name="brand_name" class="@error('brand_name') is-invalid @enderror">
                           @error('brand_name')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>

                       <div class="form-group">
                           <label for="brandlogo">Brand Logo</label>
                           <input type="file" class="form-control" id="brandlogo" aria-describedby="emailHelp" 
                           placeholder="Brand Logo" name="brand_logo" class="@error('brand_logo') is-invalid @enderror">
                           @error('brand_logo')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>

                       <div class="form-group">
                           <label>Old Logo</label>
                           <img src="{{URL::to($brand->brand_logo)}}" height="70px;" width="80px;">
                            <input type="hidden" name="old_logo" value="{{$brand->brand_logo}}">
                        </div>
                   </div><!-- modal-body -->
                   <div class="modal-footer">
                       <button type="submit" class="btn btn-info pd-x-20">Update</button>
                   </div>
               </form>

         </div><!-- table-wrapper -->
       </div><!-- card -->
</div><!-- sl-mainpanel -->
   <!-- ########## END: MAIN PANEL ########## -->
@endsection