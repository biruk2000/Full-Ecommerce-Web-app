@extends('admin.admin_layouts');

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
     
     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Coupon Update</h5>
       </div><!-- sl-page-title -->

       <div class="card pd-20 pd-sm-40">
         <h6 class="card-body-title">Coupon Update</h6>
         
         <div class="table-wrapper">
         
         
         <form method="post" action="{{url('update/coupon/'.$coupon->id)}}">
                 @csrf
                   <div class="modal-body pd-20">
                       <div class="form-group">
                           <label for="exampleInputEmail1">Coupon Code</label>
                           <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                           value= "{{$coupon->coupon}}" name="coupon" class="@error('coupon') is-invalid @enderror">
                           @error('coupon')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>
                       <div class="form-group">
                           <label for="discount">Coupon Discount</label>
                           <input type="text" class="form-control" id="discount" aria-describedby="emailHelp" 
                           value= "{{$coupon->discount}}" name="discount" class="@error('discount') is-invalid @enderror">
                           @error('discount')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
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