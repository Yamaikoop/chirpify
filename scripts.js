// Voorbeeld: Voeg een confirmatie toe voor het verwijderen van een tweet
document.querySelectorAll('.delete-tweet').forEach(button => {
    button.addEventListener('click', (e) => {
        if (!confirm('Weet je zeker dat je deze tweet wilt verwijderen?')) {
            e.preventDefault();
        }
    });
