<?php

namespace App\Models\Ticket;

use App\Admin;
use Illuminate\Database\Eloquent\Model;

class AdminComment extends Model
{
    protected $fillable = [
        'ticket_id', 'admin_id', 'comment'
    ];

    public function Admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
