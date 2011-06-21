<?php
/**
 * @package teamlister
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/teammember.class.php');
class TeamMember_mysql extends TeamMember {}
?>