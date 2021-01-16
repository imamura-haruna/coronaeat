<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function add()
    {
      return view('admin.shop.information');
    }
    
    public function show()
    {
      return view('admin.shop.information');
    }
    
    public function edit()
    {
      return view('admin.shop.edit');
    }
    
    public function delete()
    {
      return view('admin.shop.edit');
    }
    
    public function choice()
    {
      return view('admin.shop.choice');
    }
    
    public function login()
    {
      return view('admin.shop.login');
    }
    
    public function create()
    {
      return view('admin.shop.create');
    }
    
}
