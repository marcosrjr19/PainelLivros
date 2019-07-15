<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $image_src
 * @property string $created_at
 * @property string $updated_at
 */
class Banner extends Model
{
    protected $table = 'banners';
    /**
     * @var array
     * 
     */

    protected $primaryKey = 'id';

    protected $fillable = ['image_src','image_src_resized','created_at', 'updated_at'];

}
