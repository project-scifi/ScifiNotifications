<?php
namespace Kanboard\Plugin\ScifiNotifications;

use Kanboard\Core\Plugin\Base;
use Kanboard\Notification\MailNotification as MailNotification;

use Kanboard\Plugin\ScifiNotifications\Model\ScifiUserNotificationFilterModel;
use Kanboard\Plugin\ScifiNotifications\Model\ScifiUserNotificationModel;
use Kanboard\Plugin\ScifiNotifications\Notification\ScifiMailNotification;;
use Kanboard\Plugin\ScifiNotifications\Console\ScifiTaskOverdueNotificationCommand;

class Plugin extends Base {
    public function initialize() {
        // Manually inject our code to replace Kanboard's
        $container = $this->container;

        // Override email client
        $this->emailClient->setTransport('smtp', 'Kanboard\Plugin\ScifiNotifications\Mail\ScifiMailClient');

        // Override notification filtering logic
        $container['userNotificationModel'] = function ($c) {
            return new ScifiUserNotificationModel($c);
        };
        $container['userNotificationFilterModel'] = function ($c) {
            return new ScifiUserNotificationFilterModel($c);
        };
        $container['cli']->add(new ScifiTaskOverdueNotificationCommand($container));

        // Override notification emailing logic (replace subject line)
        $this->userNotificationTypeModel->setType(
            MailNotification::TYPE,
            'Email',
            '\Kanboard\Plugin\ScifiNotifications\Notification\ScifiMailNotification'
        );

        // Override email templates
        $templates = array(
            'notification/comment_create',
            'notification/comment_delete',
            'notification/comment_update',
            'notification/footer',
            'notification/subtask_create',
            'notification/subtask_delete',
            'notification/subtask_update',
            'notification/task_assignee_change',
            'notification/task_close',
            'notification/task_create',
            'notification/task_file_create',
            'notification/task_internal_link_create_update',
            'notification/task_internal_link_delete',
            'notification/task_move_column',
            'notification/task_move_position',
            'notification/task_move_swimlange',
            'notification/task_open',
            'notification/task_user_mention',
        );
        foreach ($templates as $template) {
            $this->template->setTemplateOverride($template, 'scifiNotifications:' . $template);
        }
    }

    public function getPluginVersion() {
        return '0.1.0';
    }

    public function getPluginAuthor() {
        return 'Matthew McAllister';
    }

    public function getPluginDescription() {
        return 'Filters out notifications based on event type.';
    }

    public function getCompatibleVersion() {
        return '>=1.0.46';
    }

    public function getPluginHomepage() {
        return 'https://projectscifi.org';
    }
}
