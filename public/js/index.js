// Fonction pour récupérer les suggestions d'adresses
function fetchSuggestions(inputElement, suggestionsContainer) {
    let debounceTimeout; // Variable pour stocker le timeout

    inputElement.addEventListener("input", function() {
        const currentValue = this.value;

        if (currentValue.length < 3) {
            suggestionsContainer.innerHTML = ""; // Vider les suggestions si moins de 3 caractères
            return;
        }

        // Nettoyer le timeout précédent
        clearTimeout(debounceTimeout);

        // Définir un nouveau timeout
        debounceTimeout = setTimeout(() => {
            fetch(`/autocomplete?query=${encodeURIComponent(currentValue)}`)
                .then(response => response.json())
                .then(data => {
                    displaySuggestions(data.results, suggestionsContainer, inputElement);
                })
                .catch(error => console.error('Error fetching the address:', error));
        }, 300); // Délai de 300 ms avant d'envoyer la requête
    });
}

// Fonction pour afficher les suggestions dans le conteneur
function displaySuggestions(suggestions, container, inputElement) {
    container.innerHTML = ""; // Vider le conteneur avant d'afficher de nouvelles suggestions

    if (!suggestions || suggestions.length === 0) {
        return; // Ne rien faire si aucune suggestion n'est disponible
    }

    suggestions.forEach(suggestion => {
        const suggestionItem = document.createElement("div");
        suggestionItem.textContent = suggestion.formatted; // Affiche l'adresse formatée
        suggestionItem.classList.add("suggestion-item");

        suggestionItem.addEventListener("click", () => {
            inputElement.value = suggestion.formatted; // Remplir le champ avec l'adresse sélectionnée
            container.innerHTML = ""; // Vider les suggestions après sélection
        });

        container.appendChild(suggestionItem);
    });
}
    
    // Initialiser l'autocomplétion pour chaque champ
    const pointDepartInput = document.getElementById("pointdepart");
    const pointArriveInput = document.getElementById("pointarrive");
    const suggestionsDepartContainer = document.getElementById("suggestions-depart");
    const suggestionsArriveContainer = document.getElementById("suggestions-arrive");
    
    fetchSuggestions(pointDepartInput, suggestionsDepartContainer);
    fetchSuggestions(pointArriveInput, suggestionsArriveContainer);
    



//////////INJECTION ID VEHICULE 
    

function selectVehicle(element) {
    // Récupérer l'ID du véhicule à partir de l'attribut data-id
    const vehicleId = element.parentElement.getAttribute('data-id');
    
    // Remplir le champ caché avec l'ID du véhicule
    document.getElementById('vehicule_id').value = vehicleId;

    // Ajouter une classe pour indiquer que le véhicule est sélectionné
    const vehicleItems = document.querySelectorAll('.vehicle-item');
    vehicleItems.forEach(item => {
        item.classList.remove('selected'); // Retirer la classe 'selected' de tous les véhicules
    });
    element.parentElement.classList.add('selected'); // Ajouter la classe 'selected' au véhicule cliqué
}



