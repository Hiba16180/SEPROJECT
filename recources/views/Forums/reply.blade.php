<div class="panel panel-default" style="margin:10px">
           
            <div class="ms-auto text-end">
            <div class="forms-container">

            &nbsp;&nbsp;&nbsp;<img src="../{{$reply->creator->profile_photo_path}}" style="width:30px!important;heigth:30px!important;border-radius:100px;height:30px" class="">
            &nbsp;<a href='#' style="display: inline-block; vertical-align: bottom;">{{ $reply->creator->name }}  </a> 
            &nbsp;<span style="display: inline-block; vertical-align: bottom;font-size:10px">  said {{ $reply->created_at->diffForHumans() }} </span>
            @if(auth()->id() == $reply->creator->id) 
                <form style="width:30px!important;height:10px!important;margin-right:15px;margin-left:15px" method='GET' class="dl-rp">
                    <button type="submit" value="delete" class="btn btn-link text-danger text-gradient px-3 mb-0">
                       <i  class="far fa-trash-alt me-2" aria-hidden="true"></i>
                    </button>
                <input type="hidden" id="reply" value="{{ $reply }}">
                <input type="hidden" id="post" value="{{ $post }}">
                </form>
                <button  type="submit" class="sh-ed-cm btn btn-link text-dark text-gradient px-3 mb-0">
                <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>
                </button>
            @endif      
                
            </div>
       
            </div>
           
      
        <br>
    
        <p class="cm-bd" style="margin:5px">
                
                &nbsp;&nbsp;&nbsp;&nbsp;{{ $reply->body }}
        </p>    
        <form  id="ed-cm" style="display:none; margin-top:8px" method='POST' class="ed-rp" >
                <input type="hidden" id="reply" value="{{ $reply }}">
                <input type="hidden" id="post" value="{{ $post }}">
                <textarea  name='body' id='body' class='form-control' placeholder='Write your comment here' rows='1' cols='80' >{{$reply->body}}</textarea>
                <button type="submit"  value="edit" class="btn btn-link text-dark px-3 mb-0">submit</button>
        </form>   
        <hr color="grey" size="5" width="50%">
         
</div>