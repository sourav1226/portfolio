<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userList()
    {
        return view('employee.list');
    }
    public function userSalary()
    {
        return view('employee.salary');
    }
    public function userAdd()
    {
        return view('employee.add');
    }
}
