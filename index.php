<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Il Mio Sito Web</title>
    <link rel="stylesheet" href="css/bootstrap.css">
  
</head>

<body>
    <div class="container main-content">
        <div class="row col-sm-12">
            <header class="jumbotron text-center bg-light shadow-sm mb-4">
            <h1 class="display-3 font-weight-normal">    
            <?php require 'inc/header.php'; ?>
            </header>
        </div>
        <div class="row">

            <div class="col-sm-3 center-content">
                <menu class="bg-light p-4 rounded shadow-sm">
                    <h3>Menù</h3>
                    <?php require 'inc/menu.php'; ?>
                </menu>
            </div>

            <div class="col-sm-9">
                <section class="bg-white p-5 rounded shadow-sm">
                    <div class="text-center mb-5">
                    <h1 class="display-5 fw-bold text-primary">Progetti PHP 5DsB</h1>
                    <p class="lead text-muted">
                        Questo sito raccoglie tutti gli esercizi e i progetti PHP realizzati durante l’anno scolastico.
                    </p>
                    </div>

                    <div class="text-center mb-5">
                    <img src="img/images.png" alt="Immagine " class="img-fluid mb-4" style="max-width: 300px;">
                    <h2 class="h4 text-secondary mb-3">Cosa troverai qui</h2>
                    </div>

                    <div class="row text-center g-4">
                    <div class="col-md-4">
                        <div class="p-4 bg-light rounded shadow-sm h-100">
                        <h3 class="text-primary">💡 Creatività</h3>
                        <p class="text-muted small">Ogni progetto è pensato per stimolare la fantasia e il problem solving degli studenti.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-light rounded shadow-sm h-100">
                        <h3 class="text-primary">🧠 Logica</h3>
                        <p class="text-muted small">Analizziamo, progettiamo e scriviamo codice ordinato, riutilizzabile e ben strutturato.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-light rounded shadow-sm h-100">
                        <h3 class="text-primary">⚙️ Pratica</h3>
                        <p class="text-muted small">Ogni esercizio mette in pratica le competenze di programmazione acquisite durante l’anno.</p>
                        </div>
                    </div>
                    </div>

                </section>
            </div>

        </div>
        <div class="row text-center fixed-bottom">
            <footer class="bg-dark text-white p-4 mt-5 shadow-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <?php require 'inc/footer.php'; ?>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>

