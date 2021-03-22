<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Blog extends Model
{
    use Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
		'content',
		'created_at',
		'updated_at',
        'is_deleted',
		'status',
    ];

    public $sortable = [
		'id',
        'title',
        'content',
		'created_at',
		'status',
    ];
}
