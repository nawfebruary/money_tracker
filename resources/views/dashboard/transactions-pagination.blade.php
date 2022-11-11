<div class="row g-5 g-xl-10 mb-xl-10">
    <div class="col-lg-12 col-xl-12 col-xxl-12 mb-5 mb-xl-0">
        <div class="card card-flush h-xl-100">
            <!--begin::Card header-->
            <div class="card-header pt-7">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder text-dark">History</span>
                    <span class="text-gray-400 mt-1 fw-bold fs-6">Total {{ $count }} Items in the
                        History</span>
                </h3>

            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body">

                <!--end::Title-->
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th class="min-w-100px">category</th>
                            <th class="text-end pe-3 min-w-100px">amount</th>
                            <th class="text-end pe-3 min-w-150px">status</th>
                            <th class="text-end pe-3 min-w-150px">description</th>
                            <th class="text-end pe-3 min-w-100px">created at</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bolder text-gray-600">
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td class="text-dark text-hover-primary">{{ $transaction->category_name }}
                                </td>
                                <td class="text-end">{{ addCurrency($transaction->amount) }}</td>
                                <td class="text-end">
                                    @if (isset($transaction->is_income) && $transaction->is_income)
                                        <span class="badge py-3 px-4 fs-7 badge-light-success">Income</span>
                                    @else
                                        <span class="badge py-3 px-4 fs-7 badge-light-danger">Expense</span>
                                    @endif
                                </td>
                                <td class="text-end">{{ $transaction->note ?? '-' }}</td>
                                <td class="text-end">{{ $transaction->created_at ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
                <!--begin::Pagination-->
                <div class="d-flex justify-content-center">
                    {!! $transactions->render() !!}
                </div>
                <!--end::Pagination-->

            </div>
            <!--end::Card body-->
        </div>
    </div>
</div>
