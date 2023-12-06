

<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Statistique</strong></h1>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Nombre de quizz :</h5>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="fa-regular fa-comment" style="color: #ffffff;"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">
                            <div id="totalFlags">
                                @if (empty($NbQuizz))
                                    Loading...
                                @else
                                    {{ $NbQuizz }}
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
                                <h5 class="card-title">Nombre de question :</h5>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="fa-solid fa-scroll fa-flip-horizontal"
                                        style="color: #ffffff;"></i>
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
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Dernier joueur :</h5>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="fa-regular fa-user" style="color: #ffffff;"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">
                            <div id="bestAccount">
                                {{-- {{var_dump($LastPlayer)}} --}}
                                @if (empty($LastPlayer->Pseudo))
                                    Loading...
                                @else
                                    {{ $LastPlayer->Pseudo }}
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
                                <h5 class="card-title">Moyenne des Scores :</h5>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="fa-solid fa-chart-line" style="color: #ffffff;"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">
                            <div id="latestFlag">
                                @if (empty($ScoreMy->AverageScore))
                                    Loading...
                                @else
                                    {{ $ScoreMy->AverageScore }}
                                @endif
                            </div>
                        </h1>
                    </div>
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
                                    <th>Pseudo</th>
                                    <th class="d-none d-xl-table-cell">Quiz</th>
                                    <th class="d-none d-xl-table-cell">Date</th>
                                    <th>More</th>
                                </tr>
                            </thead>
                            <tbody id="validated-flags-table">
                                @foreach ($playerHistory as $action)
                                    <tr>
                                        <td>{{ $action->Pseudo }}</td>
                                        <td>{{ $action->QuizName }}</td>
                                        <td>{{ $action->Date }}</td>
                                        <td>
                                            <a href=""style="display: inline-block; margin-right: 10px;" title="afficher/cacher cette information">
                                                <i class="fa-solid fa-eye"style="color: #ffffff; font-size: 18px;"></i>
                                            </a>
                                            <a href="" style="display: inline-block;" title="avoir plus d'information sur cette partie">
                                                <i class="fa-solid fa-info" style="color: #ffffff; font-size: 18px;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Graph</h5>
                </div>
                <div class="card-body d-flex">
                    <div class="align-self-center w-100">
                        <div class="py-3">
                            <div class="chart chart-xs">
                                <canvas id="donutChart" height="40vh" width="80vw"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>