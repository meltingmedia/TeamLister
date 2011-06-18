Ext.onReady(function() {
    MODx.load({ xtype: 'teamlister-page-home'});
});

TeamLister.page.Home = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        components: [{
            xtype: 'teamlister-panel-home'
            ,renderTo: 'teamlister-panel-home-div'
        }]
    }); 
    TeamLister.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(TeamLister.page.Home,MODx.Component);
Ext.reg('teamlister-page-home',TeamLister.page.Home);