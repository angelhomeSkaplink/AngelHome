@extends('layouts.app')

@section('htmlheader_title')
    Emoji Library
@endsection

@section('contentheader_title')
    Emoji Library
@endsection

@section('main-content')
<style>
	.content-header
	{
		display:none;
	}
</style>
<div class="row" style="padding-top:15px">
  <div class="col-lg-12">
      <div class="panel panel-default">
          <div class="panel-heading">
            <h2><strong> &#x1F605; Emoji Gallery <span class="pull-right"><a href="#modal" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="material-icons md-36" style="color:#fff;"> add_circle </i> New Emoji</a></span></strong></h2>
          </div>
          <div class="panel-body">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <h4><strong><u>Smileys & People</u></strong></h4>
                  <?php
                      $data1 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',1)->get();
                  ?>
                  @if($data1->isEmpty())
                    <p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
                  @else
                    @foreach($data1 as $emoji1)
                     <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji1->code}}; {{$emoji1->title}} <span class=""><a href="#" onclick="getID('{{$emoji1->id}}','{{$emoji1->title}}','{{$emoji1->category}}','{{$emoji1->code}}');" data-toggle="modal" data-target="#EditModal" ><u><i class="material-icons">edit</i> Edit</u></a></span></p>
                    @endforeach
                  @endif
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <h4><strong><u>Animals & Nature</u></strong></h4>
                  <?php
                      $data2 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',2)->get();
                  ?>
                  @if($data2->isEmpty())
                    <p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
                  @else
                    @foreach($data2 as $emoji2)
                     <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji2->code}}; {{$emoji2->title}} <span class=""><a href="#" onclick="getID('{{$emoji2->id}}','{{$emoji2->title}}','{{$emoji2->category}}','{{$emoji2->code}}');" data-toggle="modal" data-target="#EditModal" ><u><i class="material-icons">edit</i> Edit</u></a></span></p>
                    @endforeach
                  @endif
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <h4><strong><u>Food & Drink</u></strong></h4>
                  <?php
                      $data3 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',3)->get();
                  ?>
                  @if($data3->isEmpty())
                    <p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
                  @else
                    @foreach($data3 as $emoji3)
                     <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji3->code}}; {{$emoji3->title}}  <span class=""><a href="#" onclick="getID('{{$emoji3->id}}','{{$emoji3->title}}','{{$emoji3->category}}','{{$emoji3->code}}');" data-toggle="modal" data-target="#EditModal" ><u><i class="material-icons">edit</i> Edit</u></a></span></p>
                    @endforeach
                  @endif
                </div>

            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <h4><strong><u>Activity</u></strong></h4>
                <?php
                    $data4 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',4)->get();
                ?>
                @if($data4->isEmpty())
                  <p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
                @else
                  @foreach($data4 as $emoji4)
                   <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji4->code}}; {{$emoji4->title}} <span class=""><a href="#" onclick="getID('{{$emoji4->id}}','{{$emoji4->title}}','{{$emoji4->category}}','{{$emoji4->code}}');" data-toggle="modal" data-target="#EditModal" ><u><i class="material-icons">edit</i> Edit</u></a></span></p>
                  @endforeach
                @endif
              </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <h4><strong><u>Travel & Places</u></strong></h4>
                  <?php
                      $data5 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',5)->get();
                  ?>
                  @if($data5->isEmpty())
                    <p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
                  @else
                    @foreach($data5 as $emoji5)
                     <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji5->code}}; {{$emoji5->title}} <span class=""><a href="#" onclick="getID('{{$emoji5->id}}','{{$emoji5->title}}','{{$emoji5->category}}','{{$emoji5->code}}');" data-toggle="modal" data-target="#EditModal" ><u><i class="material-icons">edit</i> Edit</u></a></span></p>
                    @endforeach
                  @endif
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <h4><strong><u>Objects</u></strong></h4>
                  <?php
                      $data6 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',6)->get();
                  ?>
                  @if($data6->isEmpty())
                    <p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
                  @else
                    @foreach($data6 as $emoji6)
                     <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji6->code}}; {{$emoji6->title}} <span class=""><a href="#" onclick="getID('{{$emoji6->id}}','{{$emoji6->title}}','{{$emoji6->category}}','{{$emoji6->code}}');" data-toggle="modal" data-target="#EditModal" ><u><i class="material-icons">edit</i> Edit</u></a></span></p>
                    @endforeach
                  @endif
                </div>


            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <h4><strong><u>Symbols</u></strong></h4>
                @php
                    $data7 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',7)->get();
                @endphp
                @if($data7->isEmpty())
                  <p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
                @else
                  @foreach($data7 as $emoji7)
                   <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji7->code}}; {{$emoji7->title}} <span class=""><a href="#" onclick="getID('{{$emoji7->id}}','{{$emoji7->title}}','{{$emoji7->category}}','{{$emoji7->code}}');" data-toggle="modal" data-target="#EditModal" ><u><i class="material-icons">edit</i> Edit</u></a></span></p>
                  @endforeach
                @endif
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <h4><strong><u>Flags</u></strong></h4>
                <?php
                    $data8 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',8)->get();
                ?>
                @if($data8->isEmpty())
                  <p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
                @else
                  @foreach($data8 as $emoji8)
                   <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji8->code}}; {{$emoji8->title}} <span class=""><a href="#" onclick="getID('{{$emoji8->id}}','{{$emoji8->title}}','{{$emoji8->category}}','{{$emoji8->code}}');" data-toggle="modal" data-target="#EditModal" ><u><i class="material-icons">edit</i> Edit</u></a></span></p>
                  @endforeach
                @endif
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <h4><strong><u>Skin Tones</u></strong></h4>
                <?php
                    $data9 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',9)->get();
                ?>
                @if($data9->isEmpty())
                  <p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
                @else
                  @foreach($data9 as $emoji9)
                   <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji9->code}}; {{$emoji9->title}} <span class=""><a href="#" onclick="getID('{{$emoji9->id}}','{{$emoji9->title}}','{{$emoji9->category}}','{{$emoji9->code}}');" data-toggle="modal" data-target="#EditModal" ><u><i class="material-icons">edit</i> Edit</u></a></span></p>
                  @endforeach
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <h4><strong><u>Uncategorized</u></strong></h4>
                <?php
                    $data10 = DB::table('emoji_library')->select('emoji_library.*')->where('category','=',10)->get();
                ?>
                @if($data10->isEmpty())
                  <p style="font-size:0.8em;color:#b3b3b3;">Not available</p>
                @else
                  @foreach($data10 as $emoji10)
                   <p style="font-size:1.3em;color:#b3b3b3;">&#x{{$emoji10->code}}; {{$emoji10->title}} <span class=""><a href="#" onclick="getID('{{$emoji10->id}}','{{$emoji10->title}}','{{$emoji10->category}}','{{$emoji10->code}}');" data-toggle="modal" data-target="#EditModal" ><u><i class="material-icons">edit</i> Edit</u></a></span></p>
                  @endforeach
                @endif
              </div>
            </div>
          </div>
      </div>
  </div>
</div>

<!--Add Emoji Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-header" style="background-color:#1a1a1a;">
      <button type="button" class="close" data-dismiss="modal"><span style="color:#fff;">&times;</span></button>
      <h4 class="modal-title"><span style="color:#fff;">&#x1F605; Add New Emoji</span></h4>
    </div>

    <div class="modal-content">
      <form action="{{ action('EmojiController@add_new_emoji') }}" method="post">
        <input type="hidden" name="_method" value="post">
        {{ csrf_field() }}
      <div class="modal-body">
            <div class="form-group">
              <label for="category">Emoji Category:</label>
              <select class="form-control" name="emoji_category" id="emoji_category" required/>
                  <option value="0">Select Category</option>
                  <option value="1">Smileys & People</option>
                  <option value="2">Animals & Nature</option>
                  <option value="3">Food & Drink</option>
                  <option value="4">Activity</option>
                  <option value="5">Travel & Places</option>
                  <option value="6">Objects</option>
                  <option value="7">Symbols </option>
                  <option value="8">Flags </option>
                  <option value="9">Skin Tones</option>
                  <option value="10">Uncategorized</option>
              </select>
            </div>
            <div class="form-group">
              <label for="title">Emoji Title:</label>
              <input type="text" class="form-control" name="emoji_title" id="emoji_title" required/>
            </div>
            <div class="form-group">
              <label for="code">Emoji Code:</label>
              <input type="text" class="form-control" name="emoji_code" id="emoji_code" required/>
            </div>

      </div>
      <div class="modal-footer">
        <span class="btn btn-default" data-dismiss="modal" style="cursor:pointer;">Close</span>
        <button type="submit" name="submit"  class="btn btn-success">Save</button>
      </div>
      </form>
    </div>

  </div>
</div>
<!--End of Add Emoji Modal  -->

<!--Add Emoji Modal -->
<div id="EditModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
  <div class="modal-header" style="background-color:#1a1a1a;">
    <button type="button" class="close" data-dismiss="modal"><span style="color:#fff;">&times;</span></button>
    <h4 class="modal-title"><span style="color:#fff;">&#x1F605; Edit Emoji</span></h4>
  </div>

  <div class="modal-content">
    <form action="{{ action('EmojiController@update_emoji') }}" method="post">
      <input type="hidden" name="_method" value="post">
      {{ csrf_field() }}
    <div class="modal-body">
          <div class="form-group">
            <div class="form-group">
              <label for="emoji_id">Emoji ID:</label>
              <input type="text" class="form-control" name="updateEmojiId" id="updateEmojiId" readonly/>
            </div>
            <label for="category">Emoji Category:</label>
            <select class="form-control" name="updateEmojiCat" id="updateEmojiCat" required/>
                <option value="0" id="0">Select Category</option>
                <option value="1" id="1">Smileys & People</option>
                <option value="2" id="2">Animals & Nature</option>
                <option value="3" id="3">Food & Drink</option>
                <option value="4" id="4">Activity</option>
                <option value="5" id="5">Travel & Places</option>
                <option value="6" id="6">Objects</option>
                <option value="7" id="7">Symbols </option>
                <option value="8" id="8">Flags </option>
                <option value="9" id="9">Skin Tones</option>
                <option value="10" id="10">Uncategorized</option>
            </select>
            <!-- <input type="text" class="form-control" name="emoji_category" id="emoji_category"> -->
          </div>
          <div class="form-group">
            <label for="title">Emoji Title:</label>
            <input type="text" class="form-control" name="updateEmojiTitle" id="updateEmojiTitle" value="" required/>
          </div>
          <div class="form-group">
            <label for="code">Emoji Code:</label>
            <input type="text" class="form-control" name="updateEmojiCode" id="updateEmojiCode" required/>

          </div>

    </div>
    <div class="modal-footer">
      <span class="btn btn-default" data-dismiss="modal" style="cursor:pointer;">Close</span>
      <button type="submit" name="submit"  class="btn btn-success">Update</button>
    </div>
    </form>
  </div>

  </div>
</div>
<!--End of Edit Emoji Modal  -->
<script type="text/javascript">
  function getID(id,title,category,code){
    $("#updateEmojiId").val(id);
    $("#updateEmojiCat").val(category);
    $("#updateEmojiTitle").val(title);
    $("#updateEmojiCode").val(code);
  }
</script>
@endsection
