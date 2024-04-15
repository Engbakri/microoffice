<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task',
        'description',
        'time_hour',
        'time_day',
        'time_week',
        'time_month',
        'task_attach'
    ];


    public function users():  BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_tasks');
    }
}
