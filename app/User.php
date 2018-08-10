<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

	protected $dates = ['deleted_at'];	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','activation_token', 'user_type', 'gender', 'mobile', 'date_of_birth', 'qualification', 'occupation', 'experience', 'whatsup_number', 'category', 'sub_category', 'religion', 'investment_range', 'investment_type', 'linked_in_url', 'profile_pic', 'mother_tongue', 'known_languages', 'is_accept_terms','country', 'state', 'city', 'relationship_status', 'active', 'remember_token', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'revenue_seeking_status', 'description_of_skills_experience', 'co_investment', 'views', 'description_you_family', 'description_of_profound_value', 'description_of_sales', 'description_you_family', 'description_place_business', 'description_relocation_preferance', 'profile_created_by'
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'activation_token'
    ];
}
