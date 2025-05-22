<?php $status = isset($_GET['status']) ? $_GET['status'] : null; ?>

<div class="content">

    <?php include __DIR__ . '/../layouts/title.php'; ?>   

    <div class="bosses-container">
        <?php if (count($this->view->quests) > 0): ?>
            <?php foreach ($this->view->quests as $quests): ?>
                <form method="POST" action="/quests" class="boss-card">
                    <input type="hidden" name="id" value="<?= $quests['id'] ?>">
                    <div class="card">
                        <img src="<?= $quests['image_path'] ?>" 
                             class="card-img-top" 
                             alt="<?= $quests['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $quests['name'] ?></h5>

                            <p><?= $quests['description']?></p>
                            
                            <p class="card-text">
                            <?php for($i=1; $i < 6; $i++){
                                if($quests['drop'.$i] !== null) { ?>
                                    <?= 'Drop:  ' . $quests['drop1']. '<br>' ?>
                                <?php }
                            } ?>                               
                            </p>

                            <i class="mensage"><?="".$quests['phrase'].""?></i>
                          
                            <?php include __DIR__ . '/../layouts/checkbox.php'; ?>
                            
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>