@extends('layouts.admin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Create Coupon</h6>
            <div class="ml-auto">
                <a href="{{ route('admin.coupon.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">Coupons</span>
                </a>
            </div>
        </div>


        <div class="card-body">

            <form action="{{ route('admin.coupon.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="code">code</label>
                            <input type="text" name="code" value="{{ old('code') }}" class="form-control">
                            @error('code')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="value">value</label>
                            <input type="number" name="value" value="{{ old('value') }}" class="form-control">
                            @error('value')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="col-3">
                        <label for="status">status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status') == 1 ? 'selected' : null }}>Active</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : null }}>Inactive</option>
                        </select>
                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-3">
                        <label for="type">Type</label>
                        <select name="type" class="form-control">
                            <option value="percentage">Percentage</option>
                            <option value="fixed">Fixed</option>
                        </select>
                        @error('type')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label for="start_date">Start date</label>
                            <input type="date" name="start_date" value="{{ old('start_date') }}" class="form-control">
                            @error('start_date')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>


                    <div class="col-3">
                        <div class="form-group">
                            <label for="expire_date">Expire date</label>
                            <input type="date" name="expire_date" value="{{ old('expire_date') }}"
                                   class="form-control">
                            @error('expire_date')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label for="use_times">use time</label>
                            <input type="number" name="use_times" value="{{ old('use_times') }}" class="form-control">
                            @error('use_times')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label for="min_total">min total</label>
                            <input type="number" name="min_total" value="{{ old('min_total') }}" class="form-control">
                            @error('min_total')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="description">description</label>
                            <input type="text" name="description" value="{{ old('description') }}" class="form-control">
                            @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>


                <div class="form-group pt-4">
                    <button type="submit" name="submit" class="btn btn-primary">Add Coupon</button>
                </div>
            </form>
        </div>
    </div>

@endsection
