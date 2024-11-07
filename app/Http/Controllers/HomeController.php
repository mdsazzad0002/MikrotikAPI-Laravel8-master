<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \RouterOS\Client;
use \RouterOS\Query;

class HomeController extends Controller
{
    public function index() {
        $client = new Client([
            'host' =>  env('ROUTER_HOST'),//'192.168.1.11',
            'user' => env('ROUTER_USER'),//'admin',
            'pass' => env('ROUTER_PASSWORD'),//'admin'
        ]);

        $user = $client->query('/ip/hotspot/user/print')->read();
        $aktif = $client->query('/ip/hotspot/active/print')->read();
        $resource = $client->query('/system/resource/print')->read();
        $totalUser = count($user);
        $totalAktif = count($aktif);
        // dd($resource);
       return view('home', compact('totalUser', 'totalAktif', 'resource'));
    }
}
