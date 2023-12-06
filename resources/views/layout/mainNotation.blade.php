<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Nombre de Joueurs différant ayant voté :</h5>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="fa-solid fa-person-booth" style="color: #ffffff;"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">
                            <div id="totalFlags">
                                @if (empty($countVotingPlayer))
                                    Loading...
                                @else
                                    {{ $countVotingPlayer[0]->NombreDeJoueurs }}
                                @endif
                            </div>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Nombre total de vote :</h5>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="fa-solid fa-check-to-slot" style="color: #ffffff;"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">
                            <div id="totalValidatedFlags">
                                @if (empty($NbQuestion))
                                    Loading...
                                @else
                                    {{ $NbQuestion }}
                                @endif
                            </div>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-7">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Recent Movement</h5>
                    </div>
                    <div class="card-body pt-2 pb-3">
                        <div>
                            <canvas id="myChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
