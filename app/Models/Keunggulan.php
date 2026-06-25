<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['icon', 'title', 'description', 'order', 'is_active'])]
class Keunggulan extends Model
{
    protected $table = 'keunggulan';

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }
}
