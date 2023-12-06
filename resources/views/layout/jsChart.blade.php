<script derfer>
    // public/js/donutChart.js
    var ctx = document.getElementById('donutChart').getContext('2d');

    var labels = @json($AverageScoresByQuiz->pluck('QuizName')->all());
    var scores = @json($AverageScoresByQuiz->pluck('AverageScore')->all());


    // Vérifiez que les labels et scores ne sont ni nuls ni vides
    if (labels && scores) {
        var donutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: scores,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 153, 0, 0.7)',
                        'rgba(102, 51, 153, 0.7)',
                    ],

                    borderColor: '#FFF',
                    borderWidth: '1'
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            }
        });
    }

    

    // const notyf = new Notyf({
    //     duration: 1000,
    //     position: {
    //         x: 'right',
    //         y: 'top',
    //     },
    //     types: [{
    //             type: 'warning',
    //             background: 'orange',
    //             icon: {
    //                 className: 'material-icons',
    //                 tagName: 'i',
    //                 text: 'warning'
    //             }
    //         },
    //         {
    //             type: 'error',
    //             background: 'indianred',
    //             duration: 9999999,
    //             dismissible: true
    //         }
    //     ]
    // });

    // notyf.error('Please fill out the form');
</script>
