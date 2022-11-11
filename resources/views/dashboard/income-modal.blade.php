<div class="modal fade" id="kt_modal_income" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-1000px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header py-7 d-flex justify-content-between">
                <!--begin::Modal title-->
                <h2>Add Income</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y m-5">
                <form action={{ route('transaction.create') }} autocomplete="off">
                    @csrf
                    <!--begin::Input-->
                    <input type="hidden" class="form-control form-control-solid" name="isIncome" value="1" />
                    <!--end::Input-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-8">
                        <!--begin::Label-->
                        <label class="required fs-6 fw-bold mb-2">Category</label>
                        <!--end::Label-->

                        <!--begin::Select-->
                        <div id="income_selector">
                            <input type="hidden" name="is_custom" id="income_is_custom" value="" />
                            <input type="hidden" name="category" id="income_category" value="" />
                            <button type="button" id="income_a" name="category"
                                class="form-control form-control-solid min-45px text-start min-h-45px"><span
                                    class="opacity-50">Choose category</span></button>
                            <input type="text" id="income_me"
                                class="form-control form-control-solid bg-transparent d-none p-3 border border-1 rounded-top"
                                placeholder="Add new category" oninput="validateSpace(this)" autofocus />

                            <ul id="income_mee" class="d-none border-1 rounded-bottom border-top-0">
                                @foreach ($categories->groupBy('type')['income'] as $category)
                                    <li class="list-group-item bg-hover-secondary border-0 border-bottom-dotted"
                                        name="{{ $category->id }}">
                                        {{ $category->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <!--end::Select-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-8">
                        <!--begin::Label-->
                        <label class="required fs-6 fw-bold mb-2">Amount</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" class="form-control form-control-solid rounded min-h-45px fs-6"
                            placeholder="Enter Amount" name="amount" required />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-8">
                        <!--begin::Label-->
                        <label class="required fs-6 fw-bold mb-2">Description</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea class="form-control form-control-solid fs-6" placeholder="Enter Description" name="description" /></textarea>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-8 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-md w-100 ">Add</button>
                    </div>
                    <!--end::Input group-->

                </form>
            </div>
            <!--end::Modal body-->
        </div>
    </div>
</div>

