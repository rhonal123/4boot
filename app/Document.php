<?php

namespace App;
use App\Client;
use App\DocumentType;
use App\Review;
use App\Incidence;
use App\Requeriment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','document_type_id','status','owner_id','file_path','requeriment_id'];
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

    public function client()
    {
        return $this->belongsTo(Client::class,'owner_id');
    }

    public function requeriment()
    {
        return $this->belongsTo(Requeriment::class);
    }

    public static function createWithFile(array $attributes = [],$client)
    { 
       $path = null;
       try
       { 
          $file = $attributes['file'];
          $path = $file->store('public/companies');
          $attributes['file_path'] = $path;
          $attributes['owner_id'] = $client->id;
          $attributes['name'] = $file->getClientOriginalName();
          $attributes['document_type_id'] = 1;
          $document = self::create($attributes);
          return $document;
       } 
       catch (Exception $e)
       {
          Storage::delete($path);         
          throw $e;
       }
    }

}
