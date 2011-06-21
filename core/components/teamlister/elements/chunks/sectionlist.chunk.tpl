<div><!--[[+idx]]/[[+total]]-->
    <h2>[[+name]]</h2>
    [[+description]]

    <h3>Liste des membres</h3>
    <ul>
[[!inc?
    &file=`[[++teamlister.core_path]]elements/snippets/snippet.teamlister.php`
    &type=`php`

    &where=`{"section":[[+id]]}`
    &sortBy=`{"menuindex":"ASC","name":"ASC"}`
    &limit=`0`
]]
    </ul>
</div>