<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TKategori extends Model
{
    use HasFactory;

    protected $table = "ticketcategories";
    protected $fillable = ['name','slug'];
    protected $guarded = [''];
}
