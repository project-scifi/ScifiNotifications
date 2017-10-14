<p>
    Removed relation
    "<?= ucfirst($task_link['label']) ?>
    <?=
        $this->url->absoluteLink(
            sprintf('#%d', $task_link['opposite_task_id']),
            'TaskViewController',
            'show',
            array('task_id' => $task_link['opposite_task_id'])
        )
    ?>".
</p>

<?= $this->render('notification/footer', array('task' => $task)) ?>
