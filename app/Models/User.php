<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    // ELQUENT MODEL CONVENTIONS

    // here we rename the table and it columns

    // protected $table="my_users";
    // protected $primaryKey="users_id";

    // public $timestamps=false;

    // const CREATED_AT='creation_date';
    // const UPDATED_AT='updation_date';

// when user don't provides their name then this is the default name used for 
    // protected $attributes=[
    //     'name'=>'rishi';
    // ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function blogs()
    {
        return $this->hasMany(blog::class); // Define the relationship
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
