<?php

namespace App\Http\Controllers;

use App\Models\BK;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\CPL;
use App\Models\DetailCPLBK;

class Controller extends BaseController
{

    public function edit(Request $request){
        $cpl = CPL::all();
        $bk = BK::all();
        $cpl_bk = DB::select('SELECT det.bk AS kode_bk,GROUP_CONCAT(det.cpl) AS pemetaan FROM detail_cplbk det GROUP BY kode_bk');
        $values = [];


        foreach ($cpl_bk as $record) {
            $values[] = $record->kode_bk;
        }
        $cpl_bk = json_encode($cpl_bk);

        return view('CPLedit',compact(['cpl','bk',"cpl_bk","values"]));
    }

    public function update(Request $request, $kodeBK){ 
        
        $bk = BK::where('kodeBK',$kodeBK)->first();
        $cpl_bk = DB::select('SELECT det.bk AS kode_bk,GROUP_CONCAT(det.cpl) AS pemetaan FROM detail_cplbk det where det.bk = ? group by kode_bk',[$bk->kodeBK]);
        $cpl = CPL::all();
        $cpl_bks = json_encode($cpl_bk);
        $recordIds = $request->input('checkboxes', []);


        foreach ($cpl as $record) {
            if (in_array($record->kodeCPL, $recordIds)) {
                // Checkbox is checked, update the record
                if($cpl_bk){
                    foreach(json_decode($cpl_bks,true) as $data){
                        if(!(in_array($record->kodeCPL, explode(',', (json_decode(json_encode($data["pemetaan"]),true)))))){
                            DB::insert('insert into detail_cplbk (bk, cpl) values (?, ?)', [$bk->kodeBK, $record->kodeCPL]);
                        }


                    }
                }else{
                    DB::insert('insert into detail_cplbk (bk, cpl) values (?, ?)', [$bk->kodeBK, $record->kodeCPL]);
                }
            } else {
                // Checkbox is unchecked, delete the record
                DB::delete('delete from detail_cplbk where bk = ? and cpl = ?', [$bk->kodeBK, $record->kodeCPL]);
            }
        }
        return redirect()->back()->with('success', 'Data barang berhasil diubah');
    }

    
    public function index(){
        $cpl = CPL::all();
        $bk = BK::all();
        $cpl_bk = DB::select('SELECT det.bk AS kode_bk,GROUP_CONCAT(det.cpl) AS pemetaan FROM detail_cplbk det GROUP BY kode_bk');
        $values = [];


        foreach ($cpl_bk as $record) {
            $values[] = $record->kode_bk;
        }
        $cpl_bk = json_encode($cpl_bk);

        return view('CPL',compact(['cpl','bk',"cpl_bk","values"]));
    }


    
    

}
    