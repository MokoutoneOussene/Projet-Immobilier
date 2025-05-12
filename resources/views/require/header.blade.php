<header class="page-header page-header-dark pb-10" style="background: rgb(97, 159, 138);">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="activity"></i></div>
                        Dashboard
                    </h1>
                    <div class="page-header-subtitle">Example dashboard overview and content summary</div>
                </div>
                <div class="col-12 col-xl-auto mt-4">
                    <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                        <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                        <div class="form-control ps-0 pointer">
                            {{ Carbon\Carbon::now()->format('d-m-Y') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

