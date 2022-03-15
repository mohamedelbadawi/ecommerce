<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponReqeust;
use App\Models\Coupon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        try {
            $coupons = Coupon::paginate(10);
        } catch (ModelNotFoundException $exception) {

            return redirect()->route('admin.dashboard');
        }
        return view('admin.coupon.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.coupon.create');
    }

    public function store(CouponReqeust $reqeust)
    {
        try {
            Coupon::create(
                $reqeust->validated());
            Alert::success('Done', 'Coupoun created successfully');
        } catch (ModelNotFoundException $exception) {
            Alert::error('Error', 'Can\'t create coupon now');
        }
        return redirect()->route('admin.coupon.index');
    }

    public function edit(Coupon $coupon)
    {
        return view('admin.coupon.edit', compact('coupon'
        ));
    }

    public function update(CouponReqeust $reqeust, Coupon $coupon)
    {
        try {
            $coupon->update($reqeust->validated());
            Alert::success('Done', 'Coupon updated successully');
        } catch (ModelNotFoundException $exception) {
            Alert::error('Error', 'cannot update coupon now');
        }
        return redirect()->route('admin.coupon.index');
    }

    public function destroy(Coupon $coupon)
    {
        try {
            $coupon->delete();
            Alert::success('Done', 'coupon deleted successfully');
        } catch (ModelNotFoundException $exception) {
            Alert::error('error', 'Cannot delete this coupon now ');
        }
        return redirect()->route('admin.coupon.index');
    }
}
