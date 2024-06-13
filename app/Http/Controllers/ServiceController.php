<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function allServices()
    {
        $services = Service::paginate(10);

//        var_dump($services);
        return view('service.all')->with([
            'services' => $services
        ]);
    }
}
