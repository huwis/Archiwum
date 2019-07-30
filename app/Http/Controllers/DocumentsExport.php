<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Exporter;
use App\Models\Document;
use Illuminate\Http\Request;


class DocumentsExport extends Controller
{
    public function export(){
        date_default_timezone_set('Europe/Warsaw');
        $date=date("d-m-Y H-i");
        if(empty($_POST['deletes'])){
            return back()->withErrors('Brak dokumentów do eksportowania.');
        }
        else{
            $query=  DB::table('documents')->whereIn('id',$_POST['deletes'])->get(); 
            $excel = Exporter::make('Excel');
            $excel->load($query);
            return $excel->stream("Eksport dokumentów $date.xlsx");
        }
   }


}  


    



