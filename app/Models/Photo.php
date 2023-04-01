<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Team;

class Photo extends Model
{
    use HasFactory;
    
    //$guarded はアプリケーション側から変更できないカラムを指定する（ブラックリスト）
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
  
  
    //更新日時が新しい順にソート
    //self は Tweet モデルのこと．
    //orderBy() は SQL のものと同じ理解で OK．
    //最後の get() がないと実行されないので注意．
    public static function getAllOrderByUpdated_at()
    {
        return self::orderBy('updated_at', 'desc')->get();
    }
    
    public static function getByTeamIdOrderByUpdated_at($team_id)
    {
        // return self::where('team_id', $team_id)->orderBy('updated_at', 'desc')->get();
        return self::where('team_id', $team_id)->orderBy('created_at', 'desc')->paginate(25);
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

}
