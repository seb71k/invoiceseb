<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File; // image
use Illuminate\Support\Facades\Input;  //image
use DB;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class invoiceinsertController extends Controller {

public function insertform(){
return view('newinvoice');
}

public function insert(Request $request){

//*****VALIDAZIONE*****
     
 $validator = Validator::make($request->all(), [
            'idcustomer' => 'required',
            'ninvoice' => 'required',
            'dateinvoice' => 'required'

        ]);

        if ($validator->fails()) {
 
echo "<font color=#FF0000>Missing or incorrect fields.</font><br><br>";
 return view('newinvoice')->with('error', 'incorrect data');

        }
             
// ****FINE VALIDAZIONE*****


$idcustomer = $request->input('idcustomer');
$ninvoice = $request->input('ninvoice');
$dateinvoice = $request->input('dateinvoice');


$data=array('idcustomer'=>$idcustomer,"ninvoice"=>$ninvoice,"dateinvoice"=>$dateinvoice);

DB::table('invoiceseb_customer')->insert($data);

 return view('newinvoicerow')->with('ninvoice',$ninvoice,'idcustomer',$idcustomer);
}
}
