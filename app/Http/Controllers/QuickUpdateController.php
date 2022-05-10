<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use App\Employee;
use App\Product;
use App\Cashier;

class QuickUpdateController extends Controller
{
    public function roleQuick($id)
    {
        $roles = Role::findorfail($id);

        if($roles->status)
        {
            Role::where('id', '=', $id)->update(['status' => false]);
            return back()->with('delete', 'Status change to deactive !');
        }
        else
        {
            Role::where('id','=',$id)->update(['status' => true]);
            return back()->with('success' , 'Status changed to active !');
        }
    }

    public function employeeQuick($id)
    {
        $employee = Employee::findorfail($id);

        if($employee->status)
        {
            Employee::where('id', '=', $id)->update(['status' => false]);
            return back()->with('delete', 'Employee deacitve');
        }
        else
        {
            Employee::where('id', '=', $id)->update(['status' => true]);
            return back()->with('success', 'Employee Active');
        }
    }

    public function productQuick($id)
    {
        $product = Product::findorfail($id);

        if($product->status)
        {
            Product::where('id', '=', $id)->update(['status' => false]);
            return back()->with('delete', 'Product deacitve');
        }
        else
        {
            Product::where('id', '=', $id)->update(['status' => true]);
            return back()->with('success', 'Product Active');
        }
    }

    public function cashierQuick($id)
    {
        $cashier = Cashier::findorfail($id);

        if($cashier->status)
        {
            Cashier::where('id', '=', $id)->update(['status' => false]);
            return back()->with('delete', 'cashier deacitve');
        }
        else
        {
            Cashier::where('id', '=', $id)->update(['status' => true]);
            return back()->with('success', 'cashier Active');
        }
    }
}
