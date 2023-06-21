@extends('admin.master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="card">

                        <center class="mt-4">
                            <img class="img-thumbnail rounded-circle avatar-xl"
                                src="{{ !empty($adminData->profile_img) ? url('upload/admin_img/' . $adminData->profile_img) : url('upload/no_image.jpg') }}"
                                alt="Card image cap">
                        </center>

                        <div class="card-body">
                            <h4 class="card-title">Name: {{ $adminData->name }}</h4>
                            <hr />
                            <h4 class="card-title">Email: {{ $adminData->email }}</h4>
                            <hr />
                            <h4 class="card-title">Username: {{ $adminData->username }}</h4>
                            <hr />
                            <a href="#" class="btn btn-info btn-rounded waves-effect waves-light">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
