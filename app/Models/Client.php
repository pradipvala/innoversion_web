<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

     /*
    *  role : save client data
    
    *  comments:
    */

    public function saveclient($request)
    {

    if ($request->hasFile('client_image')) {
            
            $client                = $this->findOrNew($request->client_id);
            
            // save image in public storage
            $local_url = 'client/' . str_replace(' ', '-', $request->file('client_image')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('client_image')));

            //Delete old image when update Slider image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            $client['image'] = $local_url;
        }

        $client->save();

        return $client;
    }

    /*
    * role: Change client status.

    * comments:
    */
    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }



    /*
    * role: delete client

    * comments:
    */
    public function deleteClient($request)
    {
        $clientData = $this->find($request->id);
        if ($clientData->image !== null) {
            \Storage::delete($clientData->image);
        }
        $clientData->delete();
    }
}
