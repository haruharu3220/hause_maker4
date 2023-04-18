<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\Photo;
use App\Models\Type;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class ApiPhotoController extends Controller
{
    //index
    public function index(Request $request){
        
        $team_id = Auth::user()->team_id;
        
        $startDate = "2000-01-01";
        $endDate_pre = date('Y-m-d');
        // 日付をDateTimeオブジェクトに変換
        $endDateObject = new \DateTime($endDate_pre);
        // 1日を追加
        $endDateObject->modify('+1 day');
        $endDate = $endDateObject->format('Y-m-d');
        
        if($request->input('start') != null){
            $startDate = $request->input('start');
        }
        if($request->input('end') != null){
            $endDate = $request->input('end');
        }

        $query = Photo::query()
            ->where('team_id', $team_id)
            ->where('created_at', '>=', $startDate)
            ->where('created_at', '<=', $endDate)
            ->orderBy('created_at', 'desc');

        $photos = $query->paginate(25);
        
        // dd($photos);
        foreach($photos as $photo){
            $type = Type::where('id', $photo->type_id)->first()->name;
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
            $photo ->type_name = $type;
            $photo ->tag_no = $classname;
            $photo ->tag_names = $tagnames;
            // dd($photo);
            
        }
        // JSON 形式でデータを返す
        return response()->json(compact('photos', 'startDate', 'endDate'));
    }
    
    
    public function create(Request $request)
    {
        $data = [
            'message' => 'Create a new photo',
        ];

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $photo = new Photo();
        $team_id = Auth::user()->team_id;

        if ($request->hasFile('image')) {
            $original = $request->file("image")->getClientOriginalName();
            $name = date("Ymd_His") . "_" . $original;
            $request->file("image")->move("storage/image", $name);
            $photo->image = $name;
        }

        $photo->user_id = Auth::user()->id;
        $photo->team_id = $team_id;
        $photo->type_id = $request->type;
        $photo->save();

        $photo->tags()->attach($request->tags);

        return response()->json(['message' => 'Photo created successfully']);
    }
    
    public function destroy($id)
    {
        $photo = Photo::find($id)->delete();
        return response()->json(['message' => 'Photo deleted successfully']);
    }

    public function edit($id)
    {
        $photo = Photo::find($id);
        $results = Photo::with("tags")->where('id', $photo->id)->get();
        $tagnames = [];
        foreach ($results as $result) {
            foreach ($result->tags as $tag) {
                array.push($tagnames, $tag->name);
                }
            }

        $photo->tag_names = $tagnames;
        return response()->json($photo);
    }

    
    public function update(Request $request, $id)
    {
        $photo = Photo::find($id);

        if ($request->type) {
            $photo->type_id = $request->type;
            $photo->save();
        }

        if ($request->tags) {
            DB::table('photo_tag')->where('photo_id', $id)->delete();

            foreach ($request->tags as $tag_id) {
                DB::table('photo_tag')->insert([
                    'photo_id' => $id,
                    'tag_id' => $tag_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
        return response()->json(['message' => 'Photo updated successfully']);
    }

    public function favorite($id)
    {
        $photo = Photo::find($id);
        $photo->iine = true;
        $photo->save();
        return response()->json(['message' => 'Photo favorited']);
    }

    public function unfavorite($id)
    {
        $photo = Photo::find($id);
        $photo->iine = false;
        $photo->save();
        return response()->json(['message' => 'Photo unfavorited']);
    }

    public function memory()
    {
        $data = [
            'message' => 'Display photo memory',
        ];
        return response()->json($data);
    }

    public function memoryindex()
    {
        $team_id = Auth::user()->team_id;

        $query = Photo::query()
            ->where('team_id', $team_id)
            ->orderBy('created_at', 'desc');

        $photos = $query->get();

        $photoData = [];

        foreach ($photos as $photo) {
            $type = Type::where('id', $photo->type_id)->first()->name;
            $results = Photo::with("tags")->where('id', $photo->id)->get();
            $tagnames = [];
            foreach ($results as $result) {
                foreach ($result->tags as $tag) {
                    array_push($tagnames, $tag->name);
                }
            }
            
            $photo->type_name = $type;
            $photo->tag_names = $tagnames;

            $photoData[] = $photo;
        }

        return response()->json($photoData);
    }

}
