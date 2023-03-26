<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
  
}
