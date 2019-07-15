<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $publishingCompanyID
 * @property string $publishingCompanyName
 * @property string $created_at
 * @property string $updated_at
 * @property Book[] $books
 */
class Publishingcompany extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'publishing_company';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->hasMany('App\Books');
    }
}
