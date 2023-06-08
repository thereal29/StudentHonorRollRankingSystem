<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class UserRole extends Model
{
    use HasFactory;
    use HasRoles;
    public $timestamps = false;
    protected $table = 'roles';
    protected $fillable = [
        'description',
    ];
    // public function role(){
    //     return $this->belongsTo(UserRole::class);
    // }
    // public function user(){
    //     return $this->belongs;
    // }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
