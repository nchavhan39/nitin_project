@extends('layouts.app')

@section('content')
<style>
ul.category-tree {
    list-style: none;
    padding-left: 0;
}

ul.category-tree li {
    padding: 5px 0;
    border-left: 2px solid #007bff;
}

ul.category-tree li:hover {
    background-color: #f7f7f7;
}

ul.category-tree li ul {
    margin-left: 20px;
}

ul.category-tree li::before {
    content: "\2022";
    color: #007bff;
    margin-right: 5px;
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                Hello, {{ Auth::user()->name }}

                @if(Auth::user()->user_type == 'admin')
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h1>List of Users</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Type</th>
                                <!-- Add more user fields here -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->user_type }}</td>
                                <!-- Add more user fields here -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>


    <h1>Categories Tree View</h1>
    <a href="/create-category">Create</a>
    <ul class="category-tree">
        @foreach($categories as $category)
        <li>
            <span>{{ $category['name'] }}</span>
            <a href="{{ route('edit-category', ['id' => $category['id']]) }}" class="edit-link">Edit</a>
            <a href="{{ route('delete-category', ['id' => $category['id']]) }}" class="delete-link">Delete</a>
        </li>
        @if(count($category['children']) > 0)
        <ul class="collapsed">
            @foreach($category['children'] as $child)
            <li>
                <span>{{ $child['name'] }}</span>
                <a href="{{ route('edit-category', ['id' => $child['id']]) }}" class="edit-link">Edit</a>
                <a href="{{ route('delete-category', ['id' => $child['id']]) }}" class="delete-link">Delete</a>
            </li>
            @if(count($child['children']) > 0)
            <ul class="collapsed">
                @foreach($child['children'] as $subChild)
                <li>
                    <span>{{ $subChild['name'] }}</span>
                    <a href="{{ route('edit-category', ['id' => $subChild['id']]) }}" class="edit-link">Edit</a>
                    <a href="{{ route('delete-category', ['id' => $subChild['id']]) }}" class="delete-link">Delete</a>
                </li>
                @endforeach
            </ul>
            @endif
            @endforeach
        </ul>
        @endif
        @endforeach
    </ul>


</div>
@endsection