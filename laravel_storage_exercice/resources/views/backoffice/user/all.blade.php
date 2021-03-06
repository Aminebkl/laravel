@extends('layout.app')

@section('content')
    @include('partial.nav')
        
    <section class="container mr-5">
        
        <h1 class="text-center my-3">tableau de Users</h1>
        
        <a class="btn btn-secondary text-white my-2" href="/user/create">Create</a>
        
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">nom</th>
                <th scope="col">prenom</th>
                <th scope="col">age</th>
                <th scope="col">email</th>
                <th scope="col">password</th>
                <th scope="col">photo de profil</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="col-6">
                @foreach ($user as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->nom }}</td>
                        <td>{{ $user->prenom }}</td>
                        <td>{{ $user->age }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->photo }}</td>
                        <td class="d-flex">
                            <a class="btn btn-primary text-white" href="/user/{{ $user->id }}/edit">Edit</a>
                            <form action="/user/{{ $user->id }}/delete" method="POST">
                                @csrf
                                <button class="btn btn-danger text-white mx-2" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
           
    </section>

    @include('partial.footer')
@endsection