<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Model\District;
class DistrictController extends Controller
{
  public function index()
  {
    $district = District::all();
    return response()->json($district);
  }
}