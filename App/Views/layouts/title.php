<?php
    include_once __DIR__ . '/../../Helpers/helpers.php';
    $currentRoute = getCurrentRouteName()
?>

<?php if (getCurrentRouteName() == 'Bosses'){ ?>
    <?php if(isset($_GET['status']) && $_GET['status'] == 1){ ?>
        <h2>Bosses Defeated</h2>      
    <?php }else if(isset($_GET['status']) && $_GET['status'] == 0) { ?>
        <h2>Bosses Alive</h2>
    <?php }else{ ?>
        <h2>All Bosses</h2>
    <?php }
}else{
     if(isset($_GET['status']) && $_GET['status'] == 0) { ?>
        <h2><?=$currentRoute?> not collected</h2>      
    <?php }else if(isset($_GET['status']) && $_GET['status'] == 1) { ?>
        <h2><?=$currentRoute?> collected</h2>
    <?php }else{ ?>
        <h2>All <?=$currentRoute?></h2>
    <?php } 
} ?>