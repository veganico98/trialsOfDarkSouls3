<?php $status = isset($_GET['status']) ? $_GET['status'] : null; ?>

<div class="content">

    <?php if(isset($_GET['status']) && $_GET['status'] == 1){ ?>
        <h2>Bosses Defeated</h2>      
    <?php }else if(isset($_GET['status']) && $_GET['status'] == 0) { ?>
        <h2>Bosses Alive</h2>
    <?php }else{ ?>
        <h2>All Bosses</h2>
    <?php } ?>  

    <div class="bosses-container">
        <?php if (count($this->view->bosses) > 0): ?>
            <?php foreach ($this->view->bosses as $boss): ?>
                <form method="POST" action="/bosses" class="boss-card">
                    <input type="hidden" name="id" value="<?= $boss['id'] ?>">
                    <div class="card">
                        <img src="<?= $boss['image_path'] ?>" 
                             class="card-img-top" 
                             alt="<?= $boss['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $boss['name'] ?></h5>
                            <p class="card-text">Game: <?= $boss['game'] ?></p>
                            <p class="card-text">Trophy: 
                        <?php if ($boss['trophy']): ?>
                            <span class="material-symbols-outlined">emoji_events</span>
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