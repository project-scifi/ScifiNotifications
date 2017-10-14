<?php if (! empty($task['description'])): ?>
    <?= $this->text->markdown($task['description'], true) ?>
<?php endif ?>
<hr/>

<ul>
    <?php if (!empty($task['assignee_name']) || !empty($task['assignee_username'])): ?>
        <li>
            Assignee: <b><?= $task['assignee_name'] ?: $task['assignee_username']) ?></b>
        </li>
    <?php endif ?>
    <?php if ($task['date_due']): ?>
        <li>
            Due: <?= $this->dt->datetime($task['date_due']) ?>
        </li>
    <?php endif ?>
    <?php if (!empty($task['category_name'])): ?>
        <li>
            Category: <?= $task['category_name'] ?>
        </li>
    <?php endif ?>
    <li>
        Column: <?= $task['column_title'] ?>
    </li>
</ul>

<?= $this->render('notification/footer', array('task' => $task)) ?>
