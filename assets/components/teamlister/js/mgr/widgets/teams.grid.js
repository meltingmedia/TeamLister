
TeamLister.grid.Members = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'teamlister-grid-members'
        ,url: TeamLister.config.connector_url
        ,baseParams: {
            action: 'mgr/member/getlist'
        }
        ,fields: ['id','name','firstname','section','role','menuindex'/**/,'bio','email','phone','photo','website']
        ,autoHeight: true
        ,paging: true
        ,remoteSort: true
        ,enableDragDrop: true
        ,ddGroup: 'myRow'
        ,ddText: _('teamlister.row_order')
        ,tbar: [{
            text: _('teamlister.member_create')
            ,handler: this.createMember
            ,scope: this
        }]
        ,columns: [{
            header: _('id')
            ,dataIndex: 'id'
            ,width: 70
            ,hidden: true
        },{
            header: _('teamlister.member_firstname')
            ,dataIndex: 'firstname'
            ,width: 200
        },{
            header: _('teamlister.member_name')
            ,dataIndex: 'name'
            ,width: 200
        },{
            header: _('teamlister.member_section')
            ,dataIndex: 'section'
            ,width: 250
            //,action: 'mgr/section/resolve'
        },{
            header: _('teamlister.member_role')
            ,dataIndex: 'role'
            ,width: 250
        },{
            header: _('teamlister.member_order')
            ,dataIndex: 'menuindex'
            ,width: 250
        }]
    });
    TeamLister.grid.Members.superclass.constructor.call(this,config);
};
Ext.extend(TeamLister.grid.Members,MODx.grid.Grid,{
    windows: {}

    ,getMenu: function() {
        var m = [];
        m.push({
            text: _('teamlister.member_update')
            ,handler: this.updateMember
        });
        m.push('-');
        m.push({
            text: _('teamlister.member_remove')
            ,handler: this.removeMember
        });
        this.addContextMenuItem(m);
    }
    
    ,createMember: function(btn,e) {
        if (!this.windows.createMember) {
            this.windows.createMember = MODx.load({
                xtype: 'teamlister-window-member-create'
                ,listeners: {
                    'success': {fn:function() { this.refresh(); },scope:this}
                }
            });
        }
        this.windows.createMember.fp.getForm().reset();
        this.windows.createMember.show(e.target);
    }
    ,updateMember: function(btn,e) {
        if (!this.menu.record || !this.menu.record.id) return false;
        var r = this.menu.record;

        if (!this.windows.updateMember) {
            this.windows.updateMember = MODx.load({
                xtype: 'teamlister-window-member-update'
                ,record: r
                ,listeners: {
                    'success': {fn:function() { this.refresh(); },scope:this}
                }
            });
        }
        this.windows.updateMember.fp.getForm().reset();
        this.windows.updateMember.fp.getForm().setValues(r);
        this.windows.updateMember.show(e.target);
    }
    
    ,removeMember: function(btn,e) {
        if (!this.menu.record) return false;
        
        MODx.msg.confirm({
            title: _('teamlister.member_remove')
            ,text: _('teamlister.member_remove_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/member/remove'
                ,id: this.menu.record.id
            }
            ,listeners: {
                'success': {fn:function(r) { this.refresh(); },scope:this}
            }
        });
    }
});
Ext.reg('teamlister-grid-members',TeamLister.grid.Members);




TeamLister.window.CreateMember = function(config) {
    config = config || {};
    this.ident = config.ident || 'tlcmember'+Ext.id();
    Ext.applyIf(config,{
        title: _('teamlister.member_create')
        ,id: this.ident
        ,width: 575
        ,url: TeamLister.config.connector_url
        ,action: 'mgr/member/create'
        ,fields: [{
            xtype: 'textfield'
            ,fieldLabel: _('teamlister.member_name')
            ,name: 'name'
            ,id: 'teamlister-'+this.ident+'-name'
            ,width: 400
        },{
            xtype: 'textfield'
            ,fieldLabel: _('teamlister.member_firstname')
            ,name: 'firstname'
            ,id: 'teamlister-'+this.ident+'-firstname'
            ,width: 400
        },{
            xtype: 'textfield'
            ,fieldLabel: _('teamlister.member_email')
            ,name: 'email'
            ,id: 'teamlister-'+this.ident+'-email'
            ,width: 400
        },{
            xtype: 'textfield'
            ,fieldLabel: _('teamlister.member_phone')
            ,name: 'phone'
            ,id: 'teamlister-'+this.ident+'-phone'
            ,width: 400
        },{
            xtype: 'textfield'
            ,inputType: 'file'
            ,fieldLabel: _('teamlister.member_photo')
            ,name: 'photo'
            ,id: 'teamlister-'+this.ident+'-photo'
            ,width: 400
        },{
            xtype: 'textfield'
            ,fieldLabel: _('teamlister.member_website')
            ,name: 'website'
            ,id: 'teamlister-'+this.ident+'-www'
            ,width: 400
        },{
            xtype: 'teamlister-combo-listsections'
            ,fieldLabel: _('teamlister.member_section')
            ,name: 'section'
            ,id: 'teamlister-'+this.ident+'-section'
            ,width: 400
        },{
            xtype: 'textfield'
            ,fieldLabel: _('teamlister.member_role')
            ,name: 'role'
            ,id: 'teamlister-'+this.ident+'-role'
            ,width: 400
        },{
            xtype: 'textfield'
            ,fieldLabel: _('teamlister.member_order')
            ,name: 'menuindex'
            ,id: 'teamlister-'+this.ident+'-menuindex'
            ,width: 400
        },{
            xtype: 'teamlister-rte'
            ,fieldLabel: _('teamlister.member_bio')
            ,name: 'bio'
            ,id: 'teamlister-'+this.ident+'-bio'
            ,width: 400
        }]
    });
    TeamLister.window.CreateMember.superclass.constructor.call(this,config);
};
Ext.extend(TeamLister.window.CreateMember,MODx.Window);
Ext.reg('teamlister-window-member-create',TeamLister.window.CreateMember);


TeamLister.window.UpdateMember = function(config) {
    config = config || {};
    this.ident = config.ident || 'tlumember'+Ext.id();
    Ext.applyIf(config,{
        title: _('teamlister.member_update')
        ,id: this.ident
        ,width: 575
        ,url: TeamLister.config.connector_url
        ,action: 'mgr/member/update'
        ,fields: [{
            xtype: 'hidden'
            ,name: 'id'
            ,id: 'teamlister-'+this.ident+'-id'
        },{
            xtype: 'textfield'
            ,fieldLabel: _('teamlister.member_name')
            ,name: 'name'
            ,id: 'teamlister-'+this.ident+'-name'
            ,width: 400
        },{
            xtype: 'textfield'
            ,fieldLabel: _('teamlister.member_firstname')
            ,name: 'firstname'
            ,id: 'teamlister-'+this.ident+'-firstname'
            ,width: 400
        },{
            xtype: 'textfield'
            ,fieldLabel: _('teamlister.member_email')
            ,name: 'email'
            ,id: 'teamlister-'+this.ident+'-email'
            ,width: 400
        },{
            xtype: 'textfield'
            ,fieldLabel: _('teamlister.member_phone')
            ,name: 'phone'
            ,id: 'teamlister-'+this.ident+'-phone'
            ,width: 400
        },{
            xtype: 'textfield'
            ,inputType: 'file'
            ,fieldLabel: _('teamlister.member_photo')
            ,name: 'photo'
            ,id: 'teamlister-'+this.ident+'-photo'
            ,width: 400
        },{
            xtype: 'textfield'
            ,fieldLabel: _('teamlister.member_website')
            ,name: 'website'
            ,id: 'teamlister-'+this.ident+'-www'
            ,width: 400
        },{
            xtype: 'teamlister-combo-listsections'
            ,fieldLabel: _('teamlister.member_section')
            ,name: 'section'
            ,id: 'teamlister-'+this.ident+'-section'
            ,width: 400
        },{
            xtype: 'textfield'
            ,fieldLabel: _('teamlister.member_role')
            ,name: 'role'
            ,id: 'teamlister-'+this.ident+'-role'
            ,width: 400
        },{
            xtype: 'textfield'
            ,fieldLabel: _('teamlister.member_order')
            ,name: 'menuindex'
            ,id: 'teamlister-'+this.ident+'-menuindex'
            ,width: 400
        },{
            xtype: 'teamlister-rte'
            ,fieldLabel: _('teamlister.member_bio')
            ,name: 'bio'
            ,id: 'teamlister-'+this.ident+'-bio'
            ,width: 400
        }]
    });
    TeamLister.window.UpdateMember.superclass.constructor.call(this,config);
};
Ext.extend(TeamLister.window.UpdateMember,MODx.Window);
Ext.reg('teamlister-window-member-update',TeamLister.window.UpdateMember);


// Sections combo box
TeamLister.combo.listSections = function(config) {
    config = config || {};
    Ext.applyIf(config, {
        name : 'list_sections'
        ,hiddenName : 'section'
        ,forceSelection: true
        ,selectOnFocus: true
        ,displayField : 'name'
        ,valueField : 'id'
        ,fields: ['id', 'name']
        ,triggerAction : 'all'
        ,lazyRender: true
        ,editable : false
        ,listWidth: 400
        ,blankText: _('teamlister.section_combo_blank')
        ,emptyText: _('teamlister.section_combo_empty')
        ,allowBlank: false
        ,url: TeamLister.config.connector_url
        ,baseParams: {
            action: 'mgr/section/getlist'
            ,combo: true
        }
    });
    TeamLister.combo.listSections.superclass.constructor.call(this, config);
};
Ext.extend(TeamLister.combo.listSections, MODx.combo.ComboBox);
Ext.reg('teamlister-combo-listsections', TeamLister.combo.listSections);





// TinyMCE for members bio & sections infos edition
TeamLister.tinymce = function(config) {
    config = config || {};
    Ext.applyIf(config, {
        name : 'teamlister_rte'
        ,tinymceSettings: {
            theme: "advanced"
            ,skin: "cirkuit"
            ,plugins: "style,advimage,advlink,modxlink,searchreplace,print,contextmenu,paste,fullscreen,noneditable,nonbreaking,xhtmlxtras,visualchars,media,template"
            //,plugins: "style,advimage,advlink,modxlink,searchreplace,print,contextmenu,paste,fullscreen,noneditable,nonbreaking,xhtmlxtras,visualchars,media"
            //,browserUrl : ""
            ,theme_advanced_buttons1: "undo,redo,selectall,|,nonbreaking,charmap,|,image,modxlink,unlink,anchor,media,|,fullscreen,code,help"
            ,theme_advanced_buttons2: "bold,italic,underline,strikethrough,sub,sup,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,|,template"
            ,theme_advanced_buttons3: "styleselect,formatselect"
            ,theme_advanced_toolbar_location: "top"
            ,theme_advanced_toolbar_align: "left"
            ,theme_advanced_statusbar_location: "bottom"
            ,theme_advanced_resizing: false
            ,extended_valid_elements: "a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]"
        }
    });
    TeamLister.tinymce.superclass.constructor.call(this, config);
};
Ext.extend(TeamLister.tinymce, Ext.ux.TinyMCE);
Ext.reg('teamlister-rte', TeamLister.tinymce);