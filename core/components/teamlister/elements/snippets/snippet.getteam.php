<?php
/**
 * getTeam
 *
 * Get sections (teams) details.
 *
 * @package teamlister
 */
$TeamLister = $modx->getService('teamlister','TeamLister',$modx->getOption('teamlister.core_path',null,$modx->getOption('core_path').'components/teamlister/').'model/teamlister/',$scriptProperties);
if (!($TeamLister instanceof TeamLister)) return '';

$tpl = $modx->getOption('tpl',$scriptProperties,'sectionlist');
$outputSeparator = $modx->getOption('outputSeparator',$scriptProperties,"\n");

$where = !empty($where) ? $modx->fromJSON($where) : array();
$sortBy = $modx->getOption('sortBy',$scriptProperties,'name');
$sortDir = $modx->getOption('sortDir',$scriptProperties,'ASC');
$limit = isset($limit) ? (integer) $limit : 0;
$offset = isset($offset) ? (integer) $offset : 0;
$totalVar = !empty($totalVar) ? $totalVar : 'total';


// build query
$c = $modx->newQuery('tmSection');
if (!empty($where)) {
    $c->where($where);
}

$total = $modx->getCount('tmSection', $c);
$modx->setPlaceholder($totalVar, $total);

if (!empty($sortBy)) {
    if (strpos($sortBy, '{') === 0) {
        $sorts = $modx->fromJSON($sortBy);
    } else {
        $sorts = array($sortBy => $sortDir);
    }
    if (is_array($sorts)) {
        while (list($sort, $dir) = each($sorts)) {
            $c->sortby($sort, $dir);
        }
    }
}
if (!empty($limit)) $c->limit($limit, $offset);
if (!empty($debug)) {
    $c->prepare();
    $modx->log(modX::LOG_LEVEL_ERROR, $c->toSQL());
}

$sections = $modx->getCollection('tmSection',$c);
$idx = !empty($idx) ? intval($idx) : 1;

// iterate through items
$list = array();

foreach ($sections as $section) {
    $sectionInfos = $section->toArray();
    $modx->setPlaceholder('idx',$idx);
    /*$members = $modx->getCount('TeamMember');
    $modx->setPlaceholder('child',$members);*/
    $list[] = $TeamLister->getChunk($tpl,$sectionInfos);
    $idx++;
}

// output
$output = implode($outputSeparator,$list);
$toPlaceholder = $modx->getOption('toPlaceholder',$scriptProperties,false);
if (!empty($toPlaceholder)) {
    // if using a placeholder, output nothing and set output to specified placeholder
    $modx->setPlaceholder($toPlaceholder,$output);
    return '';
}
// by default just return output
return $output;