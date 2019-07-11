<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $bookID
 * @property string $name
 * @property string $pageCount
 * @property int $classificationID
 * @property int $publishingCompanyID
 * @property string $created_at
 * @property string $updated_at
 * @property Classification $classification
 * @property Publishingcompany $publishingcompany
 * @property Bookshasauthor[] $bookshasauthors
 */
class Books extends Model
{

    protected $table = 'book';
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['name', 'page_count', 'publishing_company_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publishingcompany()
    {
        return $this->belongsTo('App\Publishingcompany');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function authors()
    {       
        return $this->belongsToMany('App\Authors', 'books_has_authors', 'book_id', 'author_id')->withTimestamps();
    }
}
