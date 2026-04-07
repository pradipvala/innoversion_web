<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Whatsapp;
class WhatsappController extends Controller
{
    
    public function get_whatsapp_no()
    {
        $details=Whatsapp::where('name', '!=' , '')->first();
        $data['phone']=isset($details->name)&&!empty($details->name)?$details->name:NULL;
        
        // $whatsapp_link="https://api.whatsapp.com/send?phone=".$name."&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202.";
        return view('frontend.shared.header', $data);
        
      
        // return $name;
    }
    
    public function edit(Whatsapp $id)
    {
        return view('admin.pages.whatsapp.index')->with(['whatsapp'=>$id]);
    }
    public function update(Request $request,Whatsapp $id)
    {
        $id->name= $request->input('name');
        $id->save();
        return redirect()->back()->with(['id'=>$id,'message'=>'Updated Successfully']);
    }
}
