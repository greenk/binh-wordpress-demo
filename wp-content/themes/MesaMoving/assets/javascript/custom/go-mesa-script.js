/**
 * go-mesa-script.js
 * Init neccessary javascript plugin
 */

var GoMesaScript = {

    /*
     * Input value to initialize component
     */
    options: {


    },

    initialize: function() {
        this
            .setVars()
            .build()
            .events();

        this.initMegaMenu();

        this.initSidebarMenu();
    },

    initMegaMenu: function() {

    },

    /*
     * Set value for properties of this component
     */
    setVars: function() {


        return this;
    },
    /*
     * Prepare data for this component
     */
    build: function() {


        return this;
    },

    /*
     * Execute events if needed
     */
    events: function() {


        //if($('#site-navigation').css('display') == 'none'){
        //    $('#siteNavStickyContainer').css('position', 'fixed');
        //}


        //Modify gform id2, to make it show rating star
        $('.gform_wrapper .gform_body .gform_fields #field_2_4.gfield .ginput_container_radio .gfield_radio li input[name=input_4]').on('change', function(e){


            $(this).parent().prevAll('li').find('label').removeClass('pseudo-checked-star');

            $(this).parent().nextAll('li').find('label').addClass('pseudo-checked-star');

            //console.log($(this).parent().nextAll('li').find('label'));

            //$('.gform_wrapper .gform_body .gform_fields #field_2_4.gfield .ginput_container_radio .gfield_radio li input[name=input_4]:checked').addClass("Hello world");

        });

        //Edit sticky bar to make it scrollable when expanding.
        $('.menu-toggle-button').on('click', function(event){

            if($('#site-navigation').css('display') == 'none'){
                $('#siteNavStickyWrap').css('position', 'fixed');
                $('#siteNavStickyWrap').css('z-index', '200');
                $('#mobile-cta-additional').show();
                console.log("you called me, i am hiding");

            } else {
                window.scrollTo(0,0);
                $('#siteNavStickyWrap').css('position', 'relative');
                $('#mobile-cta-additional').hide();
                console.log("you called me, I am showing");
            }
        });

        return this;
    },

    /**
     * Execute menu
     */
    initSidebarMenu: function(){

        //Modify Sidebar Menu to make it expanded on active
        if($('#menu-sidebar-menu-services li').hasClass('active')){

            $("#menu-sidebar-menu-services li.active").attr("aria-expanded", "true");
            $("#menu-sidebar-menu-services li.active").find('ul').show();

        }
    }
};

$(document).on('ready', function() {
   GoMesaScript.initialize();
});



