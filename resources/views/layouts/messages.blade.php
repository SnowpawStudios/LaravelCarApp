{{-- SUCCESS AND ERROR MESSAGES --}}

@section('messages')
<section>
    <div class="container" >
        @isset($message_success)
        <div class="" style="padding-top: 100px;">
            <div class="alert alert-success" role="alert" style="">
                {{$message_success}}                    
            </div>
        </div>
        @endisset

        @isset($message_warning)
        <div class="" style="padding-top: 100px;">
            <div class="alert alert-warning" role="alert" style="">
                {{$message_warning}}                    
            </div>
        </div>
        @endisset
    </div>
</section>

@endsection