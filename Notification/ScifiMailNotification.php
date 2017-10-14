<?php
namespace Kanboard\Plugin\ScifiNotifications\Notification;

use Kanboard\Model\TaskModel;
use Kanboard\Notification\MailNotification;

class ScifiMailNotification extends MailNotification {
    public function getMailSubject($eventName, array $eventData) {
        if ($eventName == TaskModel::EVENT_CREATE) {
            $prefix = '';
        } else {
            $prefix = 'Re: ';
        }

        return $prefix . sprintf(
            '[%s #%d] %s',
            isset($eventData['project_name']) ? $eventData['project_name'] : $eventData['task']['project_name'],
            $eventData['task']['id'],
            $eventData['task']['title']
        );
    }
}
