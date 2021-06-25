@extends('admin.admin_layouts');

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
     
     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Blog Post Table</h5>
       </div><!-- sl-page-title -->

       <div class="card pd-20 pd-sm-40">
         <h6 class="card-body-title">Blog Post List
             <a href="{{route('add.blogpost')}}" class="btn btn-sm btn-warning" style="float: right" >Add New Post</a>
         </h6>
         
         <div class="table-wrapper">
           <table id="datatable1" class="table display responsive nowrap">
             <thead>
               <tr>
                 <th class="wd-15p">Post Title</th>
                 <th class="wd-15p">Post Category</th>
                 <th class="wd-15p">Post Image</th>
                 <th class="wd-20p">Action</th>
               </tr>
             </thead>
             <tbody>
                 @foreach($posts as $post)
               <tr> 
                 <td>{{$post->post_title_en}}</td>
                 <td>{{$post->category_name_en}}</td>
                 <td><img src="{{URL::to($post->post_image)}}" style="height: 50px; width:50px;"></td>
                 <td>
                     <a href="{{URL::to('edit/post/'.$post->id)}}" class="btn btn-sm btn-info">Edit</a>
                     <a href="{{URL::to('delete/post/'.$post->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                 </td>
               </tr>
               @endforeach
             </tbody>
           </table>
         </div><!-- table-wrapper -->
       </div><!-- card -->
</div><!-- sl-mainpanel -->
   <!-- ########## END: MAIN PANEL ########## -->

@endsection