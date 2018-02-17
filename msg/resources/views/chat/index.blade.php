@extends('layouts.app')
@section('content')
<script src="{{ asset('js/chat.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
    <body>
        <div class="col-sm-3 col-sm-offset-4 frame">
            <ul>{{$to_id}}</ul>
            <div>
                <div class="msj-rta macro" style="margin:auto">
                    <div class="text text-r" style="background:whitesmoke !important">
                        <input class="mytext" id="content" name="content" placeholder="Type a message"/>
                        <input type="hidden"  id="to_id" name="to_id" value="{{$to_id}}"/>
                        <input type="hidden" id="from_id" name="from_id" value="{{ Auth::user()->id }}"/>
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                        <button type="submit" id="send" value="send"> send</button>

                    </div>
                </div>
            </div>
        </div>

@endsection
