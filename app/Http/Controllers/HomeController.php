<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function  index(){
      $this->data['data'] = User::query()->get();
      return view('dashboard.home',$this->data);

  }
}