
TeamLister.grid.Sections = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'teamlister-grid-sections'
        ,url: TeamLister.config.connector_url
        ,baseParams: {
            action: 'mgr/section/getlist'
        }
        ,fields: ['id','name','description','menuindex']
        ,autoHeight: true
        ,paging: true
        ,remoteSort: true
        ,tbar: [{
            text: _('teamlister.section_create')
            ,handler: this.createSection
            ,scope: this
        }]
        ,columns: [{
            header: _('id')
            ,dataIndex: 'id'
            ,width: 70
            ,hidden: true
        },{
            header: _('teamlister.section_name')
            ,dataIndex: 'name'
            ,width: 200
        },{
            header: _('teamlister.section_desc')
            ,dataIndex: 'description'
            ,width: 250
        },{
            header: _('teamlister.section_menuindex')
            ,dataIndex: 'menuindex'
            ,width: 250
        }]
    });
    TeamLister.grid.Sections.superclass.constructor.call(this,config);
};
Ext.extend(TeamLister.grid.Sections,MODx.grid.Grid,{
    windows: {}

    ,getMenu: function() {
        var m = [];
        m.push({
            text: _('teamlister.section_update')
            ,handler: this.updateSection
        });
        m.push('-');
        m.push({
            text: _('teamlister.section_remove')
            ,handler: this.removeSection
        });
        this.addContextMenuItem(m);
    }
    
    ,createSection: function(btn,e) {
        if (!this.windows.createSection) {
            this.windows.createSection = MODx.load({
                xtype: 'teamlister-window-section-create'
                ,listeners: {
                    'success': {fn:function() { this.refresh(); },scope:this}
                }
            });
        }
        this.windows.createSection.fp.getForm().reset();
        this.windows.createSection.show(e.target);
    }
    ,updateSection: function(btn,e) {
        if (!this.menu.record || !this.menu.record.id) return false;
        var r = this.menu.record;

        if (!this.windows.updateSection) {
            this.windows.updateSection = MODx.load({
                xtype: 'teamlister-window-section-update'
                ,record: r
                ,listeners: {
                    'success': {fn:function() { this.refresh(); },scope:this}
                }
            });
        }
        this.windows.updateSection.fp.getForm().reset();
        this.windows.updateSection.fp.getForm().setValues(r);
        this.windows.updateSection.show(e.target);
    }
    
    ,removeSection: function(btn,e) {
        if (!this.menu.record) return false;
        
        MODx.msg.confirm({
            title: _('teamlister.section_remove')
            ,text: _('teamlister.section_remove_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/section/remove'
                ,id: this.menu.record.id
            }
            ,listeners: {
                'success': {fn:function(r) { this.refresh(); },scope:this}
            }
        });
    }
});
Ext.reg('teamlister-grid-sections',TeamLister.grid.Sections);




TeamLister.window.CreateSection = function(config) {
    config = config || {};
    this.ident = config.ident || 'tlcsection'+Ext.id();
    Ext.applyIf(config,{
        title: _('teamlister.section_create')
        ,id: this.ident
        ,width: 575
        ,url: TeamLister.config.connector_url
        ,action: 'mgr/section/create'
        ,fields: [{
            xtype: 'textfield'
            ,fieldLabel: _('teamlister.section_name')
            ,name: 'name'
            ,id: 'teamlister-'+this.ident+'-name'
            ,width: 400
            ,allowBlank: false
        },{
            xtype: 'textfield'
            ,fieldLabel: _('teamlister.section_menuindex')
            ,name: 'menuindex'
            ,id: 'teamlister-'+this.ident+'-menuindex'
            ,width: 400
        },{
            xtype: 'teamlister-rte'
            //xtype: 'tinymce'
            ,fieldLabel: _('teamlister.section_desc')
            ,name: 'description'
            ,id: 'teamlister-'+this.ident+'-description'
            ,width: 400
        }]
    });
    TeamLister.window.CreateSection.superclass.constructor.call(this,config);
};
Ext.extend(TeamLister.window.CreateSection,MODx.Window);
Ext.reg('teamlister-window-section-create',TeamLister.window.CreateSection);


TeamLister.window.UpdateSection = function(config) {
    config = config || {};
    this.ident = config.ident || 'tlusection'+Ext.id();
    Ext.applyIf(config,{
        title: _('teamlister.section_update')
        ,id: this.ident
        ,width: 575
        ,url: TeamLister.config.connector_url
        ,action: 'mgr/section/update'
        ,fields: [{
            xtype: 'hidden'
            ,name: 'id'
            ,id: 'teamlister-'+this.ident+'-id'
        },{
            xtype: 'textfield'
            ,fieldLabel: _('teamlister.section_name')
            ,name: 'name'
            ,id: 'teamlister-'+this.ident+'-name'
            ,width: 400
            ,allowBlank: false
        },{
            xtype: 'textfield'
            ,fieldLabel: _('teamlister.section_menuindex')
            ,name: 'menuindex'
            ,id: 'teamlister-'+this.ident+'-menuindex'
            ,width: 400
        },{
            xtype: 'teamlister-rte'
            ,fieldLabel: _('teamlister.section_desc')
            ,name: 'description'
            ,id: 'teamlister-'+this.ident+'-description'
            ,width: 400
        }]
    });
    TeamLister.window.UpdateMember.superclass.constructor.call(this,config);
};
Ext.extend(TeamLister.window.UpdateSection,MODx.Window);
Ext.reg('teamlister-window-section-update',TeamLister.window.UpdateSection);