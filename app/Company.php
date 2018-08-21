<?php

namespace App;
use App\CustomerCompany;
use App\Person;
use App\Client;
use App\CompanyType;
use App\Question;
use Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

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

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function aprobaciones()
    {
        return $this->hasMany(Approval::class);
    }

    public function aprobar($usuario)
    {
        $total =  $this->aprobaciones()->count();
        if( $total < 5)
        {
            $this->aprobaciones()->create(['company_id' => $this->id, 'user_id' => $usuario->id, 'admin' => $usuario->role_id == 1]);
            $table->boolean('approved')->default(true);
        }
        $total =  $this->aprobaciones()->count();
        if($total == 5 )
        {
            $this->status = 'APROBADA';
            $this->update();
        }
    }

    public function procesar()
    {
        $user = hash('md5',$this->id);
        $hashed_random_password = Hash::make(str_random(8));
        $hashed = Hash::make($hashed_random_password);
        $client = Client::create(['username' => $user ,'password' => $hashed,'company_id'=> $this->id]);
        $this->update(['status' => 'EN-PROCESO']);
    }


    public static function createWithFile(array $attributes = [])
    {
       try
       {
          $companyAttributes = $attributes['company'];
          $file = $companyAttributes['catalogo_path'];
          $path = $file->store('public/companies');
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
