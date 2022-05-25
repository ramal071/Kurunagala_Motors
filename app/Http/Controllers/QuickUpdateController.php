<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use App\Employee;
use App\Product;
use App\Cashier;
use App\User;
use App\DamageProduct;

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
            return back()->with('delete', 'Employee deacitved');
        }
        else
        {
            Employee::where('id', '=', $id)->update(['status' => true]);
            return back()->with('success', 'Employee Actived');
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

    public function userQuick($id)
    {
        $user = User::findorfail($id);

        if($user->status)
        {
            User::where('id', '=', $id)->update(['status' => false]);
            return back()->with('delete',  'User deacitve');
        }
        else
        {
            User::where('id', '=', $id)->update(['status' => true]);
            return back()->with('success', 'User Active');
        }
    }

    public function damageQuick($id)
    {
        $damage = DamageProduct::findorfail($id);

        if($damage->is_return)
        {
            DamageProduct::where('id', '=', $id)->update(['is_return' => false]);
            return back()->with('delete',  'not return !!!');
        }
        else
        {
            DamageProduct::where('id', '=', $id)->update(['is_return' => true]);
            return back()->with('success', 'return !!!');
        }
    }
}
