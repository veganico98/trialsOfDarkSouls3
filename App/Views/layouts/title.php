<?php
    include_once __DIR__ . '/../../Helpers/helpers.php';
    $currentRoute = getCurrentRouteName();
?>

<?php if ($currentRoute === 'Bosses'): ?>
    <?php if (isset($_GET['status']) && $_GET['status'] == 1): ?>
        <h2>Bosses Defeated</h2>
    <?php elseif (isset($_GET['status']) && $_GET['status'] == 0): ?>
        <h2>Bosses Alive</h2>
    <?php else: ?>
        <h2>All Bosses</h2>
    <?php endif; ?>

<?php elseif ($currentRoute === 'Covenants' || $currentRoute === 'Quests'): ?>
    <?php if (isset($_GET['status']) && $_GET['status'] == 0): ?>
        <h2><?= ucfirst($currentRoute) ?> Unfinished</h2>
    <?php elseif (isset($_GET['status']) && $_GET['status'] == 1): ?>
        <h2><?= ucfirst($currentRoute) ?> Finalised</h2>
    <?php else: ?>
        <h2>All <?= ucfirst($currentRoute) ?></h2>
    <?php endif; ?>

<?php else: ?>
    <?php if (isset($_GET['status']) && $_GET['status'] == 0): ?>
        <h2><?= ucfirst($currentRoute) ?> not collected</h2>
    <?php elseif (isset($_GET['status']) && $_GET['status'] == 1): ?>
        <h2><?= ucfirst($currentRoute) ?> collected</h2>
    <?php else: ?>
        <h2>All <?= ucfirst($currentRoute) ?></h2>
    <?php endif; ?>
<?php endif; ?>
