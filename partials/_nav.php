<div class="header">
    <?php if (is_logged_in()): ?>
        <i onclick="openCloseNav(event)" id="bar" class="fas fa-chevron-circle-right"></i>
    <?php endif; ?>
    <a href="index.php" class="logo active_blue">ENSA Tetouan</a>
    <?php if (is_logged_in()): ?>
        <div class="dropdown" title="Listes">
            <button class="dropbtn" onclick="dropDown1()">
                <i class="fas fa-list-alt"></i>
                <i class="fas fa-caret-down" id="fleche1"></i>
            </button>
            <div class="dropdown-content" id="drop1">
                <a href="professor.list.php">Professeurs</a>
                <a href="meeting.room.list.php">Salles</a>
                <a href="departement.list.php">Departements</a>
                <a href="request.list.php">Reservations</a>
            </div>
        </div>
    <?php endif; ?>

    <div class="header-right">
        <a href="index.php" title="Home" class="<?= set_active("index.php") ?>"><i class="fas fa-home"></i></a>
        <?php if (is_logged_in() && is_admin()): ?>
            <a href="professor.add.php" class="<?= set_active("professor.add.php") ?>" title="Ajouter un professeur"><i class="fas fa-user-plus"></i></a>
        <?php endif; ?>
        <?php if (!is_logged_in()): ?>
            <a href="login.php" class="<?= set_active("login.php") ?>">Connexion</a>
        <?php endif; ?>
        <?php if (is_logged_in()): ?>
            <div class="dropdown">
                <button class="dropbtn" onclick="dropDown2()">
                    <i class="fas fa-user"></i>
                    <i class="fas fa-caret-down" id="fleche2"></i>
                </button>
                <div class="dropdown-content" id="drop2">
                    <a class="<?= set_active("professor.profile.php") ?>"
                       href="professor.profile.php?id=<?= isset($_GET['id']) ? $_GET['id'] : get_session('user_id') ?>">
                        Mon Profil</a>
                    <a class="<?= set_active("professor.update.profile.php") ?>"
                       href="professor.update.profile.php?id=<?= isset($_GET['id']) ? $_GET['id'] : get_session('user_id') ?>">
                        Modifier mon profil</a>
                        <a class="<?= set_active("professor.update.password.php") ?>"
                           href="professor.update.password.php">Changer
                            mot de pass</a>
                        <hr>
                        <a href="logout">Deconnexion</a>
                </div>
            </div>
            <a href="notifications.php" class="<?= ($notifications_count > 0) ? "have_notifs" : "" ?>">
                <i class="fas fa-bell"></i> <?= ($notifications_count > 0) ? ($notifications_count) : "" ?></a>
        <?php endif; ?>
        <a href="about.php" class="<?= set_active("about.php") ?>">About</a>
    </div>
</div>

<div class="container">
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn_drop" onclick="openCloseNav(event)" id="croix"><i
                class="fas fa-times"></i></a>
        <?php if (is_admin()): ?>
            <a href="meeting.room.add.php"><i class="fas fa-plus-circle"></i> Une Salle</a>
            <a href="departement.add.php"><i class="fas fa-plus-circle"></i> Un Departement</a>
        <?php endif; ?>
        <?php if (!is_admin()): ?>
            <a href="professor.request.php?id=<?= get_session('user_id') ?>">Demander une reservation</a>
        <?php endif; ?>
        <button class="dropdown-btn"><i class="fas fa-clipboard-list"></i> Mes reservations
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="professor.request.inprogress.list.php">En cours</a>
            <a href="professor.request.waiting.list.php">En attente</a>
            <a href="professor.request.traited.list.php">Traitées</a>
        </div>

        <button class="dropdown-btn"><i class="fas fa-history"></i> Historique
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="meeting.room.request.history.php?id=<?=get_session('user_id')?>">Une Salle</a>
            <a href="meeting.room.request.history.list.php">Toutes les salles</a>
        </div>
        <a href="index.next.php"><i class="fas fa-calendar-alt"></i> Planning</a>
    </div>
