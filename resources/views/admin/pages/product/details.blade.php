@extends('admin.master')
@section('content')

<h3> Home Details </h3>

<p>
    <td><img src="{{ Storage::url($home->image)}}" width="80"></td>
</p>
<p>Name:{{$home->name}} </p>

@endsection
