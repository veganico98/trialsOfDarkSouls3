<?php $status = isset($_GET['status']) ? $_GET['status'] : null; ?>

<div class="content">

    <?php if(isset($_GET['status']) && $_GET['status'] == 0){ ?>
        <h2>Miracles not collected</h2>      
    <?php }else if(isset($_GET['status']) && $_GET['status'] == 1) { ?>
        <h2>Miracles collected</h2>
    <?php }else{ ?>
        <h2>All Miracles</h2>
    <?php } ?>  

    <div class="bosses-container">
        <?php if (count($this->view->miracles) > 0): ?>
            <?php foreach ($this->view->miracles as $miracles): ?>
                <form method="POST" action="/miracles" class="boss-card">
                    <input type="hidden" name="id" value="<?= $miracles['id'] ?>">
                    <div class="card">
                        <img src="<?= $miracles['image_path'] ?>" 
                             class="card-img-top" 
                             alt="<?= $miracles['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $miracles['name'] ?></h5>
                            <p class="card-text">Game: <?= $miracles['game'] ?></p>
                            <p class="card-text">Trophy: 
                        <?php if ($miracles['trophy']): ?>
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