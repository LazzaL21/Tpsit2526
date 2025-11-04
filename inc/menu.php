<link rel="stylesheet" href="css/menu.css">

<div class="menu-container">
    <a href="index.php" class="menu-btn <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active'; ?>">🏠 Home</a>
    <a href="infoserver.php" class="menu-btn <?php if(basename($_SERVER['PHP_SELF']) == 'infoserver.php') echo 'active'; ?>">🖥️ Info server</a>
    <a href="formget_send.php" class="menu-btn <?php if(basename($_SERVER['PHP_SELF']) == 'formget_send.php') echo 'active'; ?>">📩 Form GET</a>
    <a href="form_post.php" class="menu-btn <?php if(basename($_SERVER['PHP_SELF']) == 'form_post.php') echo 'active'; ?>">✉️ Form POST</a>
    <a href="xml_gest.php" class="menu-btn <?php if(basename($_SERVER['PHP_SELF']) == 'xml_gest.php') echo 'active'; ?>">📄 Gestione XML</a>
</div>
