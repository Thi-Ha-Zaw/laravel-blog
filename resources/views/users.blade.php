@extends('layouts.dashboard')

@section('content')

        <div class="row justify-content-center mt-3">
            <div class="col-12">
                {{-- <h1 class=" mb-5">User Lists</h1> --}}
                <div class=" table-responsive bg-white rounded p-5 shadow">
                    <table class=" table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Category Count</th>
                                <th>Article Count</th>
                                <th>Control</th>
                                <th>Updated_at</th>
                                <th>Created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                @if ($user->role != 'admin')
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            {{ $user->categories->count() }}
                                        </td>
                                        <td>
                                            {{ $user->articles->count() }}
                                        </td>
                                        <td>
                                            @if ($user->is_banned)
                                                <form action="{{ route('admin.recallUser', $user) }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="btn btn-dark btn-sm">Recall</button>
                                                </form>
                                            @elseif (!$user->is_banned && $user->id != 12)
                                                <form action="{{ route('admin.banUser', $user) }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="btn btn-danger btn-sm">Ban</button>
                                                </form>
                                            @endif
                                        </td>
                                        {{-- <td> --}}
                                        {{-- <div class=" btn-group btn-group-sm">
                                    <a class=" btn btn-outline-dark" href="{{ route('article.show', $user->id) }}">
                                        <i class=" bi bi-info"></i>
                                    </a>
                                    <a class=" btn btn-outline-dark" href="{{ route('article.edit', $user->id) }}">
                                        <i class=" bi bi-pencil"></i>
                                    </a>
                                    <a form="articleDelForm{{ $user->id }}" class=" btn btn-outline-dark">
                                        <i class=" bi bi-trash3"></i>
                                    </a>
                                </div>
                                <form id="articleDelForm{{ $user->id }}"
                                    action="{{ route('article.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                </form> --}}
                                        {{-- </td> --}}
                                        <td>{{ $user->updated_at->diffForHumans() }}</td>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                    </tr>
                                @endif
                            @empty
                                <tr class=" text-center">
                                    <td colspan="5">
                                        <h3>There is no Users</h3>
                                        {{-- <a href="{{ route('article.create') }}" class=" btn btn-dark">Create New</a> --}}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class=" mt-3">
                    {{ $users->onEachSide(1)->links() }}
                </div>
            </div>
        </div>

@endsection
