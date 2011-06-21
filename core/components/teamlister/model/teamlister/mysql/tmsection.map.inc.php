<?php
/**
 * @package teamlister
 */
$xpdo_meta_map['tmSection']= array (
  'package' => 'teamlister',
  'table' => 'teamlister_sections',
  'fields' => 
  array (
    'name' => '',
    'description' => '',
    'menuindex' => 0,
  ),
  'fieldMeta' => 
  array (
    'name' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
      'index' => 'index',
    ),
    'description' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'text',
      'null' => false,
      'default' => '',
    ),
    'menuindex' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'attributes' => 'unsigned',
      'null' => false,
      'default' => 0,
    ),
  ),
  'aggregates' => 
  array (
    'Member' => 
    array (
      'class' => 'TeamMember',
      'local' => 'id',
      'foreign' => 'section',
      'cardinality' => 'many',
      'owner' => 'local',
    ),
  ),
);
