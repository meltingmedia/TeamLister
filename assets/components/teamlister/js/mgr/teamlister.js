var TeamLister = function(config) {
    config = config || {};
    TeamLister.superclass.constructor.call(this,config);
};
Ext.extend(TeamLister,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {},view: {}
});
Ext.reg('teamlister',TeamLister);

TeamLister = new TeamLister();