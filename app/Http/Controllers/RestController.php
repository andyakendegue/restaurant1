<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadFiles;
use App\Http\Controllers\Controller;

class RestController extends Controller
{
  public function index(Request $request)
  {

    $utilisateurs = DB::select('select * from menu');
    //$request->session()->buildSession();
    $json_result = json_encode($utilisateurs);
    return $payload;
  }
}
