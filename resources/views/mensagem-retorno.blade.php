        @if(Session::has('error'))
        <div class="modal-fundo mod-fade-alert">
            <div class="modal-content col-md-8 xs-12 container">
                <div class="modal-body">
                    <button type="button" class="btn-modal-close-alert">
                        <span>x</span>
                    </button>
                    <div class="alert alert-warning content-modal-alert mt-3">
                        @foreach (Session::get('error.message') as $message)
                        <li>{{$message}}</li>
                        @endforeach 

                        @if(Session::has('error.link'))
                        @foreach (Session::get('error.link') as $link)
                        <li><a href="{{$link['url']}}">{{$link['text']}}</a></li>
                        @endforeach 
                        @endif          
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(Session::has('success'))
        <div class="modal-fundo mod-fade-alert">
            <div class="modal-content col-md-8 xs-12 container">
                <div class="modal-body">
                    <button type="button" class="btn-modal-close-alert">
                        <span>x</span>
                    </button>
                    <div class="alert alert-success content-modal-alert mt-3">
                        @foreach (Session::get('success.message') as $message)
                        <li>{{$message}}</li>
                        @endforeach

                        @if(Session::has('success.link'))
                        @foreach (Session::get('success.link') as $link)
                        <li><a href="{{$link['url']}}">{{$link['text']}}</a></li>
                        @endforeach 
                        @endif              
                    </div>
                </div>
            </div>
        </div>
        @endif

        <span tipo="rota_modal"></span>

        <div class="modal-fundo mod-fade-alert">
            <div class="modal-content col-md-8 xs-12 container">
                <div class="modal-body">
                    <button type="button" class="btn-modal-close-alert">
                        <span>x</span>
                    </button>
                    <div class="alert alert-warning content-modal-alert mt-3">
                        teste mensagem        
                    </div>
                </div>
            </div>
        </div>