<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['address', 'phone', 'email', 'maps_embed_url', 'whatsapp_number'])]
class ContactInfo extends Model
{
    protected $table = 'contact_info';
}
