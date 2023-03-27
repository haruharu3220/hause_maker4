<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    
    
    public static function getAllOrderByUpdated_at()
    {
        return self::orderBy('updated_at', 'desc')->get();
    }
    
    public static function getByTeamIdOrderByUpdated_at($team_id)
    {
        return self::where('team_id', $team_id)->orderBy('updated_at', 'desc')->get();
    }
    
}
