<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth,DB;

class Digital_Vcard extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'digital_vcard';


    public function saveCard($request)
    {

        // $curd['id'] = $this->findOrNew($request->id);

        $curd['name'] = isset($request->name)&&!empty($request->name)?$request->name:NULL;
        $curd['designation']=isset($request->designation)&&!empty($request->designation)?$request->designation:NULL;

        $curd['company_name']=isset($request->company_name)&&!empty($request->company_name)?$request->company_name:NULL;
        $curd['company_description']=isset($request->company_description)&&!empty($request->company_description)?$request->company_description:NULL;
        $curd['phone_no']=isset($request->phone_no)&&!empty($request->phone_no)?$request->phone_no:NULL;

        $curd['email']=isset($request->email)&&!empty($request->email)?$request->email:NULL;
        $curd['website']=isset($request->website)&&!empty($request->website)?$request->website:NULL;
        $curd['address']=isset($request->address)&&!empty($request->address)?$request->address:NULL;
        $curd['location']=isset($request->location)&&!empty($request->location)?$request->location:NULL;

        $curd['whatsapp_no']=isset($request->whatsapp_no)&&!empty($request->whatsapp_no)?$request->whatsapp_no:NULL;
        $curd['facebook']=isset($request->facebook)&&!empty($request->facebook)?$request->facebook:NULL;
        $curd['x_link']=isset($request->x_link)&&!empty($request->x_link)?$request->x_link:NULL;
        $curd['linkedin']=isset($request->linkedin)&&!empty($request->linkedin)?$request->linkedin:NULL;
        $curd['instagram']=isset($request->instagram)&&!empty($request->instagram)?$request->instagram:NULL;

        $curd['generated_vcard_link']=isset($request->generated_vcard_link)&&!empty($request->generated_vcard_link)?$request->generated_vcard_link:NULL;
        
        
        // $curd['wallet_pay_qr_code']=isset($request->wallet_pay_qr_code)&&!empty($request->wallet_pay_qr_code)?$request->wallet_pay_qr_code:NULL;
        
        $curd['created_at'] = date('Y-m-d H:i:s');
        // $curd['created_by'] = Auth::user()->id;
                
        



        if ($request->hasFile('company_logo')) {

            // save image in public storage
            $local_url = 'images/' . str_replace(' ', '-', $request->file('company_logo')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('company_logo')));

            // \Storage::disk('public')->copy($request->file('company_logo')->getClientOriginalName(), '/public/images/card_images');

            //Delete old image when update Card image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            
            $ext = pathinfo($request->file('company_logo')->getClientOriginalName(), PATHINFO_EXTENSION);

            if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg' || $ext === 'JPG' || $ext === 'PNG' || $ext == 'JPEG') {
                $curd1['type'] = 'image';
            } 

            $curd['company_logo'] = $local_url;

            
            
        }

        if ($request->hasFile('wallet_pay_qr_code')) {

            // save image in public storage
            $local_url = 'images/' . str_replace(' ', '-', $request->file('wallet_pay_qr_code')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('wallet_pay_qr_code')));

            

            //Delete old image when update Card image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            
            $ext = pathinfo($request->file('wallet_pay_qr_code')->getClientOriginalName(), PATHINFO_EXTENSION);

            if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg' || $ext === 'JPG' || $ext === 'PNG' || $ext == 'JPEG') {
                $curd1['type'] = 'image';
            } 

            $curd['wallet_pay_qr_code'] = $local_url;
            
        }
        // dd($curd);
        // $curd->save();

        DB::table('digital_vcard')->insert($curd);
    }


    public function updateCard($request){

        // dd($request);

        $id=$request->card_id;

        $update= [
            // 'company_logo' => isset($request->company_logo) && !empty($request->company_logo) ? 'images/'.$request->company_logo:NULL,
        
            'name' => isset($request->name) && !empty($request->name)?$request->name :NULL,
            'designation' => isset($request->designation) && !empty($request->designation)?$request->designation:NULL,

            'company_name' => isset($request->company_name) && !empty($request->company_name)?$request->company_name:NULL,
            'company_description' => isset($request->company_description) && !empty($request->company_description)?$request->company_description:NULL,

            'phone_no' => isset($request->phone_no) && !empty($request->phone_no)?$request->phone_no:NULL,
            'email' => isset($request->email) && !empty($request->email)?$request->email:NULL,

            'website' => isset($request->website) && !empty($request->website)?$request->website:NULL,
            'address' => isset($request->address) && !empty($request->address)?$request->address:NULL,
            'location' => isset($request->location) && !empty($request->location)?$request->location:NULL,

            'whatsapp_no' => isset($request->whatsapp_no) && !empty($request->whatsapp_no)?$request->whatsapp_no:NULL,
            'facebook' => isset($request->facebook) && !empty($request->facebook)?$request->facebook:NULL,
            'x_link' => isset($request->x_link) && !empty($request->x_link)?$request->x_link:NULL,
            'linkedin' => isset($request->linkedin) && !empty($request->linkedin)?$request->linkedin:NULL,
            'instagram' => isset($request->instagram) && !empty($request->instagram)?$request->instagram:NULL,

            'generated_vcard_link' => isset($request->generated_vcard_link) && !empty($request->generated_vcard_link)?$request->generated_vcard_link:NULL,

             // 'updated_by' = Auth::user()->id,
        ];


        if ($request->hasFile('company_logo')) {

            $local_url = 'images/' . str_replace(' ', '-', $request->file('company_logo')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('company_logo')));

            $imagepath=$request->file('company_logo')->store('public/images/card_images');

            //Delete old image when update Card image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            
            $ext = pathinfo($request->file('company_logo')->getClientOriginalName(), PATHINFO_EXTENSION);

            if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg' || $ext === 'JPG' || $ext === 'PNG' || $ext == 'JPEG') {
                $update1['type'] = 'image';
            } 

            $update['company_logo'] = $local_url;

            
            
        }

        if ($request->hasFile('wallet_pay_qr_code')) {

            $local_url = 'images/' . str_replace(' ', '-', $request->file('wallet_pay_qr_code')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('wallet_pay_qr_code')));

            $imagepath=$request->file('wallet_pay_qr_code')->store('public/images/card_images');

            //Delete old image when update Card image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            
            $ext = pathinfo($request->file('wallet_pay_qr_code')->getClientOriginalName(), PATHINFO_EXTENSION);

            if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg' || $ext === 'JPG' || $ext === 'PNG' || $ext == 'JPEG') {
                $update1['type'] = 'image';
            } 

            $update['wallet_pay_qr_code'] = $local_url;

            
            
        }

        DB::table('digital_vcard')->where('id', $id)->update($update);

    }


    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }



    public function deleteCard($request)
    {
        $cardData = $this->find($request->id);
        $cardData->delete();
    }
}
