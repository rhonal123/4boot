<?php

namespace App;
use App\Operation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    /*
     * The attributes that are mass assignable 
     * @var array
     */
    protected $fillable = ['role'];

    public function permisions()
    {
        return $this->belongsToMany(Operation::class);
    } 

}
