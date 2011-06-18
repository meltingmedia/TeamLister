TeamLister.panel.Home = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false
        ,baseCls: 'modx-formpanel'
        ,items: [{
            html: '<h2>'+_('teamlister')+'</h2>'
            ,border: false
            ,cls: 'modx-page-header'
        },{
            xtype: 'modx-tabs'
            ,bodyStyle: 'padding: 10px'
            ,defaults: { border: false ,autoHeight: true }
            ,border: true
            ,activeItem: 0
            ,hideMode: 'offsets'
            ,items: [{
                title: _('teamlister.items')
                ,items: [{
                    html: '<p>'+_('teamlister.intro_msg')+'</p><br />'
                    ,border: false
                },{
                    xtype: 'teamlister-grid-items'
                    ,preventRender: true
                }]
            }]
        }]
    });
    TeamLister.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(TeamLister.panel.Home,MODx.Panel);
Ext.reg('teamlister-panel-home',TeamLister.panel.Home);
