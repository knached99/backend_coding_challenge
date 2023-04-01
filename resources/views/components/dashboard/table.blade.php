@props(['users'])
@if ($users->isEmpty())
    <div class="container shadow-lg rounded p-5 m-5">
        <h4 class="text-center fw-normal text-danger m-3">There are currently no employees in the system, go ahead and
            hire one</h4>
    </div>
@else
    <div class="container table-responsive py-5">
        <table class="table table-bordered table-hover">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">Employee ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->employee_id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><a href="{{ route('admin.user.edit', ['id' => $user->id]) }}"
                                class="btn btn-outline-primary">edit</a></td>
                        <td>
                            <form method="POST" action="{{ route('admin.user.delete', ['id' => $user->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
