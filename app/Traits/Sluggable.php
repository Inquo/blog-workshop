<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Sluggable 
{
    public static function bootSluggable()
    {
        static::saving(function($model) {
            self::slugging($model);
        });
    }

    abstract public function sluggable(): string;

    public static function slugging($model)
    {
        $model->slug = Str::of(
            $model->{$model->sluggable()}
        )->slug('-');
    }
}