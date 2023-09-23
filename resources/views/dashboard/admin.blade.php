@extends('layouts.app',['title'=> 'Home'])

@section('content')

    <div class="card mb-5 ">
        <div class="card-header">
            <p>All Merchants With each Users</p>
        </div>
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table border-top  js-exportable" id="bankTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th class="text-center">Full Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Users Count</th>
                    <th class="text-center">Users</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @forelse($list as $data)
                    <tr>
                        <td>{{ ++$loop->index }}</td>
                        <td class="text-center">
                            {{ $data->full_name }}
                        </td>
                        <td class="text-center">
                            {{ $data->email }}
                        </td>
                        <td class="text-center">
                            {{ $data->users_count }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('dashboard.showMerchant', $data->id) }}">
                               Show Merchant
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <p class="my-4">
                                No Merchants Exists Yet
                            </p>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $list->links() }}
            </div>
        </div>
    </div>
@endsection




