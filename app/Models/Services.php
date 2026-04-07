<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Services extends Model
{
    use HasFactory, SoftDeletes;

    public function saveService($request)
    {
        $service = $this->findOrNew($request->service_id);
        $service->title = $request->title;
        $service->description = $request->description;

        if ($request->hasFile('image')) {
            // save image in public storage
            $local_url = 'service/'.str_replace(' ', '-', $request->file('image')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('image')));

            // Delete old image when update Service image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }
            $service['image'] = $local_url;
        }

        $service->status = '1';

        $service->save();
    }

    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }

    public function deleteService($request)
    {
        $serviceData = $this->find($request->id);
        if ($serviceData->image !== null) {
            \Storage::delete($serviceData->image);
        }
        $serviceData->delete();
    }
}
