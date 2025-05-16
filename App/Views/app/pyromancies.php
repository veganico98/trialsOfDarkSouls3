<?php $status = isset($_GET['status']) ? $_GET['status'] : null; ?>


<div class="content">

    <?php if(isset($_GET['status']) && $_GET['status'] == 0){ ?>
        <h2>Pyromancies not collected</h2>      
    <?php }else if(isset($_GET['status']) && $_GET['status'] == 1) { ?>
        <h2>Pyromancies collected</h2>
    <?php }else{ ?>
        <h2>All Pyromancies</h2>
    <?php } ?>  

    <div class="bosses-container">
        <?php if (count($this->view->pyromancies) > 0): ?>
            <?php foreach ($this->view->pyromancies as $pyromancies): ?>
                <form method="POST" action="/pyromancies" class="boss-card">
                    <input type="hidden" name="id" value="<?= $pyromancies['id'] ?>">
                    <div class="card">
                        <img src="<?= $pyromancies['image_path'] ?>" 
                             class="card-img-top" 
                             alt="<?= $pyromancies['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $pyromancies['name'] ?></h5>
                            <p class="card-text">Game: <?= $pyromancies['game'] ?></p>
                            <p class="card-text">Trophy: 
                        <?php if ($pyromancies['trophy']): ?>
                            <span class="material-symbols-outlined trophy">emoji_events</span>
                        <?php endif ?>
                        </p>
                            <?php include __DIR__ . '/../layouts/checkbox.php'; ?>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>