<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'pdf_name',
        'url',
        'created_at',
        'updated_at',
    ];
}
