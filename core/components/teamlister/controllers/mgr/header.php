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
 * Loads the header for mgr pages.
 *
 * @package teamlister
 * @subpackage controllers
 */
$modx->regClientCSS($TeamLister->config['cssUrl'].'mgr.css');
$modx->regClientStartupScript($TeamLister->config['jsUrl'].'mgr/teamlister.js');

$modx->regClientStartupScript($modx->config['assets_url'].'components/tinymce/jscripts/tiny_mce/tiny_mce.js');
$modx->regClientStartupScript($modx->config['assets_url'].'components/tinymce/xconfig.js');
$modx->regClientStartupScript($modx->config['assets_url'].'components/tinymce/tiny.min.js');
$modx->regClientStartupScript($TeamLister->config['jsUrl'].'mgr/Ext.ux.TinyMCE.min.js');

$modx->regClientStartupHTMLBlock('<script type="text/javascript">
Ext.onReady(function() {
    TeamLister.config = '.$modx->toJSON($TeamLister->config).';
    TeamLister.config.connector_url = "'.$TeamLister->config['connectorUrl'].'";
    TeamLister.action = "'.(!empty($_REQUEST['a']) ? $_REQUEST['a'] : 0).'";
});
</script>');

return '';