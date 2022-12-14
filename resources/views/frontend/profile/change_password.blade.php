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
                <a href="{{ route('dashboard') }}" class="btn btn-warning btn-sm btn-block">My Acct</a>
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

                        <strong>Change Password</strong>
                    </h4>

                    <div class="card-body">
                        <form method="post" action="{{ route('user.password.update') }}">
                            @csrf
                <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Current Password </label>
        <input type="password"  id="current_password" name="oldpassword" class="form-control">
        </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">New Password </label>
        <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Confirm Password </label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
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
