@extends('arka')

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid mt-5">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Category-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
															<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
														</svg>
													</span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-ecommerce-category-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Category" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Add customer-->
                        <a href="{{route('admin.masacap.yeni')}}" class="btn btn-primary">Add MasaCap</a>
                        <!--end::Add customer-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                        <!--begin::Table head-->
                        <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-100px">Masacap</th>
                            <th class="min-w-100px">Masacap Name</th>
                            <th class="min-w-100px">Masacap Sku</th>
                            <th class="min-w-100px">Masacap Price</th>
                            <th class="min-w-100px">Masacap Order</th>
                            <th class="min-w-100px">Masacap Status</th>
                            <th class="text-end min-w-70px">Actions</th>
                        </tr>
                        <!--end::Table row-->
                        </thead>
                        @foreach($masacap as $kat)
                            <tbody class="fw-semibold text-gray-600">
                            <tr>
                                <td>{{$kat->id}}</td>

                                <td>{{$kat->name}}</td>

                                <td>{{$kat->sku}}</td>

                                <td>{{$kat->price}}</td>

                                <td>{{$kat->order}}</td>
                                <td>
                                    @if($kat->yayin == 1)
                                        <span class="btn btn-success">Verified</span>
                                    @else
                                        <span class="btn btn-danger">None</span>
                                    @endif
                                </td>


                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-5 m-0">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
																</svg>
															</span>
                                        <!--end::Svg Icon--></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{route('admin.masacap.duzenle',$kat->id)}}" class="menu-link px-3">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('admin.masacap.sil',$kat->id) }}" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row">Delete</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                                <!--end::Action=-->
                            </tr>
                            </tbody>
                        @endforeach
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Category-->
        </div>
        <!--end::Content container-->
    </div>

@endsection


@section('js')
    <script src="/backend/js/custom/apps/ecommerce/customers/details/transaction-history.js"></script>
    <script src="/backend/js/custom/apps/ecommerce/customers/details/add-auth-app.js"></script>
    <script src="/backend/js/custom/apps/ecommerce/customers/details/add-address.js"></script>
    <script src="/backend/js/custom/apps/ecommerce/customers/details/add-one-time-password.js"></script>
    <script src="/backend/js/custom/apps/ecommerce/customers/details/update-password.js"></script>
    <script src="/backend/js/custom/apps/ecommerce/customers/details/update-phone.js"></script>
    <script src="/backend/js/custom/apps/ecommerce/customers/details/update-address.js"></script>
    <script src="/backend/js/custom/apps/ecommerce/customers/details/update-profile.js"></script>
    <script src="/backend/js/widgets.bundle.js"></script>
    <script src="/backend/js/custom/widgets.js"></script>
    <script src="/backend/js/custom/apps/chat/chat.js"></script>
    <script src="/backend/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="/backend/js/custom/utilities/modals/create-app.js"></script>
    <script src="/backend//js/custom/utilities/modals/new-card.js"></script>
    <script src="/backend//js/custom/utilities/modals/users-search.js"></script>
@endsection
