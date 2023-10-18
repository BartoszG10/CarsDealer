
@if (session('status'))
    <div class="row" id="succes-msg">
        <div class="col-12">
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        </div>
    </div>
@endif
