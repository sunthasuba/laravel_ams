<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Facades\Excel;
use Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $users = User::where('role', '!=', null)->latest()->paginate(4);

        return view('home', compact('users'));
    }
    public function exportPdf()
    {
        $users = User::get();

        $pdf = PDF::loadView('pdf.users',['users'=>$users]);
        return $pdf->download('users.pdf');
    }

}
