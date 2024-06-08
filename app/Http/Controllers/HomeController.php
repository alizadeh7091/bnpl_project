<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $services = Service::paginate(25);

        return view('home')->with([
            'services' => $services
        ]);
    }
}
