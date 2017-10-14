<hr/>
Kanboard

<?php if ($this->app->config('application_url') != ''): ?>
    - <?= $this->url->absoluteLink('view task', 'TaskViewController', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
    - <?= $this->url->absoluteLink('view project', 'BoardViewController', 'show', array('project_id' => $task['project_id'])) ?>
<?php endif ?>
