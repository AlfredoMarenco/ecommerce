<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Department;
use App\Models\District;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CreateOrder extends Component
{

    public $departments, $cities = [], $districts = [];
    public $department_id = "", $city_id = "", $district_id = "";
    public $address, $references, $contact, $phone, $shipping_cost = 0;
    public $shipping_type = 1;

    public $rules = [
        'contact' => 'required',
        'phone' => 'required',
        'shipping_type' => 'required',
    ];

    public function mount()
    {
        $this->departments = Department::all();
    }

    public function updatedShippingType($value)
    {
        if ($value == 1) {
            $this->resetValidation(['department_id', 'city_id', 'district_id', 'address', 'references']);
            $this->reset(['department_id', 'city_id', 'district_id']);
        }
    }

    public function updatedDepartmentId($value)
    {
        $this->cities = City::where('department_id', $value)->get();
        $this->reset(['district_id', 'city_id']);
    }

    public function updatedCityId($value)
    {
        $city = City::find($value);
        $this->shipping_cost = $city->cost;
        $this->districts = District::where('city_id', $value)->get();
        $this->reset('district_id');
    }

    public function createOrder()
    {
        $rules = $this->rules;

        if ($this->shipping_type == 2) {
            $rules['department_id'] = 'required';
            $rules['city_id'] = 'required';
            $rules['district_id'] = 'required';
            $rules['address'] = 'required';
            $rules['references'] = 'required';
        }

        $this->validate($rules);
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->contact = $this->contact;
        $order->phone = $this->phone;
        $order->shipping_type = $this->shipping_type;
        $order->shipping_cost = 0;
        $order->total = $this->shipping_cost + Cart::subtotal();
        $order->content = Cart::content();

        if ($this->shipping_type == 2) {
            $order->shipping_cost = $this->shipping_cost;
            $order->department_id = $this->department_id;
            $order->city_id = $this->city_id;
            $order->district_id = $this->district_id;
            $order->address = $this->address;
            $order->references = $this->references;
        }

        $order->save();
        Cart::destroy();
        return redirect()->route('orders.payment', $order);
    }

    public function render()
    {
        return view('livewire.create-order');
    }
}
