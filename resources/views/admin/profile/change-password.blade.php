@extends('admin.master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10 offset-1">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Change Password Page</h4>
                            <br><br>

                            <!-- Showing Error Message -->
                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-success alert-dismissible fade show">
                                        {{ $error }}
                                    </p>
                                @endforeach
                            @endif

                            <form action="{{ route('update.password') }}" method="POST">
                                @csrf

                                <!-- Old Password -->
                                <div class="row mb-3">
                                    <label for="old_pass" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="old_pass" id="old_pass" class="form-control">
                                    </div>
                                </div>
                                <!-- New Password -->
                                <div class="row mb-3">
                                    <label for="new_pass" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="new_pass" id="new_pass" class="form-control">
                                    </div>
                                </div>
                                <!-- Confirm Password -->
                                <div class="row mb-3">
                                    <label for="confirm_pass" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="confirm_pass" id="confirm_pass" class="form-control">
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <input type="submit" value="Update Profile" class="btn btn-info waves-effect waves-light">

                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>
@endsection
