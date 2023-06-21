@extends('admin.master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10 offset-1">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Profile Page</h4>

                            <form action="{{ route('store.profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Name -->
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $editData->name }}">
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ $editData->email }}">
                                    </div>
                                </div>
                                <!-- User Name -->
                                <div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="username" id="username" class="form-control"
                                            value="{{ $editData->username }}">
                                    </div>
                                </div>
                                <!-- Profile Image -->
                                <div class="row mb-3">
                                    <label for="profile_img" class="col-sm-2 col-form-label">Profile Photo</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="profile_img" id="profile_img" class="form-control">
                                    </div>
                                </div>

                                <!-- Profile Image -->
                                <div class="row mb-3">
                                    <label for="profile_img_show" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="profile_img_show"
                                            src="{{ !empty($editData->profile_img) ? url('upload/admin_img/' . $editData->profile_img) : url('upload/no_image.jpg') }}"
                                            class="rounded avatar-xl" alt="{{ $editData->name }}">
                                    </div>
                                </div>

                                <input type="submit" value="Update Profile" class="btn btn-info waves-effect waves-light">

                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>


        </div>
    </div>

    <script>
        // Showing inserted image to the img tag
        $(document).ready(function() {
            $('#profile_img').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#profile_img_show').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
