<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['slug', 'title', 'content', 'image_path', 'cta_label', 'cta_url', 'is_active'])]
class Section extends Model
{
    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }
}
