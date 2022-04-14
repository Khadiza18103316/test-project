@extends('admin.master')
@section('content')

    <h3 class="mb-4">All Users</h3>

    @if(session()->has('msg'))
    <p class="alert alert-danger">{{session()->get('msg')}}</p>
@endif

@if(session()->has('success'))
    <p class="alert alert-success">{{session()->get('success')}}</p>
@endif

@if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
@endif

    <a href="{{ route('user.registation') }}" class="btn btn-primary float-end" ><i class="fa fa-plus"></i>Register User</a>
    <br>
    <br>
    <table class="table table-striped table-bordered table-hover" style="width: 100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">City</th>
                <th scope="col">Country</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <th>{{ $key + 1 }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->dof }}</td>
                    <td>{{ $user->city}}</td>
                    <td>{{ $user->country}}</td>
                    <td>
                        <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->status ? 'checked' : '' }}>
                     </td>

                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('user.edit', $user->id) }}">Edit</a> <br>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?')" href="{{ route('user.delete', $user->id) }}">Delete</a> <br>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $users->links() }} --}}

@endsection

<script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0;
          var user_id = $(this).data('id');
           console.log(status);
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/userChangeStatus',
              data: {'status': status, 'user_id': user_id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
  </script>
