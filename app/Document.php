<?php

namespace App;
use App\Client;
use App\DocumentType;
use App\Review;
use App\Incidence;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','document_type_id','status','owner_id','email','catalogo_path'];
    protected $hidden = ['created_at','updated_at','delete_at'];

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function incidences()
    {
        return $this->hasMany(Incidence::class);
    }

    public function clients()
    {
        return $this->belongsTo(Client::class);
    }
}
