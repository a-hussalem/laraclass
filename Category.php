<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    //

    /**
     * @return BelongsToMany
     */
    public function parents()
    {
        return $this->belongsToMany(self::class, 'category_category', 'child_id', 'parent_id');
    }

    /**
     * @return BelongsToMany
     */
    public function children()
    {
        return $this->belongsToMany(self::class, 'category_category', 'parent_id', 'child_id');
    }

    /**
     * @return BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }


    /**
     * @return bool
     */
    public function isParent()
    {

        if ($this->children()->count() > 0 )
        {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function isChild()
    {
        if ($this->parents()->count() > 0 )
        {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function isRoot()
    {
        if ($this->isParent() && !$this->isChild())
        {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function isSingle()
    {
        if ($this->isParent() || $this->isChild())
        {
            return false;
        }
        else {
            return true;
        }
    }
}
