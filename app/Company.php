<?php

namespace App;
use App\CustomerCompany;
use App\People;
use App\CompanyType;
use Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','identity','address','phone','company_type_id','email','catalogo_path','status'];
    protected $hidden = ['created_at','updated_at','delete_at'];

    public function customer()
    {
        return $this->hasMany(CustomerCompany::class);
    }

    public function people()
    {
        return $this->hasMany(People::class);
    }

    public function companyType()
    {
        return $this->belongsTo(CompanyType::class);
    }


     public static function createWithFile(array $attributes = [])
    {
       try
       {
         $file = $attributes['catalogo_path'];
         $path = $file->store('companies');
         $attributes['catalogo_path'] = $path;
         return self::create($attributes);
       } 
       catch (Exception $e)
       {
          Storage::delete($path);         
          throw $e;
       }
    }
}
