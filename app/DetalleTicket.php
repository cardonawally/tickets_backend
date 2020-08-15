<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleTicket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_id', 'details', 'file_dir', 'created_by'
    ];


    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
}
