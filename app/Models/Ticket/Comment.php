<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Admin;
use App\Models\Psikolog;

class Comment extends Model
{

    protected $table = "ticketcomments";

    protected $fillable = [
        'ticket_id', 'user_id', 'comment'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function Admin()
    {
        return $this->belongsTo(Admin::class);
    }

}
