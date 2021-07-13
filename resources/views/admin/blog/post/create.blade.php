@extends('admin.admin_layouts')

 @section('css')
<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
@endsection 

@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Blog Section</span>
        </nav>

        <div class="sl-pagebody">


        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Add New Post
 
            <a href="{{route('all.blogpost')}}" class="btn btn-success btn-sm pull-right">All Post</a>
          </h6>
          <p class="mg-b-20 mg-sm-b-30">New Post Add Form</p>
             <form action="{{route('store.post')}}" method="post" enctype="multipart/form-data">
                @csrf
                 <div class="form-layout"> 
                   <div class="row mg-b-25">
                     <div class="col-lg-4">
                       <div class="form-group">
                         <label for="productName" class="form-control-label">Post Title (ENGLISH): <span class="tx-danger">*</span></label>
                         <input id="productName" class="form-control" type="text" name="post_title_en" placeholder="Enter Post Title in English">
                       </div>
                     </div><!-- col-4 -->
                     <div class="col-lg-4">
                       <div class="form-group">
                         <label for="ProductCode" class="form-control-label">Post Title (AMHARIC):<span class="tx-danger">*</span></label>
                         <input id="productCode" class="form-control" type="text" name="post_title_am"  placeholder="Enter Post Title in English">
                       </div>
                     </div><!-- col-4 -->

                     <div class="col-lg-4">
                       <div class="form-group mg-b-10-force">
                         <label for="cat" class="form-control-label">Blog Category: <span class="tx-danger">*</span></label>
                         <select id="cat" class="form-control select2" data-placeholder="Choose Post Category in English" name="category_id">
                         <option label="Choose Blog Category"></option>
                            @foreach($blogcats as $blogcat)
                            <option value="{{$blogcat->id}}">{{$blogcat->category_name_en}}</option>
                           @endforeach
                         </select>
                       </div>
                     </div><!-- col-4 -->


                     <div class="col-lg-12">
                       <div class="form-group">
                         <label class="form-control-label">Post Detail (ENGLISH): <span class="tx-danger">*</span></label>
                         <textarea id="summernote" class="form-control" name="details_en"  cols="30" rows="10"></textarea>
                       </div> 
                     </div><!-- col-4 -->
                     <div class="col-lg-12">
                       <div class="form-group">
                         <label class="form-control-label">Post Detail (AMAHRIC): <span class="tx-danger">*</span></label>
                         <textarea id="summernote1" class="form-control" name="details_am"  cols="30" rows="10"></textarea>
                       </div> 
                     </div><!-- col-4 -->



                     <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label">Image One ( Main Thumbnali): <span class="tx-danger">*</span></label>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL(this);" required="">
                            <span class="custom-file-control"></span>
                            <br><br>
                            <img src="#" id="one">
                        </label>

                      </div>
                      </div><!-- col-4 -->
                   </div><!-- row -->
       
                   <div class="form-layout-footer">
                     <button class="btn btn-info mg-r-5" type="submit">Submit</button>
                   </div><!-- form-layout-footer -->
                 </div><!-- form-layout -->       
             </form>
        </div><!-- card -->

        
        </div><!-- row -->
  </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    @section('js')
    
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
 
    @endsection
@endsection
