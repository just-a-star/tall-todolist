<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    use HasFactory;
    protected $table = 'todos';
    protected $guarded = [];

    protected $fillable = ['title', 'description', 'due_date', 'is_completed', 'user_id', 'priority'];



}
