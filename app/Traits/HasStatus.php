<?php

namespace App\Traits;

use App\Models\Status;

trait HasStatus
{

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function scopeIsActive($query)
    {
        return $query->where('status_id', Status::ACTIVE);
    }

    public function scopeIsNotActive($query)
    {
        return $query->where('status_id', Status::NOT_ACTIVE);
    }

    public function scopeIsBlocked($query)
    {
        return $query->where('status_id', Status::BLOCKED);
    }


    public function scopeIsFailed($query)
    {
        return $query->where('status_id', Status::FAILED);
    }

    public function scopeIsAdmin($query)
    {
        return $query->where('status_id', Status::ADMIN);
    }

    public function setStatus($status)
    {
        $this->status_id = $status;
        $this->save();
    }
}
