<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $authorID
 * @property string $authorName
 * @property string $created_at
 * @property string $updated_at
 * @property Bookshasauthor[] $bookshasauthors
 */
class Authors extends Model
{
    protected $table = 'author';
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['author_name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->belongsToMany('App\Books', 'books_has_authors');
    }
}
