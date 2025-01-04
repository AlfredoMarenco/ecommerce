<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class CouponComponent extends Component
{
    public $coupons;
    public $createForm = [
        'name' => null,
        'code' => null,
        'status' => 1,
        'type' => 0,
        'value' => null,
        'minimum' => null,
        'quantity' => null,
    ];



    public function storeCoupon(){
        if ($this->createForm['type'] <= 2) {
            $this->validate([
                'createForm.name' => 'required|string|max:255',
                'createForm.code' => 'required|unique:coupons,code',
                'createForm.status' => 'required|in:0,1',
                'createForm.type' => 'required|in:1,2,3,4',
                'createForm.value' => 'required|numeric',
                'createForm.quantity' => 'required|numeric',
            ]);
        }

        if ($this->createForm['type'] == 3) {
            $this->validate([
                'createForm.name' => 'required|string|max:255',
                'createForm.code' => 'required|unique:coupons,code',
                'createForm.status' => 'required|in:0,1',
                'createForm.type' => 'required|in:1,2,3',
                'createForm.value' => 'required|numeric',
                'createForm.minimum' => 'required|numeric',
                'createForm.quantity' => 'required|numeric',
            ]);
        }

        if ($this->createForm['type'] == 4) {
            $this->validate([
                'createForm.name' => 'required|string|max:255',
                'createForm.code' => 'required|unique:coupons,code',
                'createForm.status' => 'required|in:0,1',
                'createForm.type' => 'required|in:1,2,3,4',
                'createForm.quantity' => 'required|numeric',
            ]);
        }

        $coupon = Coupon::create($this->createForm);
        $this->getCoupons();

        $this->reset('createForm');

    }

    public function getCoupons(){
        $this->coupons = Coupon::all();
    }

    public function mount(){
        $this->getCoupons();
    }


    public function render()
    {
        return view('livewire.admin.coupon-component')->layout('layouts.admin');
    }
}