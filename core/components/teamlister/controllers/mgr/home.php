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
 * Loads the home page.
 *
 * @package teamlister
 * @subpackage controllers
 */
$modx->regClientStartupScript($TeamLister->config['jsUrl'].'mgr/widgets/sections.grid.js');
$modx->regClientStartupScript($TeamLister->config['jsUrl'].'mgr/widgets/teams.grid.js');
$modx->regClientStartupScript($TeamLister->config['jsUrl'].'mgr/widgets/home.panel.js');
$modx->regClientStartupScript($TeamLister->config['jsUrl'].'mgr/sections/home.js');
$output = '<div id="teamlister-panel-home-div"></div>';

return $output;
