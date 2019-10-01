<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogCategory
 *
 * @package App\Models
 *
 * @property-read BlogCategory $parentCategory
 * @property-read string $parentTitle
 */

class BlogCategory extends Model
{
    use SoftDeletes;

    const ROOT = 1;

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    /**
     * @return string
     */
    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title ?? ($this->isRoot() ? 'Корень' : '???');

        return $title;
    }

    /**
     * @return bool
     */
    public function isRoot()
    {
        return $this->id === BlogCategory::ROOT;
    }


   /* public function getTitleAttribute($valueFromObject)
    {
       return mb_strtoupper($valueFromObject);
    }


    public function setTitleAttribute($incomingValue)
    {
        $this->attributes['title'] = mb_strtolower($incomingValue);
    }*/
}
