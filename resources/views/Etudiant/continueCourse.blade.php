 @extends('Etudiant.AccueilEtudiant')
        @section('content')
<center>
    <body>
       <div class="row">
           <div class="col-md-12 offset-4">
          <div role="main" class='view-school' >
    
    @php
    use App\Models\Subscriber;
    $userid=Auth::user()->id;
    $subscriber=Subscriber::where('user_id','=',$userid)->get();
    use App\Models\Chapter;
                    
                       $chapterfirst=Chapter::where('formation_id','=',$formation->id)->First();
                       $lessonfirst=$chapterfirst->lessons[0];
    @endphp
  

  

       
  
        <div id="blocks" data-ss-school-id='167313' class="blocks-page blocks-page-post_purchase_page ">
      
      
    
            <div class="course-block block purchase_confirmation  " id="block-13841254">
          
    
            <div class="row">
      <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 text-center">
        <h1>Merci pour votre inscription à ce course!</h1>
        <br>
        <p>votre ordre ID: <strong>{{$subscriber[0]->id}}</strong></p>
        <p>Vous recevrez sous peu un e-mail de confirmation  </p>
        <hr>
      </div>
    </div>
    
    
          
            </div>
          
    
        
      
    
    
      
        <!-- in live preview mode we add an extra wrapper around each block, and remove the `block.show` check -->
    
      
        
    
          
    
          
            <div class="course-block block proceed_to_course_button  " id="block-13841255">
          
    
            <center>
      
        <a class="btn btn-hg btn-primary btn-inline-block goto-course" href="/coursecontenu/{{$lessonfirst->id}}/{{$formation->id}}">Continue au Course  ›</a>
      
    </center>
    
    
          
            </div>
 
        </div>
      </div>     
           </div>
       </div>
      
    </body>
</center>
<style>
    body{
        font-family: "Raleway";
    margin: 0 !important;
    color: var(--squid-ink);
    font-size: 14px;
    line-height: 1.42857143;
}
.blocks-page-post_purchase_page {
    padding-top: 50px;
    padding-bottom: 50px;
}
.blocks-page-post_purchase_page .purchase_confirmation {
    padding-bottom: 0px;
}
.text-center {
    text-align: center;
}
.col-md-offset-2 {
    margin-left: 16.66666667%;
}

.col-md-8 {
    width: 66.66666667%;
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
    float: left;
}
    }
    a.btn, a.btn:hover, a.btn:focus {
    display: inline-block;
}
.btn-inline-block {
    min-width: 300px;
    position: relative;
}
.btn-hg {
    font-size: 17px !important;
    border-radius: 32px !important;
    padding: 12px 30px !important;
   
}
.btn-primary, .btn-primary:active, .btn-primary:focus {
    background: #e61f5b !important;
    border: 1px solid #e61f5b !important;
    font-weight: 600 !important;
    outline: none !important;
    color: #fff;
    border-radius: 20px;
    padding: 8px 18px !important;
}
</style>
        @endsection