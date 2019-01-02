<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB, Auth, App, Input;
use Kamaln7\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Route;
use App\EmojiLibrary;
class EmojiController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function get_emoji(){
        $data = DB::table('emoji_library')->select('emoji_library.*')->get();
        return view('emoji.add_emoji',compact('data'));
    }

    public function add_new_emoji(Request $request){
      if($request['emoji_category']==0){
        Toastr::warning("Please select emoji category!");
      }else{
      $unicode = trim($request['emoji_code']);
      $new_emoji = new EmojiLibrary();
      $new_emoji->title = $request['emoji_title'] ;
      $new_emoji->category = $request['emoji_category'] ;
      $new_emoji->code = $unicode ;
      $new_emoji->save();
      Toastr::success("New Emoji Added Successfully !!");
      }
      return redirect('get_emoji');
    }

    public function update_emoji(Request $request){
      if($request['updateEmojiCat']==0){
        Toastr::warning("Please select emoji category!");
      }else{
      $emojiId = $request['updateEmojiId'] ;
      $emojiTitle = $request['updateEmojiTitle'] ;
      $emojiCategory = $request['updateEmojiCat'] ;
      $emojiCode = $request['updateEmojiCode'] ;
      DB::table('emoji_library')->where('id',$emojiId)->update(['title'=>$emojiTitle,'category'=>$emojiCategory,'code'=>$emojiCode ]);
      Toastr::success("Emoji Updated Successfully !!");
      }
      return redirect('get_emoji');
    }
}
