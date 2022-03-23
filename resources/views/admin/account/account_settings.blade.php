@extends('layouts.admin')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Account settings</h6>
        </div>

        <div class="card-body">

            <form action="{{route('admin.update_settings')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="col-6">
                    <div class="form-group">
                        <label for="oldpassword">old Password</label>
                        <input type="password" name="oldpassword" class="form-control">
                        @error('oldpassword')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="newpassword">new Password</label>
                        <input type="password" name="newpassword" class="form-control">
                        @error('newpassword')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>


                <div class="form-group pt-4 text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Update password</button>
                </div>
            </form>
        </div>
    </div>

@endsection

