@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($records as  $record)
            @if($record->id!=Auth::user()->id)
            <tr>
              <th>{{$record->id}}</th>
              <td>{{$record->name}}</td>
              <td>{{$record->email}}</td>
              <td><a  href="/chat/{{$record->id}}"class="btn btn-primary"> MSG</a></td>
            </tr>
            @endif
          @endforeach
          </tbody>
        </table>
        <?php echo $records->render();?>
      </div>
</div>
@endsection
