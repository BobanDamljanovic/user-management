<?php

namespace nitrocinema\modules\UserManagement\controllers;

use Yii;
use nitrocinema\modules\UserManagement\models\UserVisitLog;
use nitrocinema\modules\UserManagement\models\search\UserVisitLogSearch;
use nitrocinema\components\AdminDefaultController;

/**
 * UserVisitLogController implements the CRUD actions for UserVisitLog model.
 */
class UserVisitLogController extends AdminDefaultController
{
    /**
     * @var UserVisitLog
     */
    public $modelClass = 'nitrocinema\modules\UserManagement\models\UserVisitLog';

    /**
     * @var UserVisitLogSearch
     */
    public $modelSearchClass = 'nitrocinema\modules\UserManagement\models\search\UserVisitLogSearch';

    public $enableOnlyActions = ['index', 'view', 'grid-page-size'];
}
