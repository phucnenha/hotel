<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CustomerManagementController extends Controller
{

    public function index(Request $request)
    {

        $query = Customer::query();

        if (request('key')) {
            $query->where('full_name', 'like', '%' . request('key') . '%')
            ->orWhere('email', 'like', '%' . request('key') . '%');
        }

        $customers = $query->paginate(10)->withQueryString();
        return view('admin.customers.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = DB::table('customer')->where('id', $id)->first();
        return view('admin.customers.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = DB::table('customer')->where('id', $id)->first();

        return view('admin.customers.edit', compact('customer'));
    }


    public function update(Request $request, $id)
    {
        request()->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'nationality' => 'required',
        ]);

        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nationality' => $request->nationality,
        ];

        $customer = DB::table('customer')->where('id', $id)->update($data);

        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully');

    }

 
    public function destroy($id)
    {
        $customer = DB::table('customer')->where('id',$id);

        $customer->delete();

        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully');
    }

}

