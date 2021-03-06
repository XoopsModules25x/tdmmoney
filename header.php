<?php
/**
 * TDMMoney
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright   Gregory Mage (Aka Mage)
 * @license     GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @author      Gregory Mage (Aka Mage)
 */

include __DIR__ . '/../../mainfile.php';

include_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
include_once XOOPS_ROOT_PATH . '/class/tree.php';
include_once XOOPS_ROOT_PATH . '/class/xoopslists.php';
include_once XOOPS_ROOT_PATH . '/class/xoopsform/grouppermform.php';
include_once XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/class/utility.php';

if (!isset($moduleDirName)) {
    $moduleDirName = basename(__DIR__);
}

if (false !== ($moduleHelper = Xmf\Module\Helper::getHelper($moduleDirName))) {
} else {
    $moduleHelper = Xmf\Module\Helper::getHelper('system');
}


$myts = MyTextSanitizer::getInstance();

$pathIcon16    = \Xmf\Module\Admin::iconUrl('', 16);
//permission
/* @var $gpermHandler XoopsGroupPermHandler  */
$gpermHandler = xoops_getHandler('groupperm');
if (is_object($xoopsUser)) {
    $groups =& $xoopsUser->getGroups();
} else {
    $groups = XOOPS_GROUP_ANONYMOUS;
}

if (!isset($GLOBALS['xoopsTpl']) || !($GLOBALS['xoopsTpl'] instanceof XoopsTpl)) {
    include_once $GLOBALS['xoops']->path('class/template.php');
    $xoopsTpl = new XoopsTpl();
}
$xoopsTpl->assign('module_url', XOOPS_URL . "/modules/$moduleDirName/");
xoops_loadLanguage('admin', $xoopsModule->getVar('dirname', 'e'));

/* @var $accountHandler XoopsPersistableObjectHandler  */
$accountHandler   = xoops_getModuleHandler('account', $moduleDirName);
/* @var $categoryHandler XoopsPersistableObjectHandler  */
$categoryHandler  = xoops_getModuleHandler('category', $moduleDirName);
/* @var $operationHandler XoopsPersistableObjectHandler  */
$operationHandler = xoops_getModuleHandler('operation', $moduleDirName);
