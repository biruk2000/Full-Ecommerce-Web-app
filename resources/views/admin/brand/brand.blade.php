@extends('admin.admin_layouts');

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
     
     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Brand Table</h5>
       </div><!-- sl-page-title -->

       <div class="card pd-20 pd-sm-40">
         <h6 class="card-body-title">Brand List
             <a href="" class="btn btn-sm btn-warning" style="float: right" data-toggle="modal" data-target="#modaldemo3">Add New</a>
         </h6>
         
         <div class="table-wrapper">
           <table id="datatable1" class="table display responsive nowrap">
             <thead>
               <tr>
                 <th class="wd-15p">ID</th>
                 <th class="wd-15p">Brand name</th>
                 <th class="wd-15p">Brand logo</th>
                 <th class="wd-20p">Action</th>
               </tr>
             </thead>
             <tbody>
                 @foreach($brands as $brand)
               <tr> 
                 <td>{{$brand->id}}</td>
                 <td>{{$brand->brand_name}}</td>
                 <td> <img src="{{ URL::to($brand->brand_logo)}}" height="70px;" width="80px;"></td>
                 <td>
                     <a href="{{URL::to('edit/brand/'.$brand->id)}}" class="btn btn-sm btn-info">Edit</a>
                     <a href="{{URL::to('delete/brand/'.$brand->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                 </td>
               </tr>
               @endforeach
             </tbody>
           </table>
         </div><!-- table-wrapper -->
       </div><!-- card -->
</div><!-- sl-mainpanel -->
   <!-- ########## END: MAIN PANEL ########## -->

   <!-- LARGE MODAL -->
   <div id="modaldemo3" class="modal fade">
         <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content tx-size-sm">
             <div class="modal-header pd-x-20">
               <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Brand Add</h6>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div> 
             
             <form method="post" action="{{route('store.brand')}}" enctype="multipart/form-data">
                 @csrf
                   <div class="modal-body pd-20">
                       <div class="form-group">
                           <label for="brandName">Brand Name</label>
                           <input type="text" class="form-control" aria-describedby="emailHelp" 
                           placeholder="Brand" name="brand_name" id="brandName" class="@error('brand_name') is-invalid @enderror">
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

                   </div><!-- modal-body -->
                   <div class="modal-footer">
                       <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                       <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                   </div>
               </form>
           </div>
         </div><!-- modal-dialog -->
       </div><!-- modal -->



@endsection