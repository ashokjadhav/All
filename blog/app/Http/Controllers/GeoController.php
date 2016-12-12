<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Geolocation;

class GeoController extends Controller
{
  public function index(){
    dd(new Geolocation('1600 Amphitheatre Parkway, Mountain View, CA', 'geolocation'));
    $geolocation = new Geolocation('1600 Amphitheatre Parkway, Mountain View, CA', 'geolocation');
    dd($geolocation->getGeolocationCoordinates());
 }
 }
