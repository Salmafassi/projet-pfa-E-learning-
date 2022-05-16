@extends('Etudiant.watchcourse')
@section('contentsection')
{{-- content lesson --}}
<script > 
$(document).ready(function(){
$("#player").on("timeupdate",function(event){
onTrackedVideoFrame(this.currentTime,this.duration);
});
});
function onTrackedVideoFrame(currentTime,duration){
  $("#current").text(currentTime);
  $("#duration").text(duration);
  if(currentTime==duration){
    if(document.getElementById('nextBouton')){
         document.getElementById('nextBouton').click();
    }
   else{
    document.getElementById('nextBoutonFake').click();
   }
  }
}
</script>
<h2 id="lecture_heading" class="section-title dsp-flex-xs flex-align-items-center-xs" data-lecture-id="11522420" data-next-lecture-id="11522448" data-lecture-url="/courses/645610/lectures/11522420" data-next-lecture-url="/courses/645610/lectures/11522448", data-previous-lecture-url="/courses/645610/lectures/11522399" data-previous-lecture-id="11522399" >
   @if($fichier->type=="video") 
  <svg width="24" height="24">
        <use xlink:href="#icon__Video"></use>
      </svg>
      @else
      <svg width="24" height="24">
        <use xlink:href="#icon__Subject"></use>
      </svg>
      @endif
    &nbsp;
    {{$fichier->title}}
</h2> 

  <!-- Attachment Blocks -->


    @if($fichier->type=="video") 
     
      <video style="height:600px;width: 100%" id="player" playsinline controlsList="nodownload " preload="metadata"  poster="/uploads/formations/{{$fichier->chapter->formation->photo}}" autoplay autocomplete controls>
        <source src="/uploads/lesson_files/{{$fichier->fichier}}" type="video/mp4" />
        
        </video> 
        @else
        <iframe style="height:1020px;width: 100%;align-items:center;padding-left:0%;border-style:none;border:0" cellspacing="0" src="/uploads/lesson_files/{{$fichier->fichier}}#toolbar=0"  frameborder="0"></iframe>
            @endif
        {{-- 
 <iframe width="560" height="315" src="https://www.youtube.com/embed/UL-QqQuxZc0" frameborder gesture="media" allow="crypted-media;" allowfullscreen></iframe> --}}
<div id="current" style="display:none">00:00</div>
<div id="duration" style="display:none" >00:00</div>


  <!-- Video actions -->
  
  
      
    </div>
  
{{-- /content lesson --}}
@endsection