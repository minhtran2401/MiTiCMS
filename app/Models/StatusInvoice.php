<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class StatusInvoice extends Model
{
    protected $table='status_invoice';
    protected $primaryKey='id';
    protected $fillable = [
        'name_status_invoice',
        
    ];
    
   
}
