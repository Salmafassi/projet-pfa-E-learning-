<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenu !</div>
                  <div class="card-body">
                   @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           {{ __('A fresh mail has been sent to your email address.') }}
                       </div>
                   @endif
                   
                   {{-- {!! $content !!} --}}
                  <strong>Subject:</strong> {{$data['subject']}} <br>
                  <strong>votre ordre :</strong> 
                  {{$data['id']}}
                   
               </div>
           </div>
       </div>
   </div>
</div>