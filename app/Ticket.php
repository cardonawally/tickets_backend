<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'description', 'state', 'user_id','agent_id','file_dir'
    ];


    public function details(){
        return $this->hasMany(DetalleTicket::class);
    }
}
