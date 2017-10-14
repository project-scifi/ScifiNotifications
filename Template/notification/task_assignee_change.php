<?php if (!empty($task['assignee_name']) || $task['assignee_username']): ?>
    Assigned to <?= $task['assignee_name'] ?: $task['assignee_username']) ?>
<?php else: ?>
    Assigned to no one.
<?php endif ?>

<?= $this->render('notification/footer', array('task' => $task)) ?>
