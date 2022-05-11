<?php

namespace App\Models\Traits;

use App\Models\Permalink;
use Illuminate\Support\Str;

trait Permalinkable
{
    /**
     * The attribute that used to auto-generate the slug for the permalink.
     * 
     * @var string
     */
    public string $sluggable = 'title';

    /**
     * Auto-generate the permalink for the model..
     *
     * @return void
     */
    protected static function bootPermalinkable()
    {
        static::created(function($model) {
            $model->permalink()->create([
                'slug' => request()->input('slug', $model->slug())
            ]);
        });
    }

    /**
     * Get the model's permalink.
     */
    public function permalink()
    {
        return $this->morphOne(Permalink::class, 'permalinkable');
    }

    /**
     * Resolve the slug from the sluggable atrribute.
     * 
     * @return string
     */
    public function slug()
    {
        return Str::slug($this->{$this->sluggable});
    }
}
