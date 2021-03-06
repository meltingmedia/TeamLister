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
 * Create a section
 * 
 * @package teamlister
 * @subpackage processors
 */
$alreadyExists = $modx->getObject('tmSection',array(
    'name' => $_POST['name'],
));
if ($alreadyExists) {
    $modx->error->addField('name',$modx->lexicon('teamlister.section_err_ae'));
}

if ($modx->error->hasError()) {
    return $modx->error->failure();
}

$section = $modx->newObject('tmSection');
$section->fromArray($_POST);

if ($section->save() == false) {
    return $modx->error->failure($modx->lexicon('teamlister.section_err_save'));
}

return $modx->error->success('',$section);