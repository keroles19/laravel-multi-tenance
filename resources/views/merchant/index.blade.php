@extends('layouts.app',['title'=>  $merchant?->full_name . 'details' ])

@section('content')

    <div class="card mb-5 ">
        <div class="card-header">

            <p> Home / <span class="fw-bold"> {{ $merchant?->full_name }}</span></p>

            <p>merchant's users</p>
        </div>
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table border-top  js-exportable" id="bankTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th class="text-center">Full Name</th>
                    <th class="text-center">Email</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @forelse($users as $user)
                    <tr>
                        <td>{{ ++$loop->index }}</td>
                        <td class="text-center">
                            {{ $user->full_name }}
                        </td>
                        <td class="text-center">
                            {{ $user->email }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <p class="my-4">
                                No Users Exists Yet
                            </p>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection




