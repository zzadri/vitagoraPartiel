<script defer>
    // Obtenez la date actuelle
    const currentDate = new Date();

    // Générez les labels pour les 5 derniers jours (en incluant aujourd'hui)
    const labels = [];
    for (let i = 4; i >= 0; i--) {
        const day = new Date(currentDate);
        day.setDate(currentDate.getDate() - i);
        if (i === 0) {
            labels.push("Aujourd'hui");
        } else {
            labels.push(new Intl.DateTimeFormat('fr-FR', {
                weekday: 'long'
            }).format(day));
        }
    }

    // Utilisez la constante Blade générée en PHP
    const notesQuiz = @json($notesQuiz);
    // Convertissez les valeurs en tableau pour les utiliser dans le graphique
    const notesQuizArray = Object.values(notesQuiz).reverse();

    // Utilisez la constante Blade générée en PHP
    const notesQuestion = @json($notesQuestion);
    // Convertissez les valeurs en tableau pour les utiliser dans le graphique
    const notesQuestionArray = Object.values(notesQuestion).reverse();

    // Vous devez remplacer cette partie avec la logique de récupération de vos données réelles
    const updatedData = {
        labels: labels,
        datasets: [{
            label: "Notes Quiz",
            data: notesQuizArray,
            borderColor: "rgba(75, 192, 192, 1)",
            fill: false,
            tension: 0.3,
            pointRadius: 5,
            pointHoverRadius: 8,
        },
        {
            label: "Notes Question",
            data: notesQuestionArray,
            borderColor: "rgba(255, 99, 132, 1)", // Couleur différente pour la deuxième ligne
            fill: false,
            tension: 0.3,
            pointRadius: 5,
            pointHoverRadius: 8,
        }],
    };

    // Initialiser le graphique
    const ctx = document.getElementById("myChart").getContext("2d");
    const myChart = new Chart(ctx, {
        type: "line",
        data: updatedData,
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: "Jours",
                    },
                },
                y: {
                    title: {
                        display: true,
                        text: "Notes",
                    },
                    min: 0,
                    max: 5,
                },
            },
        },
    });
</script>
