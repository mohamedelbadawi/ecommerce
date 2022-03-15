<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code'=>'Fifty',
            'type'=>'percentage',
            'value'=>50,
            'description'=>'50% discount for all products',
            'use_times'=>5,
            'min_total'=>300,
            'start_date'=>Carbon::now(),
            'expire_date'=>Carbon::now()->addWeek(),
            'status'=>true
        ]);
        Coupon::create([
            'code'=>'50egp',
            'type'=>'fixed',
            'value'=>50,
            'description'=>'50egp discount for all products',
            'use_times'=>10,
            'min_total'=>500,
            'start_date'=>Carbon::now(),
            'expire_date'=>Carbon::now()->addWeek(),
            'status'=>true
        ]);
    }
}
