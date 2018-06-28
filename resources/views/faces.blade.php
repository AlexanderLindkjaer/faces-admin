@extends('layouts.logged-in')

@section('content')

    <div class="row">

      @foreach($faces as $face)
        <face :data_face="{{ $face->toJson() }}"></face>
      @endforeach

      <create-face></create-face>


    </div>

@endsection
