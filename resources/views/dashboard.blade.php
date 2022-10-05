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

                <a href="{{ route('user.profile') }}" class="btn btn-warning btn-sm btn-block">Profile Update</a>

                <a href="{{ route('change.password') }}" class="btn btn-warning btn-sm btn-block">Change password</a>

                <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
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
                            Hello....
                        </span>
                        <strong>{{ Auth::user()->name }}</strong> , You're Welcome To Regal Flower Online Shop
                    </h4>

                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
