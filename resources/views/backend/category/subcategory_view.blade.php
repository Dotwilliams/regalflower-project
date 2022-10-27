@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->

          <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Sub-Catagories Data Tables</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Tables</li>
                            <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>



		<!-- Main content -->
		<section class="content">
		  <div class="row">



			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">SubCategory List <span class="badge badge-pill badge-danger"> {{ count($subcategory) }} </span> </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Category </th>
								<th>SubCategory En</th>
								<th>SubCategory Pg </th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>
	 @foreach($subcategory as $item)
	 <tr>
		<td> {{ $item['category']['category_name_en'] }}  </td>
		<td>{{ $item->subcategory_name_en }}</td>
		 <td>{{ $item->subcategory_name_pg }}</td>
		<td width="30%">
 <a href="{{ route('subcategory.edit',$item->id) }}" class="btn btn-warning" title="Edit Data"><i class="fa fa-pencil"></i> </a>

 <a href="{{ route('subcategory.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
 	<i class="fa fa-trash"></i></a>
		</td>

	 </tr>
	  @endforeach
						</tbody>

					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->


			</div>
			<!-- /.col -->


<!--   ------------ Add Category Page -------- -->


          <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add SubCategory </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('subcategory.store') }}" >
	 	@csrf


	 <div class="form-group">
	<h5>Category Select <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="category_id" class="form-control"  >
			<option value="" selected="" disabled="">Select Category</option>
			@foreach($categories as $category)
			<option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
			@endforeach
		</select>
		@error('category_id')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 </div>
		 </div>


	<div class="form-group">
		<h5>SubCategory English <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="subcategory_name_en" class="form-control" >
     @error('subcategory_name_en')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
	</div>


	<div class="form-group">
		<h5>SubCategory Pidgin  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="subcategory_name_pg" class="form-control" >
     @error('subcategory_name_pg')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
	</div>


			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
						</div>
					</form>





					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			</div>




		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>




@endsection
