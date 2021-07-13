@extends('admin.admin_layouts');

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
     
     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Product Table</h5>
       </div><!-- sl-page-title -->

       <div class="card pd-20 pd-sm-40">
         <h6 class="card-body-title">Product List
             <a href="{{route('add.product')}}" class="btn btn-sm btn-warning" style="float: right">Add New</a>
         </h6>
         
         <div class="table-wrapper">
           <table id="datatable1" class="table display responsive nowrap">
             <thead>
               <tr>
                 <th class="wd-15p">Product code</th>
                 <th class="wd-15p">Product name</th>
                 <th class="wd-15p">Image</th>
                 <th class="wd-15p">Category</th>
                 <th class="wd-15p">Brand</th>
                 <th class="wd-15p">Quantity</th>
                 <th class="wd-15p">Price</th>
                 <th class="wd-15p">Status</th>
                 <th class="wd-20p">Action</th>
               </tr>
             </thead>
             <tbody>
                 @foreach($products as $product)
               <tr> 
                 <td>{{$product->product_code}}</td>
                 <td>{{$product->product_name}}</td>
                 <td> <img src="{{ URL::to($product->image_one)}}" height="50px;" width="50px;"></td>
                 <td>{{$product->category_name}}</td>
                 <td>{{$product->brand_name}}</td>
                 <td>{{$product->product_quantity}}</td>
                 <td>{{$product->selling_price}}</td>
                 <td>
                     @if($product->status == 1)
                        <span class="badge badge-success">Active</span>
                     @else  
                     <span class="badge badge-danger">Inactive</span>
                     @endif
                    </td> 
                 <td>
                     <a href="{{URL::to('edit/product/'.$product->id)}}" class="btn btn-sm btn-info">
                     <i class="fa fa-edit"></i></a>
                     <a href="{{URL::to('delete/product/'.$product->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete">
                     <i class="fa fa-trash"></i></a>
                     <a href="{{URL::to('view/product/'.$product->id)}}" class="btn btn-sm btn-warning" title="Show">
                     <i class="fa fa-eye"></i></a>

                     @if($product->status == 1)
                     <a href="{{URL::to('inactive/product/'.$product->id)}}" class="btn btn-sm btn-danger" title="Active">
                      <i class="fa fa-thumbs-up"></i></a>
                     @else
                     <a href="{{URL::to('active/product/'.$product->id)}}" class="btn btn-sm btn-info" title="Inactive">
                      <i class="fa fa-thumbs-down"></i></a>
                     @endif
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
@endsection