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
        'name', 'email', 'password','activation_token', 'user_type', 'gender', 'mobile', 'date_of_birth', 'state', 'city', 'qualification', 'occupation', 'experience', 'non_experienced', 'business_category', 'sub_category', 'business_category_others', 'investment_range', 'investment_type', 'linked_in_url', 'profile_pic', 'about_me', 'is_data_confirmation', 'is_accept', 'is_accept', 'highlights_of_business', 'products_and_services', 'monthly_yearly_sales', 'personal_details', 'active', 'remember_token', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'revenue_seeking_status','skills_experience_acheivements_growthrate', 'required_skills_experience', 'required_investment_locations', 'co_investment', 'views'
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
