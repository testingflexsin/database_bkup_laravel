<?php

namespace App\Http\Controllers;

use Artisan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Backup all databases
     *
     * @param $s Flag to backup 'backup'
     * @return \Illuminate\Http\Response
     */
    public function backupDatabase(Request $request)
    {
        if($request->get('s') && $request->get('s') == 'backup') {
            Artisan::call('db:dump');
        }
        return view('backup-db');
    }
}
