<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/* This is a PHP code snippet that defines a User model class using the Laravel framework. Here is what each line does:

use Illuminate\Database\Eloquent\Factories\HasFactory;: This line imports the HasFactory trait from the Eloquent library. This trait provides a factory() method that makes it easier to create instances of the User model.

use Illuminate\Foundation\Auth\User as Authenticatable;: This line imports the Authenticatable class from the Laravel foundation library. The User model extends Authenticatable, which provides authentication-related functionality.

use Illuminate\Notifications\Notifiable;: This line imports the Notifiable trait from the Notifications library. This trait adds support for sending notifications to users.

use Laravel\Passport\HasApiTokens;: This line imports the HasApiTokens trait from the Passport library. This trait provides support for OAuth2 authentication via API tokens.

class User extends Authenticatable: This line defines the User model class and extends the Authenticatable class.

use HasApiTokens, HasFactory, Notifiable;: This line includes the traits that the User model uses: HasApiTokens for API authentication, HasFactory for creating model factories, and Notifiable for sending notifications. */


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
