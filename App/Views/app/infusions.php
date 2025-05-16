<?php $status = isset($_GET['status']) ? $_GET['status'] : null; ?>

<div class="content">

    <?php if(isset($_GET['status']) && $_GET['status'] == 0){ ?>
        <h2>Infusions not collected</h2>      
    <?php }else if(isset($_GET['status']) && $_GET['status'] == 1) { ?>
        <h2>Infusions collected</h2>
    <?php }else{ ?>
        <h2>All Infusions</h2>
    <?php } ?>

    <div class="bosses-container">
        <?php if (count($this->view->infusions) > 0): ?>
            <?php foreach ($this->view->infusions as $infusions): ?>
                <form method="POST" action="/infusions" class="boss-card">
                    <input type="hidden" name="id" value="<?= $infusions['id'] ?>">
                    <div class="card">
                        <img src="<?= $infusions['image_path'] ?>" 
                             class="card-img-top" 
                             alt="<?= $infusions['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $infusions['name'] ?></h5>
                            <p class="card-text">Game: <?= $infusions['game'] ?></p>
                            <p class="card-text">Trophy: 
                        <?php if ($infusions['trophy']): ?>
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