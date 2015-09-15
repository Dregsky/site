
<div class="index-cols">
    <?php if(!empty($col1)): ?>
    <div<?php echo ' id="' . $id1 . '"' . 'class="' . $class1 . '"'; ?>>
        <?php echo html_entity_decode($col1); ?>
    </div>
    <?php endif; ?>
    <?php if(!empty($col2)): ?>
    <div <?php echo ' id="' . $id2 . '"' . 'class="' . $class2 . '"'; ?>>
        <?php echo html_entity_decode($col2); ?>
    </div>
    <?php endif; ?>
    <?php if(!empty($col3)): ?>
    <div <?php echo ' id="' . $id3 . '"' . 'class="' . $class3 . '"'; ?>>
        <?php echo html_entity_decode($col3); ?>
    </div>
    <?php endif; ?>
</div>