@extends('arka')

@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Member Statistics</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Over {{$users->count()}} new members</span>
            </h3>

        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                    <tr class="fw-bold text-muted bg-light">
                        <th class="ps-4 min-w-300px rounded-start">Member</th>
                        <th class="min-w-125px">Company</th>
                        <th class="min-w-125px">Approve</th>
                        <th class="min-w-200px">Create Date</th>
                        <th class="min-w-150px">Deleted Date</th>
                        <th class="min-w-200px text-end rounded-end">Options</th>
                    </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    @foreach($users as $user)
                    <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
																		<span class="symbol-label bg-light">
																			<img src="/frontend/uploads/profile/{{$user->urun_resmi}}" class="h-75 align-self-end" alt="" />
																		</span>
                                </div>
                                <div class="d-flex justify-content-start flex-column">
                                    <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{$user->name}} {{$user->surname}}</a>
                                    <span class="text-muted fw-semibold text-muted d-block fs-7">{{$user->email}}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{$user->company}}</a>

                        </td>
                        <td>
                            @if($user->verified == 1)
                                <span class="btn btn-success">Verified</span>
                            @else
                                <span class="btn btn-danger">None</span>
                            @endif
                        </td>
                        <td>
                            <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{$user->created_at}}</a>

                        </td>
                        <td>
                            <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{$user->deleted_at}}</a>
                        </td>
                        <td class="text-end">
                            <a href="{{route('admin.user.goster',$user->id)}}" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2">View</a>
                            <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
                            <a href="{{ route('admin.user.sil',$user->id) }}" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Delete</a>
                        </td>
                    </tr>

                    </tbody>
                    @endforeach
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
@endsection
