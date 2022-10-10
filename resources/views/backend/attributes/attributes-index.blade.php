@extends('arka')

@section('content')

    <div class="card-header border-0 pt-5 text-center">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">Total {{$uruncerceve->count() + $uruncert->count() + $urunmalzeme->count() + $urunmasacap->count() + $urunoogrencimasayukseklik->count()}} Attribute  exist</span>

        </h3>

    </div>

    <div id="kt_app_content " class="app-content flex-column-fluid mt-5">
        <!--begin::Content container-->
        <div class="app-container">
            <div class="row gy-5 g-xl-10">
                <!--ucerceverenk-->
                <div class="col-xl-3 mb-xl-10">
                    <!--begin::Engage widget 1-->
                    <a href="{{route('admin.ucert.index')}}">
                    <div class="card ">
                        <div class="card card-flush h-md-50 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <span class="fs-2hx fw-bold text-dark "> {{$uruncerceve->count()}}</span>
                                    </div>
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Attribute Çerçeve</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->

                                <div class="card-body d-flex align-items-end pt-0">
                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-center flex-column mt-3 w-100">
                                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                            <span class="fw-bold fs-6 text-gray-400">{{$uruncerceve->count()}}%</span>
                                        </div>
                                        <div class="h-8px mx-3 w-100 bg-light-success rounded">
                                            <div class="bg-success rounded h-8px" role="progressbar" style="width:{{$uruncerceve->count()}}%;"  aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <!--end::Progress-->
                                </div>


                            <!--end::Card body-->
                        </div>
                    </div>
                    </a>

                </div>
                <!--ucert-->
                <div class="col-xl-3 mb-xl-10">
                    <!--begin::Engage widget 1-->
                    <a href="{{route('admin.malzeme.index')}}">
                    <div class="card ">
                        <div class="card card-flush h-md-50 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Amount-->
                                        <span class="fs-2hx fw-bold text-dark">{{$uruncert->count()}}</span>
                                        <!--end::Amount-->
                                        <!--begin::Badge-->
                                        <!--end::Badge-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Subtitle-->
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Attribute Certificate</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body d-flex align-items-end pt-0">
                                <!--begin::Progress-->
                                <div class="d-flex align-items-center flex-column mt-3 w-100">
                                    <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                        <span class="fw-bold fs-6 text-gray-400">{{$uruncert->count()}}%</span>
                                    </div>
                                    <div class="h-8px mx-3 w-100 bg-light-success rounded">
                                        <div class="bg-success rounded h-8px" role="progressbar" style="width: {{$uruncert->count()}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Card body-->
                        </div>
                    </div>
                    </a>

                </div>
                <!--ucolor-->
                <div class="col-xl-3 mb-xl-10">
                    <!--begin::Engage widget 1-->
                    <a href="{{route('admin.color.index')}}">
                        <div class="card ">
                            <div class="card card-flush h-md-50 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Amount-->
                                            <span class="fs-2hx fw-bold text-dark">{{$uruncolor->count()}}</span>
                                            <!--end::Amount-->
                                            <!--begin::Badge-->
                                            <!--end::Badge-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Subtitle-->
                                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Attribute Color</span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex align-items-end pt-0">
                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-center flex-column mt-3 w-100">
                                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                            <span class="fw-bold fs-6 text-gray-400">{{$uruncolor->count()}}%</span>
                                        </div>
                                        <div class="h-8px mx-3 w-100 bg-light-success rounded">
                                            <div class="bg-success rounded h-8px" role="progressbar" style="width: {{$uruncolor->count()}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Card body-->
                            </div>
                        </div>
                    </a>

                </div>
                <!--umalzeme-->
                <div class="col-xl-3 mb-xl-10">
                    <!--begin::Engage widget 1-->
                    <a href="{{route('admin.malzeme.index')}}">
                        <div class="card ">
                            <div class="card card-flush h-md-50 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Amount-->
                                            <span class="fs-2hx fw-bold text-dark">{{$urunmalzeme->count()}}</span>
                                            <!--end::Amount-->
                                            <!--begin::Badge-->
                                            <!--end::Badge-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Subtitle-->
                                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Attribute Malzeme</span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex align-items-end pt-0">
                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-center flex-column mt-3 w-100">
                                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                            <span class="fw-bold fs-6 text-gray-400">{{$urunmalzeme->count()}}%</span>
                                        </div>
                                        <div class="h-8px mx-3 w-100 bg-light-success rounded">
                                            <div class="bg-success rounded h-8px" role="progressbar" style="width: {{$urunmalzeme->count()}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Card body-->
                            </div>
                        </div>
                    </a>

                </div>
                <!--umasacap-->
                <div class="col-xl-3 mb-xl-10">
                    <!--begin::Engage widget 1-->
                    <a href="{{route('admin.masacap.index')}}">
                        <div class="card ">
                            <div class="card card-flush h-md-50 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Amount-->
                                            <span class="fs-2hx fw-bold text-dark">{{$urunmasacap->count()}}</span>
                                            <!--end::Amount-->
                                            <!--begin::Badge-->
                                            <!--end::Badge-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Subtitle-->
                                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Attribute Masa Çap</span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex align-items-end pt-0">
                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-center flex-column mt-3 w-100">
                                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                            <span class="fw-bold fs-6 text-gray-400">{{$urunmasacap->count()}}%</span>
                                        </div>
                                        <div class="h-8px mx-3 w-100 bg-light-success rounded">
                                            <div class="bg-success rounded h-8px" role="progressbar" style="width: {{$urunmasacap->count()}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Card body-->
                            </div>
                        </div>
                    </a>

                </div>
                <!--ögrenci masa yükseklik-->
                <div class="col-xl-3 mb-xl-10">
                    <!--begin::Engage widget 1-->
                    <a href="{{route('admin.ogrmasay.index')}}">
                        <div class="card ">
                            <div class="card card-flush h-md-50 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Amount-->
                                            <span class="fs-2hx fw-bold text-dark">{{$urunoogrencimasayukseklik->count()}}</span>
                                            <!--end::Amount-->
                                            <!--begin::Badge-->
                                            <!--end::Badge-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Subtitle-->
                                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Attribute Ögrenci Masa Yükseklik</span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex align-items-end pt-0">
                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-center flex-column mt-3 w-100">
                                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                            <span class="fw-bold fs-6 text-gray-400">{{$urunoogrencimasayukseklik->count()}}%</span>
                                        </div>
                                        <div class="h-8px mx-3 w-100 bg-light-success rounded">
                                            <div class="bg-success rounded h-8px" role="progressbar" style="width: {{$urunoogrencimasayukseklik->count()}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Card body-->
                            </div>
                        </div>
                    </a>

                </div>
                <!--uplakasize-->
                <div class="col-xl-3 mb-xl-10">
                    <!--begin::Engage widget 1-->
                    <a href="{{route('admin.urunplakas.index')}}">
                        <div class="card ">
                            <div class="card card-flush h-md-50 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Amount-->
                                            <span class="fs-2hx fw-bold text-dark">{{$urunplakasize->count()}}</span>
                                            <!--end::Amount-->
                                            <!--begin::Badge-->
                                            <!--end::Badge-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Subtitle-->
                                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Attribute Urun Plaka Size</span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex align-items-end pt-0">
                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-center flex-column mt-3 w-100">
                                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                            <span class="fw-bold fs-6 text-gray-400">{{$urunoogrencimasayukseklik->count()}}%</span>
                                        </div>
                                        <div class="h-8px mx-3 w-100 bg-light-success rounded">
                                            <div class="bg-success rounded h-8px" role="progressbar" style="width: {{$urunoogrencimasayukseklik->count()}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Card body-->
                            </div>
                        </div>
                    </a>

                </div>
                <!--usize-->
                <div class="col-xl-3 mb-xl-10">
                    <!--begin::Engage widget 1-->
                    <a href="{{route('admin.urunsize.index')}}">
                        <div class="card ">
                            <div class="card card-flush h-md-50 mb-xl-10">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Amount-->
                                            <span class="fs-2hx fw-bold text-dark">{{$urunsize->count()}}</span>
                                            <!--end::Amount-->
                                            <!--begin::Badge-->
                                            <!--end::Badge-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Subtitle-->
                                        <span class="text-gray-400 pt-1 fw-semibold fs-6">Attribute Urun Size</span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex align-items-end pt-0">
                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-center flex-column mt-3 w-100">
                                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                            <span class="fw-bold fs-6 text-gray-400">{{$urunsize->count()}}%</span>
                                        </div>
                                        <div class="h-8px mx-3 w-100 bg-light-success rounded">
                                            <div class="bg-success rounded h-8px" role="progressbar" style="width:{{$urunsize->count()}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Card body-->
                            </div>
                        </div>
                    </a>

                </div>


            </div>
        </div>
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
