<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Statistique</strong></h1>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Importer des fichiers CSV</h5>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="flag"></i>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('upload.post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-1 mb-3">
                                <div class="mb-3 mt-2 d-flex align-items-center position-relative">
                                    <input class="form-control me-2 w-75" id="formFile" type="file" name="file">
                                    <input class="btn btn-secondary ms-2" type="submit" value="Valider">
                                </div>

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                @endif

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Historique</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                            <table class="table table-hover my-0">
                                <thead>
                                    <tr class="sticky-top bg-darkblue">
                                        <th>Name</th>
                                        <th class="d-none d-xl-table-cell">Question</th>
                                        <th class="d-none d-xl-table-cell">End Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="validated-flags-table"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
