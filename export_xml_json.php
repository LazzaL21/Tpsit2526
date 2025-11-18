<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Esportazione Json</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/montani.png">
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
                    $xml = simplexml_load_file($xmlPath);

                    $outputJson = "";   // contiene il JSON SOLO se serve
                    $messaggio = "";    // messaggio di conferma per esportazione server

                    if ($_SERVER["REQUEST_METHOD"] === "POST") {
                        $azione = $_POST["azione"];

                        if ($azione === "visualizza_json") {
                            $outputJson = json_encode($xml, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                        }

                        elseif ($azione === "esporta_locale") {
                            header('Content-Type: application/json');
                            header('Content-Disposition: attachment; filename="piatti.json"');
                            echo json_encode($xml, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                            exit;
                        }

                        elseif ($azione === "esporta_server") {
                            $json = json_encode($xml, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

                            file_put_contents(__DIR__ . "/xml/piatti.json", $json);

                            $messaggio = "<div class='alert alert-success text-center'>
                                            ✔ File salvato sul server in <b>xml/piatti.json</b>
                                        </div>";
                        }
                    }
                ?>



                <section class="bg-white p-4 rounded shadow-sm">
                    <h2 class="mb-4">Esportazione Json</h2>

                    <form method="POST" class="text-center mb-4">
                        <button type="submit" name="azione" value="visualizza_json" class="btn btn-success px-3">Visualizza JSON</button>
                        <button type="submit" name="azione" value="esporta_locale" class="btn btn-info px-3 ">Esporta JSON in locale</button>
                        <button type="submit" name="azione" value="esporta_server" class="btn btn-primary px-3">Esporta JSON nel server</button>
                    </form>

                    <?php
                        if ($outputJson !== "") {
                            echo "<h4 class='text-center mt-4'>📄 Contenuto JSON</h4>";
                            echo "<pre style='background:#f5f5f5; padding:15px; border-radius:10px; white-space:pre-wrap;'> $outputJson </pre>";
                        }
                    ?>
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
