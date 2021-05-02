<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model
{
    protected $table = "ticket_comments";
    protected $guarded = [];

    public function ticket()
    {
        return $this->belongsTo(SupportTicket::class);
    }
}
