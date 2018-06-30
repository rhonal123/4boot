<?php

namespace App;
use App\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{   
    use Notifiable;
    use SoftDeletes;

    protected $fillable = ['username','password','company_id'];
    protected $hidden = ['created_at','updated_at','delete_at'];

    protected $casts = [
        'username' => 'string',
        'password' => 'string'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
