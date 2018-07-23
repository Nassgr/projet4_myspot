document.getElementById('recherche').addEventListener('keyup', function(e) {
        var recherche = this.value.toLowerCase();
        var documents = document.querySelectorAll('.document');

        Array.prototype.forEach.call(documents, function(document) {
            // On a bien trouvé les termes de recherche.
            if (document.innerHTML.toLowerCase().indexOf(recherche) > -1) {
                document.style.display = 'block';
            } else {
                document.style.display = 'none';
            }
        });
    });