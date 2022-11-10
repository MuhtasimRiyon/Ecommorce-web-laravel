@extends('frontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <br>
                
                <img class="card-img-top" style="border-radius: 50%" src="{{ (!empty($user->profile_photo_path)) ? url($user->profile_photo_path) : url('upload/no_image.jpg')  }}" height="100%" width="100%" alt="">
                <br><br>
                <ul class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
             </div> <!-- end col md 2 -->

             <div class="col-md-2">

             </div> <!-- end col md 2 -->

             <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi...</span><strong>{{ Auth::user()->name }}</strong> Change password</h3>
                    <div class="card-body">
                        <br>
                        <form action="{{ route('user.pass.update') }}" method="post">
                            @csrf

                            <!-- <input type="hidden" value="{{ $user->profile_photo_path }}" name="old_path">
                            <input type="hidden" value="{{ $user->id }}" name="id"> -->
                            
                            <div class="form-group">
                                <h5>Current Password:</h5>
                                <div class="controls">
                                    <input type="password" id="current_password" name="oldpassword" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>New Password:</h5>
                                <div class="controls">
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Confirm Password:</h5>
                                <div class="controls">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="Submit" class="btn btn-info">Change password</button>
                            </div>

                        </form>
                    </div>
                </div>

             </div> <!-- end col md 6 -->

        </div> <!-- end row -->
    </div>
</div>
@endsection