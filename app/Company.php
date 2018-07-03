<?php

namespace App;
use App\CustomerCompany;
use App\Person;
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
        return $this->hasMany(Person::class);
    }

    public function companyType()
    {
        return $this->belongsTo(CompanyType::class);
    }


     public static function createWithFile(array $attributes = [])
    {
       try
       {
          $companyAttributes = $attributes['company'];
          $file = $companyAttributes['catalogo_path'];
          $path = $file->store('companies');
          $companyAttributes['catalogo_path'] = $path;
          $company = self::create($companyAttributes);
          $company->people()->create($attributes['contact']);
          foreach ($attributes['customers'] as $value) {
            $company->customer()->create($value);
          }
          return $company;
       } 
       catch (Exception $e)
       {
          Storage::delete($path);         
          throw $e;
       }
    }
}
