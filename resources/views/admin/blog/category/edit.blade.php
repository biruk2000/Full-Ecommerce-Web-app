@extends('admin.admin_layouts');

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
     
     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Blog Category Update</h5>
       </div><!-- sl-page-title -->

       <div class="card pd-20 pd-sm-40">
         <h6 class="card-body-title">Blog Category Update</h6>
         
         <div class="table-wrapper">
         
         
         <form method="post" action="{{url('update/blog/category/'.$blogcat->id)}}">
                 @csrf
                   <div class="modal-body pd-20">
                   <div class="form-group">
                           <label for="cateEn">Category English Name</label>
                           <input type="text" class="form-control" id="cateEn" aria-describedby="emailHelp" 
                           value="{{$blogcat->category_name_en}}" name="category_name_en" class="@error('category_name_en') is-invalid @enderror">
                           @error('category_name_en')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>
                       <div class="form-group">
                           <label for="cateAm">Category Amharic Name</label>
                           <input type="text" class="form-control" id="cateAm" aria-describedby="emailHelp" 
                           value="{{$blogcat->category_name_am}}" name="category_name_am" class="@error('category_name_am') is-invalid @enderror">
                           @error('category_name_am')
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