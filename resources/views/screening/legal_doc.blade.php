<div class="box box-primary">
    <div class="tab-content" id="myTabContent">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-7">
                    <form action="{{ action('ScreeningController@add_legal_doc') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        {{ csrf_field() }}
                        <div class="box box-primary">				
                            <div class="box-body padding-bottom-15">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="hidden" class="form-control" name="pros_id" value="{{ $id }}" />
                                        <label>Document name</label>
                                       @php
                                            $documents = DB::table('documents')
                                            ->where([['doc_type',"legal_doc"],['facility_id',Auth::user()->facility_id],['status',1]])
                                            ->get();
                                        @endphp
                                        <div class="form-group has-feedback">
                                            <select class="form-control" name="doc_name" id="" required>
                                                @foreach ($documents as $item)
                                                    <option value="{{ $item->doc_name }}"> {{ $item->doc_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group has-feedback">
                                        <label>Upload the document here</label>
                                        <input id="file" type="file" class="form-control" name="doc_file" accept="image/*,.doc, .docx,.pdf,.odf,.odt" size="2MB" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group has-feedback">
                                            <p style=""><strong>Supported file types:<span style="color:#bfbfbf"> .jpeg, .jpg, .png, .gif, .tiff, .bmp, .doc, .docx, .pdf, .odf, .odt </span></strong></p>
                                            <p style=""><strong>Max-Size:<span style="color:#bfbfbf"> 5MB </span></strong></p>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
                                        </div>
                                        <div class="form-group has-feedback">
						                	<a type="button" href="{{ url('screening/'.$id) }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">Cancel</a> 
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="box box-primary" >	
                        <div class="box-body padding-bottom-15" style="height:200px;overflow:scroll">
                            <h4 style="margin:0px;padding-bottom:5px;"><strong><u>Document Uploaded:</u></strong></h4>
                            @if($isDoc)
                                <ol>
                                @foreach($data as $d)
                                    <li style="border-bottom:1px solid #e3e3e3;"> <a href="../hsfiles/public/legal_doc/{{ $d->doc_file }}" target=_blank> {{$d->doc_name}}  <i class="material-icons">get_app</i></a> <a class="pull-right" href="javascript:Dlt({{ $d->doc_id }})"><i class="material-icons">delete</i></a> </li>
                                @endforeach
                                </ol>
                            @else
                                <p class="text-center" style="padding-top:50px;color:#999999;">No document found</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var uploadField = document.getElementById("file");
    uploadField.onchange = function() {
        if(this.files[0].size > 5242880){
            $.confirm({
            title: 'Too Big!',
            content: 'File Size should be less than 5mb!',
            buttons: {
                Ok: function(){
                }
            }
        });
        this.value = "";
        };
    };
    function Dlt(id){
        $.confirm({
            title: 'Confirm!',
            content: 'Simple confirm!',
            buttons: {
                confirm: function(){
                    window.location.replace("../delete_doc/"+id);
                },
                cancel: function(){
                }
            }
        });
    }
</script>
