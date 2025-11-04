<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Gestione Menù</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container main-content">
        <div class="row col-sm-12">
            <header class="jumbotron text-center bg-light shadow-sm mb-4">
                <h1 class="display-3 font-weight-normal">
                    <?php require 'inc/header.php'; ?>
                </h1>
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
                <?php
                    $xmlPath = "xml/menu.xml";
                    $xsdPath = "xml/schema.xsd";
                    $xml = simplexml_load_file($xmlPath);

                    if ($_SERVER["REQUEST_METHOD"] === "POST") {
                        $nome = $_POST["nome"];
                        $tipologia = $_POST["tipologia"];
                        $descrizione = $_POST["descrizione"];
                        $prezzo = $_POST["prezzo"];
                        $vegetariano = $_POST["vegetariano"];
                        $vegano = $_POST["vegano"];
                        $valida = isset($_POST["valida"]);

                        $tempXml = clone $xml;
                        $nuovo = $tempXml->addChild("piatto");
                        $nuovo->addChild("nome",  $nome);
                        $nuovo->addChild("tipologia", $tipologia);
                        $nuovo->addChild("descrizione", $descrizione);
                        $nuovo->addChild("prezzo", $prezzo);
                        $nuovo->addChild("vegetariano", $vegetariano);
                        $nuovo->addChild("vegano", $vegano);

                        $dom = new DOMDocument("1.0", "UTF-8");
                        $dom->preserveWhiteSpace = false;  // rimuove spazi bianchi superflui
                        $dom->formatOutput = true;         // aggiunge indentazione e nuova riga
                        $dom->loadXML($tempXml->asXML());

                        $valido = true;
                        if ($valida) {
                            if ($dom->schemaValidate($xsdPath)) {
                                echo "<div class='alert alert-success text-center'>✅ File XML valido secondo lo schema XSD!</div>";
                            } else {
                                echo "<div class='alert alert-danger text-center'>❌ Il file XML NON rispetta lo schema XSD!</div>";
                                $valido = false;
                            }
                        } 
                        if($valido){
                            $dom->save($xmlPath);
                            $xml = simplexml_load_file($xmlPath);
                        }
                    }
                ?>


                <section class="bg-white p-4 rounded shadow-sm">
                    <h2 class="mb-4">Gestione del menù</h2>

                    <form method="POST" class="mb-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="nome" class="form-control" placeholder="Nome" >
                            </div>
                            <div class="col-md-6">
                                <select name="tipologia" class="form-select" >
                                    <option value="" disabled selected>Seleziona tipologia</option>
                                    <option value="antipasto">Antipasto</option>
                                    <option value="primo">Primo</option>
                                    <option value="secondo">Secondo</option>
                                    <option value="contorno">Contorno</option>
                                    <option value="dessert">Dessert</option>
                                    <option value="bevanda">Bevanda</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <input type="text" name="descrizione" class="form-control" placeholder="Descrizione" >
                            </div>
                            <div class="col-md-3">
                                <input type="number" step="0.01" name="prezzo" class="form-control" placeholder="Prezzo (€)" >
                            </div>
                            <div class="col-md-3">
                                <select name="vegetariano" class="form-select" >
                                    <option value="" disabled selected>Vegetariano?</option>
                                    <option value="si">Sì</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="vegano" class="form-select" >
                                    <option value="" disabled selected>Vegano?</option>
                                    <option value="si">Sì</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-md-3 d-flex align-items-center">
                                <div class="form-check ms-2">
                                    <input class="form-check-input" type="checkbox" name="valida" id="valida">
                                    <label class="form-check-label" for="valida">Valida con XSD</label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary px-4">Aggiungi</button>
                        </div>
                    </form>

                    <table class="table table-bordered table-striped mt-4 text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Nome</th>
                                <th>Tipologia</th>
                                <th>Descrizione</th>
                                <th>Prezzo (€)</th>
                                <th>Vegetariano</th>
                                <th>Vegano</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($xml->piatto as $p): ?>
                                <tr>
                                    <td><?= htmlspecialchars($p->nome) ?></td>
                                    <td><?= htmlspecialchars($p->tipologia) ?></td>
                                    <td><?= htmlspecialchars($p->descrizione) ?></td>
                                    <td><?= htmlspecialchars($p->prezzo) ?></td>
                                    <td><?= htmlspecialchars($p->vegetariano) ?></td>
                                    <td><?= htmlspecialchars($p->vegano) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
