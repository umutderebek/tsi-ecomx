@extends('arka')

@section('content')


<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Edit Category</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Catalog</li>
                        <!--end::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Edit Category</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>

            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <form method="post" class="form d-flex flex-column flex-lg-row" action="{{route('admin.category.guncelle',$kategori->id)}}" enctype="multipart/form-data">
                    @csrf

                    <!--begin::Aside column-->
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        <!--begin::Thumbnail settings-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>Thumbnail</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->

                            <div class="card-body text-center pt-0">
                                <!--begin::Image input-->
                                <!--begin::Image input-->

                                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                    <!--begin::Preview existing avatar-->
                                    @if($kategori->kategori_resmi !=null)
                                    <div class="image-input-wrapper w-150px h-150px" style="background-image: url(/frontend/uploads/category/masalar/{{$kategori->kategori_resmi}})"></div>
                                    <!--end::Preview existing avatar-->
                                    @endif
                                    <!--begin::Label-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                        <!--begin::Icon-->
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--end::Icon-->
                                        <!--begin::Inputs-->
                                        <input type="file" name="kategori_resmi" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
															<i class="bi bi-x fs-2"></i>
														</span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
															<i class="bi bi-x fs-2"></i>
														</span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set the category thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Card body-->

                        </div>
                        <!--end::Thumbnail settings-->
                        <!--begin::Status-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>Status</h2>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <div class="rounded-circle {{ $kategori->yayin === 1 ? "bg-success" : "bg-danger"}} w-15px h-15px"></div>
                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select2-->
                                <select class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_category_status_select" name="status">
                                    <option></option>
                                    <option value="published" {{ $kategori->yayin === 1 ? "selected" : ""}}>Published</option>
                                    <option value="unpublished" {{ $kategori->yayin === 0 ? "selected" : ""}}>Unpublished</option>
                                </select>
                                <!--end::Select2-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set the category status.</div>
                                <!--end::Description-->
                                <!--begin::Datepicker-->
                                <div class="d-none mt-10">
                                    <label for="kt_ecommerce_add_category_status_datepicker" class="form-label">Select publishing date and time</label>
                                    <input class="form-control" id="kt_ecommerce_add_category_status_datepicker" placeholder="Pick date & time" />
                                </div>
                                <!--end::Datepicker-->
                            </div>
                            <!--end::Card body-->
                        </div>

                    </div>
                    <!--end::Aside column-->
                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin::General options-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>General</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label">Category Name</label>
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7 mb-3">A category name is required and recommended to be unique.</div>
                                    <!--end::Description-->
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    {!! Form::text('kategori_adi',$kategori->kategori_adi, ['class' => 'form-control mb-2 ',  'placeholder' => 'Category Name']) !!}



                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label">Category Slug</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    {!! Form::text('slug',$kategori->slug, ['class' => 'form-control ','placeholder' => 'Kategori Slug Giriniz', 'required' => '']) !!}
                                </div>
                                <!--end::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label">Category Description</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    {!! Form::text('aciklama',$kategori->aciklama, ['class' => 'form-control',  'placeholder' => 'Kategori Aciklama']) !!}
                                </div>
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::General options-->
                        <!--begin::Meta options-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Meta Options</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">Meta Tag Title</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    {!! Form::text('seo_title',$kategori->seo_title, ['class' => 'form-control',  'placeholder' => 'Seo Baslik' ]) !!}
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Set a meta tag title. Recommended to be simple and precise keywords.</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">Meta Tag Description</label>
                                    <!--end::Label-->
                                    <!--begin::Editor-->
                                    {!! Form::text('seo_description',$kategori->seo_description, ['class' => 'form-control ',  'placeholder' => 'Seo Aciklama']) !!}
                                    <!--end::Editor-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Set a meta tag description to the category for increased SEO ranking.</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div>
                                    <!--begin::Label-->
                                    <label class="form-label">Meta Tag Keywords</label>
                                    <!--end::Label-->
                                    <!--begin::Editor-->
                                    {!! Form::text('seo_keywords',$kategori->seo_keywords, ['class' => 'form-control ',  'placeholder' => 'Seo Keywords']) !!}
                                    <!--end::Editor-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Set a list of keywords that the category is related to. Separate the keywords by adding a comma
                                        <code>,</code>between each keyword.</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card header-->
                        </div>

                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{route('admin.category.index')}}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                                <span class="indicator-label">Save Changes</span>
                                <span class="indicator-progress">Please wait...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                    </div>
                    <!--end::Main column-->
                </form>
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
</div>




@endsection
