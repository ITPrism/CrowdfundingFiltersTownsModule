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

if (!empty($locationsLevel2)) {
    $doc = JFactory::getDocument();
    $doc->addScript('modules/mod_crowdfundingfilterstowns/js/script.js');
}
?>
<div class="cf-modfilterstowns<?php echo $moduleclassSfx; ?>">
<?php foreach($locations as $location) { ?>
    <div>
        <a href="<?php echo JRoute::_(CrowdfundingHelperRoute::getDiscoverRoute(array('filter_location' => (int)$location['location_id']))); ?>"><?php echo htmlentities($location['location_name'], ENT_QUOTES, 'UTF-8'); ?></a>
        <span class="badge"><?php echo (int)$location['project_number']; ?></span>
    </div>
<?php } ?>

    <?php if (!empty($locationsLevel2)) { ?>
        <div id="js-cf-modfilterstowns-locations" style="display: none;">
            <?php foreach ($locationsLevel2 as $location) { ?>

                <div>
                    <a href="<?php echo JRoute::_(CrowdfundingHelperRoute::getDiscoverRoute(array('filter_location' => (int)$location['location_id']))); ?>"><?php echo htmlentities($location['location_name'], ENT_QUOTES, 'UTF-8'); ?></a>
                    <span class="badge"><?php echo (int)$location['project_number']; ?></span>
                </div>
            <?php } ?>
        </div>

        <a href="javascript: void(0);" class="font-xxsmall" id="js-cf-modfilterstowns-toggle-btn"><?php echo JText::_('MOD_CROWDFUNDINGFILTERSTOWNS_SHOW_ALL'); ?></a>
    <?php }?>

</div>
