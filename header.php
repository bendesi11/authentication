<header>
    <nav>
        <ul class="list-group">
            <li class="list-group-item"><a href="public.php">Nyilvános</a></li>
            <?php if (!isset($_SESSION["name"]) || empty($_SESSION["name"])): ?>
            <li class="list-group-item"><a href="login.php">Bejelentkezés</a></li>
            <?php else: ?>
            <li class="list-group-item"><a href="protected.php">Szuper titkos céges adatok</a></li>
            <li class="list-group-item"><a href="logout.php">Kijelentkezés</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>