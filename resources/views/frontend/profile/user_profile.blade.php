@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <!-- col-2 -->
            <div class="col-md-2"> <br> <br>
                <img src="{{ (!empty($user->profile_photo_path))?
                         url('upload/user_images/'.$user->profile_photo_path):
                         url('upload/no_image.jpg') }}"
                          class="card-img-top"
                          style="border-radius: 50%"
                          height="100%"
                          width="100%"
                           alt="">

                           <br> <br>
                           <ul class="list-group list-group-flush">
                <a href="{{ route('dashboard') }}" class="btn btn-warning btn-sm btn-block">Dashboard</a>
                <a href="" class="btn btn-warning btn-sm btn-block">Wishlist</a>
                <a href=" {{ route('user.profile') }} " class="btn btn-warning btn-sm btn-block">Profile Update</a>
                <a href="{{ route('change.password') }}" class="btn btn-warning btn-sm btn-block">Change password</a>
                <a href=" {{route('user.logout')}} " class="btn btn-danger btn-sm btn-block">Logout</a>
                           </ul>

            </div>

            <!-- col-2 -->
            <div class="col-md-2">

            </div>


            <!-- col-6 -->
            <div class="col-md-6">
                <br> <br>
                <div class="card">
                    <h4 class="text-center">
                        <span class="text-danger">
                            Hi....
                        </span>
                        <strong>{{ Auth::user()->name }}</strong> , Update Your Profile
                    </h4>

                    <div class="card-body">
                        <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                            @csrf
                <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Name </label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Email </label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Phone </label>
        <input type="text" id="email" name="phone" class="form-control" value="{{ $user->phone }}">
        </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">User Image </label>
        <input type="file"  name="profile_photo_path" class="form-control" value="{{ $user->phone }}">
        </div>

        <div class="form-group">
           <button type="submit" class="btn btn-danger">Update</button>
        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
