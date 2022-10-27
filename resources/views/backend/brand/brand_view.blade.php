@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Brands Data Tables</h3>
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
                <h3 class="box-title">Brand List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Brand Name en</th>
                              <th>Brand Name pid</th>
                              <th>Brand Image</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($brands as $item)

                          <tr>
                              <td>{{ $item->brand_name_en }}</td>
                              <td>{{ $item->brand_name_pid }}</td>
                              <td> <img src=" {{  asset($item->brand_image) }} " width="70px" height="40px" alt=""> </td>
                              <td>
                                 <a href="{{ route('brand.edit',$item->id) }}" class="btn btn-warning" title="Edit Data"> <i class="fa fa-pencil"></i> </a>
                                <a href="{{ route('brand.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Delete Data"> <i class="fa fa-trash"></i> </a>
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

          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Brand List</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">

                <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data" >
                    @csrf



                        <div class="form-group">
                            <h5>Brand Name In English <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="brand_name_en" class="form-control" required="">
                                @error('brand_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Brand Name In Pidgin <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="brand_name_pid" class="form-control" required="">
                                @error('brand_name_pid')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Brand Image <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="brand_image" class="form-control" required="">
                                @error('brand_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>


                    <div class="text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Upload">
                    </div>
                </form>



               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->

           </div>
           <!-- /.col -->


        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>
<!-- /.content-wrapper -->

@endsection
