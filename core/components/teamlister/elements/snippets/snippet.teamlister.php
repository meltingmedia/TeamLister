<?php
/**
 * teamLister
 *
 * List teams members.
 *
 * @package teamlister
 */
$TeamLister = $modx->getService('teamlister','TeamLister',$modx->getOption('teamlister.core_path',null,$modx->getOption('core_path').'components/teamlister/').'model/teamlister/',$scriptProperties);
if (!($TeamLister instanceof TeamLister)) return '';

$tpl = isset($tpl) ? $tpl : 'memberlist';
$outputSeparator = $modx->getOption('outputSeparator',$scriptProperties,"\n");

$where = !empty($where) ? $modx->fromJSON($where) : array();
$sortBy = $modx->getOption('sortBy',$scriptProperties,'lastname');
$sortDir = $modx->getOption('sortDir',$scriptProperties,'ASC');
$limit = isset($limit) ? (integer) $limit : 0;
$offset = isset($offset) ? (integer) $offset : 0;
$totalVar = !empty($totalVar) ? $totalVar : 'total';


// build query
$c = $modx->newQuery('TeamMember');
if (!empty($where)) {
    $c->where($where);
}
// count total results
$total = $modx->getCount('TeamMember', $c);
$modx->setPlaceholder($totalVar, $total);
// order results
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

$members = $modx->getCollection('TeamMember',$c);
$idx = !empty($idx) ? intval($idx) : 1;

// iterate through results
$list = array();
foreach ($members as $member) {
    $memberInfos = $member->toArray();
    $modx->setPlaceholder('idx',$idx);
    $list[] = $TeamLister->getChunk($tpl,$memberInfos);
    $idx++;
}

// output
$output = implode($outputSeparator,$list);
$toPlaceholder = $modx->getOption('toPlaceholder',$scriptProperties,false);
if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder,$output);
    return '';
}

return $output;