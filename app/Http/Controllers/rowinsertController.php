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

class rowinsertController extends Controller {

public function insertformrow(){
return view('newinvoice');
}

public function insertrow(Request $request){

//*****VALIDAZIONE*****
     
 $validator = Validator::make($request->all(), [
            'idinvoice' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'amount' => 'required'
            //'importoiva' => 'required'
        ]);

        if ($validator->fails()) {
   
echo "<font color=#FF0000>Missing or incorrect fields.</font><br><br>";
 return view('newinvoicerow')->with('error', 'incorrect data');

        }
             
// ****FINE VALIDAZIONE*****
$idinvoice = $request->input('idinvoice');
$quantity = $request->input('quantity');
$description = $request->input('description');
$amount = $request->input('amount');
//$importoiva = $request->input('importoiva');
$amountvat = sprintf('%0.2f', $request->input('amountvat'));
$totalwithvat = $request->input('totalwithvat');
$ninvoice = $request->input('ninvoice');
$idcustomer = $request->input('idcustomer');


$data=array('idinvoice'=>$idinvoice,'quantity'=>$quantity,"description"=>$description,"amount"=>$amount,"amountvat"=>$amountvat,"totalwithvat"=>$totalwithvat);

DB::table('invoiceseb_row')->insert($data);

$data = DB::table("invoiceseb_row")->sum('amountvat');
DB::table('invoiceseb_row')->where('idinvoice', $ninvoice)->take(1)->update(['totalwithvat'=>$data]);


 return view('newinvoicerow')->with('ninvoice',$ninvoice,'idcustomer',$idcustomer);
}
}
