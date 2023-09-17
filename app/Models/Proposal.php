<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = ['job_id', 'validated', 'user_id'];

    public static function boot() {

        parent::boot();

        static::creating(function ($model) {
           $model->user_id = auth()->user()->id;
        });

    }

    public function coverLetter()
    {
        return $this->hasOne(CoverLetter::class);
    }


    public function user() {

        return $this->belongsTo('App\Models\User');

    }

    public function job() {

        return $this->belongsTo('App\Models\Job');

    }

}