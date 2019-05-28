{{-- Legal Documents --}}
@if ($print_conf->legal_doc != "0")
<div class="row">
  <div class="col-lg-12">
    <div class="box box-primary border-light-blue">
      <div class="box-body padding-top-5" style="padding-bottom:10px">
        <h3 style="text-align:center"><strong>Legal Documents</strong></h3>
        <div class="form-inline border-top" style="padding-top:10px">
          @php
            $doc_list = explode(",",$print_conf->legal_doc);
          @endphp
          <div class="table-responsive ">
            <table>
              <tbody>
                  @foreach($doc_list as $key=>$doc_id)
                <tr>
                  @php
                    $documents_data = DB::table('documents')->where([['id',$doc_id],['facility_id',Auth::user()->facility_id],['status',1]])->first();
                    $doc_file_data = DB::table('legal_doc_upload')->where([['pros_id',$pros_id],['doc_name',$documents_data->doc_name],['facility_id',Auth::user()->facility_id],['status',1]])->first();
                    
                  @endphp
                  <td width="30%"><h4><strong>{{$key +1}}. {{$documents_data->doc_name}}</strong></h4></td>
                  <td width="70%">
                    @if($doc_file_data == null)
                      <h4 class="text-center">Document not found</h4>
                    @else
                      @if($doc_file_data->file_type =='.jpg' || $doc_file_data->file_type =='jpeg' || $doc_file_data->file_type =='.png')
                        <img src="{{asset('hsfiles/public/legal_doc')}}/{{$doc_file_data->doc_file}}" class="img-responsive" alt="Something is wrong with the file">
                      @endif
                      @if($doc_file_data->file_type =='.pdf' || $doc_file_data->file_type == '.doc' || $doc_file_data->file_type == 'docx')
                        <iframe src="http://docs.google.com/gview?url={{asset('hsfiles/public/legal_doc')}}/{{$doc_file_data->doc_file}}&embedded=true" style="width:100%; height:500px;" frameborder="0"></iframe>
                      @endif
                    @endif
                    </td>	
                </tr>  
                @endforeach                           
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
