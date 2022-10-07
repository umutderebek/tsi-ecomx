@extends('arka')

@section('content')
    <div style="margin-top: 35px;" id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-xl-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body pt-15">
                            <!--begin::Summary-->
                            <div class="d-flex flex-center flex-column mb-5">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-150px symbol-circle mb-7">
                                    <img src="/frontend/uploads/profile/{{$users->urun_resmi}}" alt="image" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">{{$users->name}} {{$users->surname}}</a>
                                <!--end::Name-->
                                <!--begin::Email-->
                                <a href="#" class="fs-5 fw-semibold text-muted text-hover-primary mb-6">{{$users->email}}</a>
                                <!--end::Email-->
                            </div>
                            <!--end::Summary-->
                            <!--begin::Details toggle-->
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bold">Details</div>
                                <!--begin::Badge-->
                                <div class="badge badge-light-info d-inline">Premium user</div>
                                <!--begin::Badge-->
                            </div>
                            <!--end::Details toggle-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--begin::Details content-->
                            <div class="pb-5 fs-6">
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Account ID</div>
                                <div class="text-gray-600">ID-{{$users->id}}</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bold mt-5">Billing Email</div>
                                <div class="text-gray-600">
                                    <a href="#" class="text-gray-600 text-hover-primary">{{$users->id}}</a>
                                </div>
                                <div class="fw-bold mt-5">Website</div>
                                <div class="text-gray-600">
                                    <a href="#" class="text-gray-600 text-hover-primary">{{$users->website}}</a>
                                </div>
                                <div class="fw-bold mt-5">Phone</div>
                                <div class="text-gray-600">
                                    <a href="#" class="text-gray-600 text-hover-primary">{{$users->phone}}</a>
                                </div>
                                <div class="fw-bold mt-5">Country</div>
                                <div class="text-gray-600">
                                    <a href="#" class="text-gray-600 text-hover-primary">{{$users->country}}</a>
                                </div>
                                <div class="fw-bold mt-5">State</div>
                                <div class="text-gray-600">
                                    <a href="#" class="text-gray-600 text-hover-primary">{{$users->state}}</a>
                                </div>


                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>

            </div>

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
