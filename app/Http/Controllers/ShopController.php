<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function dashboard()
    {
        return view('dashboard', ['batch'=> Shop::all()]);
    }
   

    public function saveData(Request $req)
    {

        $req->validate([
            'batch'=>'required|numeric|unique:shops,batch',
        ]);
        $tshirtObj = new Shop();
        $tshirtObj-> Batch = $req-> batch;
        $tshirtObj-> Quantity = $req-> quantity; 
        $tshirtObj-> MFD = $req-> mfd; 
        $tshirtObj-> Status = $req-> status; 
        $tshirtObj-> Remarks = $req-> remarks; 


        $tshirtObj-> save();
        return redirect('/');
    }

    public function deleteData($id)
    {
        $data =  Shop :: find($id);
        $data -> delete();
        return redirect('/');
    }
    public function editData($id)
    {
       $data =  Shop :: find($id); 
       return view ('edit',['data'=> $data]);
    }
    public function updateData(Request $req)
    {
        $tshirtObj =  Shop :: find ($req -> id);

        if($tshirtObj->batch != $req->batch){
            $req->validate([
                'batch'=>'required|numeric|unique:shops,batch',
            ]);
        }
        $tshirtObj-> Batch = $req-> batch;
        $tshirtObj-> Quantity = $req-> quantity; 
        $tshirtObj-> MFD = $req-> mfd; 
        $tshirtObj-> Status = $req-> status; 
        $tshirtObj-> Remarks = $req-> remarks; 
        $tshirtObj-> save();
        return redirect('/');

    }
}