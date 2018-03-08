<?php
/**
 * @package      Crowdfunding
 * @subpackage   Modules
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2017 Todor Iliev <todor@itprism.com>. All rights reserved.
 * @license      GNU General Public License version 3 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

jimport('Prism.init');
jimport('Crowdfunding.init');

$moduleclassSfx = htmlspecialchars($params->get('moduleclass_sfx'));

// Prepare caching.
$cache = null;
if ($app->get('caching', 0)) {
    $cache = JFactory::getCache('com_crowdfunding', '');
    $cache->setLifeTime(Prism\Constants::TIME_SECONDS_24H);
}

$options = array(
    'state'     => Prism\Constants::PUBLISHED,
    'approved'  => Prism\Constants::APPROVED,
    'order'     => $params->get('order_by', Crowdfunding\Constants::ORDER_BY_LOCATION_NAME),
    'order_dir' => $params->get('order_direction', 'ASC'),
    'having'    => 1, // A number of minimum projects in the result.
);

// Started locations and the number of their projects.
$locations = new Crowdfunding\Statistics\Projects\Locations(JFactory::getDbo());
$locations->load($options);

$locationsLevel2 = array();
$numberOfItems   = (int)abs($params->get('number_of_items'));

if ($numberOfItems > 0 and ($numberOfItems < count($locations))) {
    $locationsLevel2 = $locations->toArray();
    $locations       = array_splice($locationsLevel2, 0, $numberOfItems);
}

if (0 < count($locations)) {
    require JModuleHelper::getLayoutPath('mod_crowdfundingfilterstowns', $params->get('layout', 'default'));
}
