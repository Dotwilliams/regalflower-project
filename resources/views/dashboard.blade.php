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
                <a href="{{ route('user.profile') }}" class="btn btn-warning btn-sm btn-block">My Account</a>

                <a href="" class="btn btn-warning btn-sm btn-block">Wishlist</a>

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
                        <p style="text-align: center; font-size: 40px; font-weight: bolder;" class="btn btn-info">
                              Dashboard
                            </p>

                        <br> <br> <br>
                        <span class="text-danger">
                            Hello....
                        </span>
                        <strong>{{ Auth::user()->name }}</strong> , You're Welcome To Regal Flower Online Shop



                    </h4>


                    <div class="card-body" style="margin-top: 50px; font-size: 15px;">
                        <p>
                          From your dashboard you can <a href="">update your profile</a> or view your<a href=""> recent orders</a>,
                          manage your <a href="">wishlist</a>, shipping / billing addresses, and also <a href="">edit your
                            password</a>  and <a href="">account details</a>  .
                        </p>
                        <br><br>
                        <button style="float: right;" class="btn btn-warning btn-sm">Go Shopping</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
