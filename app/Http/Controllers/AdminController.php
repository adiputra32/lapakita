<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use Carbon\Carbon;
use     DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::user();
        $success = [];
        $i = 1;
        for($i; $i<=12; $i++ ){
           $success[$i] = Transaction::where('status','success')->whereMonth('created_at',$i)->whereYear('created_at','2019')->sum('total');
        }
        $success1 = array_values($success);

        $bulan = ['January','February','March','April','May','June','July','August','September','October','November','Desember'];
       
        $now = Carbon::now();
        $bulanTahunText = $now->format('F')." ".$now->format('Y');
        $tahun = $now->format('Y');
        //Per Bulan
        $namaBulan = array();
        array_push($namaBulan,"January");
        array_push($namaBulan,"February");
        array_push($namaBulan,"March");
        array_push($namaBulan,"April");
        array_push($namaBulan,"May");
        array_push($namaBulan,"June");
        array_push($namaBulan,"July");
        array_push($namaBulan,"August");
        array_push($namaBulan,"September");
        array_push($namaBulan,"October");
        array_push($namaBulan,"November");
        array_push($namaBulan,"December");
        $dataChart = array();
        for($i = 1; $i <= 12; $i++){
            $row = Transaction::selectRaw("SUM(total) as total, COUNT(id) as jumlah")
            ->where(DB::raw('MONTH(created_at)'),'=',$i)
            ->where(DB::raw('YEAR(created_at)'),'=',$tahun)
            ->where("status","success")
            ->first();
            $penjualan = $row->total;
            $jumlah = $row->jumlah;
            if($penjualan == null){
                $penjualan = 0;
            }
            if($jumlah == null){
                $jumlah = 0;
            }
            array_push($dataChart,array('penjualan' => $penjualan,'bulan'=>$namaBulan[$i-1],'jumlah' => $jumlah));
        }

        $namaTahun = array();
        $dataTahun = Transaction::selectRaw('YEAR(created_at) as tahun')->groupBy(DB::raw('YEAR(created_at)'))->get();
        foreach($dataTahun as $data){
            array_push($namaTahun,$data->tahun);
        }
        $dataPertahun = array();
        for($i = 0; $i < count($namaTahun); $i++){
            $row = Transaction::selectRaw("SUM(total) as total, COUNT(id) as jumlah")
            ->where(DB::raw('YEAR(created_at)'),'=',$namaTahun[$i])
            ->where("status","success")
            ->first();
            $penjualan = $row->total;
            $jumlah = $row->jumlah;
            if($penjualan == null){
                $penjualan = 0;
            }
            if($jumlah == null){
                $jumlah = 0;
            }
            array_push($dataPertahun,array('penjualan' => $penjualan,'tahun'=>$namaTahun[$i],'jumlah' => $jumlah));
        }
        

        return view('admin.dashboard',['success1'=>$success1,'admin'=>$admin,'bulanTahunText'=>$bulanTahunText,'dataChart'=>$dataChart,'dataPertahun'=>$dataPertahun]);
    }
}
