
document.querySelectorAll('.delete-tweet').forEach(button => {
    button.addEventListener('click', (e) => {
        if (!confirm('Weet je zeker dat je deze tweet wilt verwijderen?')) {
            e.preventDefault();
        }
    });
