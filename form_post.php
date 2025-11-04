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

            <?php 

                if(isset($_POST['submit'])){
      
            ?>

                <div class="col-sm-9">
                    <section class="bg-white p-4 rounded shadow-sm">
                    <!-- Risultato formattato con Bootstrap -->
                        <h3 class="text-center mb-4">Benvenuto!</h3>
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Ciao, <?php echo $_POST["nome"]; ?> <?php echo $_POST["cognome"]; ?>!</h4>
                            <p>Il tuo nome e cognome sono stati ricevuti con successo. Grazie per aver inviato i tuoi dati!</p>
                        </div>
                    </section>
                </div>

            <?php 
            
                }else{
       
            ?>

                <div class="col-sm-9">
                    <section class="bg-white p-4 rounded shadow-sm">
                        <h3>Compila il modulo</h3>
                        <form action="form_post.php" method="POST">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Inserisci il tuo nome" required>
                            </div>
                            <div class="mb-3">
                                <label for="cognome" class="form-label">Cognome</label>
                                <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Inserisci il tuo cognome" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Invia</button>
                        </form>
                    </section>
                </div>
            <?php 
                }
            ?>
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

