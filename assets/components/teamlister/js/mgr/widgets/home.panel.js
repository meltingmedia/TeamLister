TeamLister.panel.Home = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false
        ,baseCls: 'modx-formpanel'
        ,items: [
            {
                html: '<h2>'+_('teamlister')+'</h2>'
                ,border: false
                ,cls: 'modx-page-header'
            }
            ,MODx.getPageStructure([
                // members tab
                {
                    title: _('teamlister.members')
                    ,bodyStyle: 'padding: 15px;'
                    ,autoHeight: true
                    ,items: [{
                        html: '<p>'+_('teamlister.intro_msg')+'</p><br />'
                        ,border: false
                    },{
                        xtype: 'teamlister-grid-members'
                        ,id: 'teamlister-grid-members'
                        ,preventRender: true
                    }]
                }
                // section tab
                ,{
                    title: _('teamlister.sections')
                    ,bodyStyle: 'padding: 15px;'
                    ,autoHeight: true
                    ,items: [{
                        html: '<p>'+_('teamlister.sections_intro_msg')+'</p><br />'
                        ,border: false
                    },{
                        xtype: 'teamlister-grid-sections'
                        ,id: 'teamlister-grid-sections'
                        ,title: ''
                        ,preventRender: true
                    }]
                }])
                // end of page struture
        ]
    });
    TeamLister.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(TeamLister.panel.Home,MODx.Panel);
Ext.reg('teamlister-panel-home',TeamLister.panel.Home);
