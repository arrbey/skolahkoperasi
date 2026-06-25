<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

#[Fillable(['title', 'slug', 'description', 'detail', 'image_path', 'duration', 'price', 'location', 'target_participants', 'cta_url', 'cta_label', 'order', 'is_active'])]
class Brosur extends Model
{
    protected $table = 'brosur';

    protected static function booted(): void
    {
        static::saving(function (Brosur $brosur): void {
            if (! $brosur->slug) {
                $baseSlug = Str::slug($brosur->title);
                $slug = $baseSlug;
                $counter = 2;

                while (self::where('slug', $slug)->whereKeyNot($brosur->getKey())->exists()) {
                    $slug = $baseSlug.'-'.$counter++;
                }

                $brosur->slug = $slug;
            }
        });
    }

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }
}
