<?php
/**
 * TeamLister
 *
 * Copyright 2011 by Romain Tripault // Melting Media <romain@melting-media.com>
 *
 * TeamLister is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * TeamLister is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * TeamLister; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package teamlister
 */
/**
 * Create an member
 * 
 * @package teamlister
 * @subpackage processors
 */
$alreadyExists = $modx->getObject('TeamMember',array(
    'name' => $_POST['name'],
    'firstname' => $_POST['firstname'],
));
if ($alreadyExists) {
    $modx->error->addField('name',$modx->lexicon('teamlister.member_err_ae'));
}

if ($modx->error->hasError()) {
    return $modx->error->failure();
}

$member = $modx->newObject('TeamMember');
$member->fromArray($_POST);
$member->Section = 9;

/*$member['section'] = $modx->getObject('tmSection', array('name' => $scriptProperties['section']));

if (!empty($member['section'])) {
    $c->addOne($member['section']);
} else {
    $member['section'] = $modx->newObject('tmSection');
    $member['section']->set('name', $scriptProperties['section']);
    $member['section']->save();
    $c->addOne($member['section']);
}*/

if ($member->save() == false) {
    return $modx->error->failure($modx->lexicon('teamlister.member_err_save'));
}

return $modx->error->success('',$member);