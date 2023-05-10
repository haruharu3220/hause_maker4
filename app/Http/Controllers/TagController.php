<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\Tag;
use App\Models\Photo;
use App\Models\Type;
class TagController extends Controller
{
    //
    public function index(){
        $team = Auth::user()->team_id;
        // $tags = Tag::where('team_id', $team)->orderBy('updated_at', 'desc')->get();
        $tags = Tag::where('team_id', $team)->orderBy('updated_at', 'asc')->get();
        
        return response()->view('tag.index', compact('tags'));
    }
    
    public function store(Request $request){
        // dd($request);
        $tagNames = $request->tagName;
        // dd($tagNames);
        if (is_array($tagNames)) {
            foreach ($tagNames as $tagName) {
                $tag = new Tag();
                $tag->team_id = Auth::user()->team_id;
                $tag->name = $tagName;
                $tag->save();
            }
        }else{
                $tag = new Tag();
                $tag->team_id = Auth::user()->team_id;
                $tag->name = $tagNames;
                $tag->save();
        }
        return redirect()->route('tag.store');
    }
    
    
    public function destroy($id){
        $result = Tag::find($id)->delete();
        return redirect()->route('tag.index');

    }
    
    public function memoedit($id){
        // dd($id);
        $selected_tag = Tag::find($id);
        // dd($tag);
        
        $team_id = Auth::user()->team_id;
        
        $query = Photo::query()
            ->where('team_id', $team_id)
            ->orderBy('created_at', 'desc');

        $photos = $query->paginate(25);

        // dd($photos);
        foreach($photos as $photo){
            $photo_id = $photo->id;
            $type = Type::where('id', $photo->type_id)->first()->name;
            $results = Photo::with("tags")->where('id', $photo->id)->get();
            
            $classname ="";
            $tagnames = [];
            
            $selectedTagFlag = false;
            
            foreach($results as $result){
                foreach($result->tags as $tag) {
                    if($tag->id == $id)  $selectedTagFlag = true;
                }
            }
            
            if($selectedTagFlag){
                foreach($results as $result){
                    foreach($result->tags as $tag) {
                        $classname .= $tag->id." ";
                        array_push($tagnames,$tag->name);
                    }
                }
            }
            $photo ->type_name = $type;
            $photo ->tag_no = $classname;
            $photo ->tag_names = $tagnames;
            $photo ->selected_tag = $selectedTagFlag; 
        }
        
        //  dd($photos);
        // dd($tag);
        return response()->view('tag.edit', compact('photos','selected_tag'));
    }
    
    public function create(){
        return response()->view('tag.create');
    }
    
    public function update(Request $request, $id){
    //     //バリデーション
    //   $validator = Validator::make($request->all(), [
    //     'name' => 'required | max:191',
    //   ]);
    //   //バリデーション:エラー
    //   if ($validator->fails()) {
    //     return redirect()
    //       -> route('memoedit', $id)
    //       ->withInput()
    //       ->withErrors($validator);
    //     }
        // dd($request);
        $result = Tag::find($id)->update($request->all());
        // dd($result);
        // return redirect()->route('dashboard');
        return redirect()->back();
    }
    
}
