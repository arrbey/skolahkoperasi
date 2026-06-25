<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['question', 'answer', 'order', 'is_active'])]
class Qna extends Model
{
    protected $table = 'qna';

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }
}
