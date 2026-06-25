<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'description', 'image_path', 'cta_url', 'cta_label', 'order', 'is_active'])]
class Brosur extends Model
{
    protected $table = 'brosur';

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }
}
