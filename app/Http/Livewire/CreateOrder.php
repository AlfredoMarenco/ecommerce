<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Coupon;
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
    public $shipping_type = 2;
    public $coupon_code;
    public $discount = null;
    public $flag_discount = true;

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

    public function applyCoupon(){
        $discount = Coupon::where('code', $this->coupon_code)->where('status',1)->first();

        if ($discount) {
            switch ($discount->type) {
                case '1':
                    $this->discount = $discount;
                    break;
                case '2':
                    $this->discount = $discount;
                    break;
                case '3':
                    if ($discount->minimum < Cart::subtotal()) {
                        $this->discount = $discount;
                    }else{
                        session()->flash('message', 'Compra no cumple con el minimo para aplicarse');
                    }
                    break;
                case '4':
                    $this->discount = $discount;
                    break;
            }
        }else{
            session()->flash('message', 'Codigo no valido');
        }
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
        if ($this->discount) {
            switch ($this->discount->type) {
                case '1':
                    $order->total = Cart::subtotal() + $this->shipping_cost - (Cart::subtotal() * $this->discount->value) / 100;
                    break;
                case '2':
                    $order->total = Cart::subtotal() + $this->shipping_cost - $this->discount->value;
                    break;
                case '3':
                    $order->total = Cart::subtotal() + $this->shipping_cost - $this->discount->value;
                    break;
                case '4':
                    $order->total = Cart::subtotal() - $this->shipping_cost;
                    break;
            }
        }else{
            $order->total = $this->shipping_cost + Cart::subtotal();
        }
        $order->coupon_id = $this->discount->id;

        $order->content = Cart::content();

        if ($this->shipping_type == 2) {
            $order->shipping_cost = $this->shipping_cost;
            $order->envio = json_encode([
                'department' => Department::find($this->department_id)->name,
                'city' => City::find($this->city_id)->name,
                'district' => District::find($this->district_id)->name,
                'address' => $this->address,
                'reference' => $this->references,
            ]);
        }

        $order->save();

        foreach (Cart::content() as $item) {
            discount($item);
        }

        Cart::destroy();
        return redirect()->route('orders.payment', $order);
    }

    public function resetDiscount(){
        $this->reset('discount');
        $this->reset('coupon_code');
    }

    public function render()
    {
        return view('livewire.create-order');
    }
}