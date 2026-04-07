<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'phone_pe_payment';

    protected $fillable = ['id','amount','transaction_id','payment_status','response_msg','providerReferenceId',
                            'merchantOrderId','checksum',
                            'status','deleted_at','created_at','updated_at',
                            'created_by','updated_by'];
}