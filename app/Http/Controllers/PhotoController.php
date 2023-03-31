<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\Photo;
use App\Models\Type;
use App\Models\Tag;



class PhotoController extends Controller
{
    
    //index
    public function index(Request $request){
        
        $team_id = Auth::user()->team_id;
    
        $startDate = "2000-01-01";
        $endDate = "2100-01-01";
        
        if($request->input('start') != null){
            $startDate = $request->input('start');
        }
        if($request->input('end') != null){
            $endDate = $request->input('end');
        }

        $query = Photo::query()
            ->where('team_id', $team_id)
            ->where('updated_at', '>=', $startDate)
            ->where('updated_at', '<=', $endDate)
            ->orderBy('updated_at', 'asc');

        $photos = $query->paginate(25);
        
        // dd($photos);
        foreach($photos as $photo){
            
            // $tags = Tag::where('team_id', $team)->get();
            $results = Photo::with("tags")->where('id', $photo->id)->get();
            // dd($results);
            // dd($results->$tags);
            $classname ="";
            $tagnames = [];
            foreach($results as $result){
                foreach($result->tags as $tag) {
                    $classname .= "tag_no_";
                    $classname .= $tag->id." ";
                    array_push($tagnames,$tag->name);
                }
            }
            // dd($classname);
            $photo ->tag_no = $classname;
            $photo ->tag_names = $tagnames;
            // dd($photo);
            
        }
        
        // dd($photos);
        return response()->view('photo.index',compact('photos'));
    }
    
    //create
    public function create()
    {
        return response()->view('photo.create');
    }

    
    
    //store
    public function store(Request $request)
    {
        
        $photo = new photo();
        // バリデーション 今回は特に不要
        // バリデーション:エラー
        // if ($validator->fails()) {
        //   return redirect()
        //     ->route('tweet.create')
        //     ->withInput()
        //     ->withErrors($validator);
        // }
        // dd($request->image,$request->tags);
        // dd($request->file("image"));
        if(request('image')){
            $original = $request->file("image")->getClientOriginalName();
            $name = date("Ymd_His")."_".$original;
            request() ->file("image")->move("storage/image",$name);
            $photo -> image = $name;
        }
        
        // 編集 フォームから送信されてきたデータとユーザIDをマージし，DBにinsertする
        $data = $request->merge(['user_id' => Auth::user()->id])->all();
        // $result = Photo::create($data);

        $photo -> user_id = Auth::user() -> id;
        $photo -> team_id = Auth::user() -> team_id;
        
        // dd($request->type);
        $photo -> type_id = $request->type;
        $photo -> save();
    
        //photoに紐づくtagを中間テーブルに登録
        $photo -> tags()->attach($request->tags);
        
        // dd($request);
        // photo.index」にリクエスト送信（一覧ページに移動）
        return redirect()->route('photo.index');
    }
    
    
    
    public function destroy($id)
    {
        $result = Photo::find($id)->delete();
        return redirect()->route('photo.index');
    }
    
    
    public function edit($id)
    {
        $photo = Photo::find($id);
        return response()->view('photo.edit', compact('photo'));
    }


    public function update(Request $request, $id)
    {
        //バリデーション
        // $validator = Validator::make($request->all(), [
        //     'tweet' => 'required | max:191',
        //     'description' => 'required',
        // ]);
        //バリデーション:エラー
        // if ($validator->fails()) {
        //     return redirect()
        //     ->route('tweet.edit', $id)
        //     ->withInput()
        //     ->withErrors($validator);
        // }
        //データ更新処理
        $result = Photo::find($id)->update($request->all());
        $user = User::find(Auth::id());
        $team = Team::find($user->team_id);
        // return redirect()->route('photo.index');
        
        return view('photo.index', compact('$team', '$user'));
        
    }
    
}

