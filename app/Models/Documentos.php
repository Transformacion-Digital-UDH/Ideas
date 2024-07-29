<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'doc_id';

    const CREATED_AT = 'doc_created';
    const UPDATED_AT = 'doc_updated';
}
