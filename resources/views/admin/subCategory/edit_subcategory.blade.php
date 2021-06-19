@extends('admin.admin_layouts');

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
     
     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Sub Category Table</h5>
       </div><!-- sl-page-title -->

       <div class="card pd-20 pd-sm-40">
         <h6 class="card-body-title">Edit Sub Category
            
         </h6>
         
         <div class="table-wrapper">
           
         <form method="post" action="{{url('update/subCategory/'.$subCategory->id)}}">
                 @csrf
                   <div class="modal-body pd-20">
                       <div class="form-group">
                           <label for="subCat">Sub Category Name</label>
                           <input value="{{$subCategory->subcategory_name}}" type="text" class="form-control" id="subCat" aria-describedby="emailHelp" 
                           placeholder="Sub Category" name="subcategory_name" class="@error('subcategory_name') is-invalid @enderror">
                           @error('subcategory_name')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>
 
                       <div class="form-group">
                           <label for="subCat">Category Name</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                
                                <?php if($category->id == $subCategory->category_id ){
                                    echo "selected";
                                } ?> >{{$category->category_name}}</option>
                                @endforeach
                            </select>
                       </div>
                   </div><!-- modal-body -->
                   <div class="modal-footer">
                       <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                       <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                   </div>
               </form>

         </div><!-- table-wrapper -->
       </div><!-- card -->
</div><!-- sl-mainpanel -->
@endsection