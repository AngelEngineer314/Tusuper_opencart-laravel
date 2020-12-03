<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use Notifiable;
    protected $table = "oc_customer";

    const id = 'customer_id';
    const CREATED_AT = 'date_added';
    const UPDATED_AT = 'date_updated';

    protected $guarded = [];
}
