<?php

namespace App;
use App\CustomerCompany;
use App\People;
use App\CompanyType;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','identity','address','phone','company_type_id','status'];
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

}
