<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tasks extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'deadline',
        'task_status',
        'user_id',
        'client_id',
        'project_id'
    ];

    public const STATUS = ['Abierto','En progreso','cancelado','completo'];

    public function user(){
        return $this -> belongsTo(User::class)->withDefault();
    }

    public function client(){
        return $this -> belongsTo(Client::class)->withDefault();
    }

    public function project(){
        return $this -> belongsTo(Project::class)->withDefault();
    }

}
