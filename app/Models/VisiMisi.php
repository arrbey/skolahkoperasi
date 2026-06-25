<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['type', 'content', 'order'])]
class VisiMisi extends Model
{
    protected $table = 'visi_misi';
}
