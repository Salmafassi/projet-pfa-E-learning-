<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                  <div class="card-body">
                   @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           {{ __('A fresh mail has been sent to your email address.') }}
                       </div>
                   @endif
                   cet email est envoye de la part de : {{$data['name']}} <br>
                   <strong>Email: </strong>{{$data['email']}}<br>
                   {{-- {!! $content !!} --}}
                  <strong>Subject:</strong> {{$data['subject']}} <br>
                  <strong>Message:</strong> <br>
                  {{$data['message']}}
                   
               </div>
           </div>
       </div>
   </div>
</div>