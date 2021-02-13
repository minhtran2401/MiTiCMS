<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table='invoice';
    protected $primaryKey='id_invoice';
    protected $fillable = [
        'user_id',
        'service_group_id',
        'service_type_id',
        'sku',
        'invoice_payment',
        'pack_price',
        'total_invoice',
        'invoice_note',
        'status'
    ];
}
