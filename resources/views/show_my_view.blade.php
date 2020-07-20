@extends('layouts.app')

@section('content')

<h1>contantact page</h1>

@if(count($people))
<ul>

  @foreach ($people as $person)
    <li>{{$person}}</li>

  @endforeach
</ul>
@endif

@stop

@section('footer')

<script>

alert('hellow vaia')

</script>

@endsection
