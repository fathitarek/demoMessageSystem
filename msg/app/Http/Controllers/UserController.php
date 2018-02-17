<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralClass;

class UserController extends Controller
{

  public function __construct() {
     $this->middleware('auth');
    }
  public function index(){
    return GeneralClass::listData('App\User', 10, 'users.index');


  }
}
