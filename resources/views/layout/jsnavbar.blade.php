<script defer>
    // Fonction pour gérer le survol de l'élément ou de ses enfants
    function handleHover() {
        var dashboardsElement = document.getElementById("dashboards");
        var iconElement = document.querySelector("a[data-bs-target='#dashboards'] i");

        // Ajoute la classe "show" pour afficher l'élément
        dashboardsElement.classList.add("show");
        // Applique la rotation à l'icône
        iconElement.style.transform = "rotate(-90deg)";

        // Affiche l'élément avec une hauteur suffisante pour son contenu
        dashboardsElement.style.height = "auto";

        // Force une réinitialisation du layout avant d'ajouter la classe "show"
        // Cela permet à la transition de fonctionner correctement
        void dashboardsElement.offsetWidth;
    }

    // Fonction pour gérer la fin du survol de l'élément ou de ses enfants
    function handleHoverOut() {
        var dashboardsElement = document.getElementById("dashboards");
        var iconElement = document.querySelector("a[data-bs-target='#dashboards'] i");

        // Retire la classe "show" pour masquer l'élément
        dashboardsElement.classList.remove("show");
        // Réinitialise la rotation de l'icône
        iconElement.style.transform = "rotate(90deg)";

        // Attend que la transition se termine, puis masque l'élément
        setTimeout(function() {
            dashboardsElement.style.height = "0";
        }, 300); // 300ms correspond à la durée de la transition
    }

    // Obtient l'élément <a> avec l'attribut data-bs-target="#dashboards"
    var linkElement = document.querySelector("a[data-bs-target='#dashboards']");

    // Obtient l'élément <ul> avec l'ID "dashboards"
    var dashboardsElement = document.getElementById("dashboards");

    // Obtient l'élément <li> parent de <ul>
    var parentLiElement = dashboardsElement.closest("li");

    // Associe les fonctions handleHover et handleHoverOut aux événements de survol
    linkElement.addEventListener("mouseover", handleHover);
    parentLiElement.addEventListener("mouseleave", handleHoverOut);

</script>
