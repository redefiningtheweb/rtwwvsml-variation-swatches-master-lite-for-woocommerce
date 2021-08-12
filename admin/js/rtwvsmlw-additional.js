(function( $ ) {
	'use strict';

    $(document).ready(function(){

        if (window.matchMedia("(max-width: 768px)").matches){
            $("#rtwvsmlw_color_seperator_select_box").select2({
                width: '100%'
            });
            $("#rtwvsmlw_color_seperator_select_box_in_size").select2({
                width: '100%'
            });
            $("#rtwvsmlw_size_display_type_in_prdct_category").select2({
                width: '100%'
            });
        
            $("#rtwvsmlw_size_swatches_profile_in_prdct_category").select2({
                width: '100%'
            });
            $(".mdc-drawer").removeClass("mdc-drawer--open");
        }
        else {
            $("#rtwvsmlw_color_seperator_select_box").select2({
                width: '74%'
            });
            $("#rtwvsmlw_color_seperator_select_box_in_size").select2({
                width: '74%'
            });
            $(".mdc-drawer").addClass("mdc-drawer--open");
        
            $("#rtwvsmlw_size_display_type_in_prdct_category").select2({
                width: '40%'
            });
        
            $("#rtwvsmlw_size_swatches_profile_in_prdct_category").select2({
                width: '40%'
            });
        }

        $("#rtwvsmlw_prdct_ctegory").parent("label").css("height","45px");
        
        $(".rtwvsmlw_display_type").select2({
            width: '100%'
        });
        $("#rtwvsmlw_display_style").select2({
            width: '100%'
        });
        $("#rtwvsmlw_swatches_type").select2({
            width: '100%'
        });
        $(".rtwvsmlw_prdct_category_color_select_type").select2({
            width:'200px'
        });
    
        $("#rtwvsmlw_size_display_type").select2({
            width:'100%'
        });
        $("#rtwvsmlw_size_swatches_profile").select2({
            width:'100%'
        });

        $(document).find('.rtwvsmlw_display_type').each(function(){
            var rtwvsmlw_value = $(this).val();
            $(this).closest('.rtwvsmlw_default_design_tab_content').find('.rtwvsmlw_display_type_tab_in_color').each(function(){
                var rtwvsmlw_data_value = $(this).attr('data-value');
                if(rtwvsmlw_value == rtwvsmlw_data_value){
                    $(this).show();
                }else{
                    $(this).hide();
                }
            });
            
        });

        $(".rtwvsmlw_display_type").on("change",function(){
            var rtwvsmlw_value = $(this).val();
            $(this).closest('.rtwvsmlw_default_design_tab_content').find('.rtwvsmlw_display_type_tab_in_color').each(function(){
                var rtwvsmlw_data_value = $(this).attr('data-value');

                if(rtwvsmlw_value == rtwvsmlw_data_value){
                    $(this).show();
                }else{
                    $(this).hide();
                }
            
            });

        });

        if($("#rtwvsmlw_size_display_type").val()== "button"){
            $(".rtwvsmlw_display_type_button_tab_in_size").show();
        }
        if($("#rtwvsmlw_size_display_type").val()== "image"){
            $(".rtwvsmlw_display_type_img_tab_in_size").show();
        }
        if($("#rtwvsmlw_size_display_type").val()== "color"){
            $(".rtwvsmlw_display_type_color_tab_in_size").show();
        }
        if($("#rtwvsmlw_size_display_type").val()== "variation-image"){
            $(".rtwvsmlw_display_type_variation_image_tab_in_size").show();
        }
        if($("#rtwvsmlw_size_display_type").val()== "theme-default"){
            $(".rtwvsmlw_display_type_theme_default_tab_in_size").show();
        }
        if($("#rtwvsmlw_size_display_type").val()== "radio"){
            $(".rtwvsmlw_display_type_radio_tab_in_size").show();
        }
        $("#rtwvsmlw_size_display_type").on("change",function(){
            $(".rtwvsmlw_display_type_tab_in_size").hide();
            if($("#rtwvsmlw_size_display_type").val()== "button"){
                $(".rtwvsmlw_display_type_button_tab_in_size").show();
            }
            if($("#rtwvsmlw_size_display_type").val()== "image"){
                $(".rtwvsmlw_display_type_img_tab_in_size").show();
            }
            if($("#rtwvsmlw_size_display_type").val()== "color"){
                $(".rtwvsmlw_display_type_color_tab_in_size").show();
            }
            if($("#rtwvsmlw_size_display_type").val()== "variation-image"){
                $(".rtwvsmlw_display_type_variation_image_tab_in_size").show();
            }
            if($("#rtwvsmlw_size_display_type").val()== "theme-default"){
                $(".rtwvsmlw_display_type_theme_default_tab_in_size").show();
            }
            if($("#rtwvsmlw_size_display_type").val()== "radio"){
                $(".rtwvsmlw_display_type_radio_tab_in_size").show();
            }
        });

        $(document).on("click", ".rtwvsmlw_clone_btn_in_color_prdct_category",function(){
            $(this).parent().parent().clone().appendTo("#rtwvsmlw_prdct_category_color_table");
        });

        $(document).on("click", ".rtwvsmlw_remove_btn_in_color_prdct_category",function(){
                $(this).parent().parent().fadeOut(1000);
            setTimeout(() => {
                $(this).parent().parent().remove();
            }, 1000);
        });

        $(document).on("click",".rtwvsmlw_design_prdct_size_clone_btn",function(){
            $(this).parent().parent().parent().clone().appendTo(".rtwvsmlw_global_attribute_size_card");
        });
        
        $(document).on("click",".rtwvsmlw_design_prdct_size_remove_btn",function(){
            $(this).parent().parent().parent().fadeOut(1000);
            setTimeout(() => {
                $(this).parent().parent().parent().remove();
            }, 1000);
        });

        $(document).on("click",".rtwvsmlw_clone_btn_in_size",function(){
            $(this).parent().parent().parent().clone().appendTo(".rtwvsmlw_color_card_box_in_size");
        });
        
        $(document).on("click",".rtwvsmlw_remove_btn_in_size",function(){
            $(this).parent().parent().parent().fadeOut(1000);
            setTimeout(() => {
                $(this).parent().parent().parent().remove();
            }, 1000);
        });

        $(document).find(".rtwvsmlw_color_section_btn").on("click",function(){
            $(this).closest('.rtwvsmlw_tab_content_card').find(".rtwvsmlw_global_color_attr_tab_content").hide();
            $( $(this).closest('.rtwvsmlw_tab_content_card').find($(this).attr("data-tab"))).show();
        });

        if( window.location.href != '' )
        {
            var rtwvsmlw_curr_url = window.location.href;
            
            if(rtwvsmlw_curr_url.indexOf('#/rtwwvsm') != -1)
            {
                var rtwvsmlw_curr_url_split = rtwvsmlw_curr_url.split('#/')
                if( rtwvsmlw_curr_url_split[1] != '' )
                {
                    $(".rtwvsmlw_tab_content").hide();
                    $(".rtwvsmlw_tab_list").removeClass('mdc-list-item--activated');
                    $(".rtwvsmlw_tab_list").each(function(){
                        if($(this).attr("data-value") == rtwvsmlw_curr_url_split[1])
                        {
                            $(this).addClass('mdc-list-item--activated');
                            var datatab=  $(this).attr("data-tab");
                            $(datatab).show();
                        }
                    });
                }
            }
        }

        $(".rtwvsmlw_tab_list").on("click",function(){
            $(".rtwvsmlw_tab_list").removeClass('mdc-list-item--activated');
            $(this).addClass('mdc-list-item--activated');
            $(".rtwvsmlw_tab_content").hide();
            var rtwvsmlw_datatab=  $(this).attr("data-tab");
            $(rtwvsmlw_datatab).show();
        });

        $(document).on("click","#rtwvsmlw_toggle_menu_icon",function(){
            if (!window.matchMedia("(max-width: 992px)").matches){
                if($(this).hasClass("rtwvsmlw_expand_header")){
                    $(this).removeClass("rtwvsmlw_expand_header");
                    $("header").css("width","calc(100% - 256px)");
                }
                else{
                    $(this).addClass("rtwvsmlw_expand_header");
                    $("header").css("width","100%");
                }
            }
        });

        function tabsbtn(rtwvsmlw_instance, rtwvsmlw_instance2){
            var rtwvsmlw_textdefault =  rtwvsmlw_instance.text();
            $(rtwvsmlw_instance2+" .rtwvsmlw_dropdown_card_header span").text(rtwvsmlw_textdefault);
        }
        $(".rtwvsmlw_tab_bar_wrapper_for_image_in_color .mdc-tab").on("click",function(){
            tabsbtn($(this),".rtwvsmlw_display_type_img_tab_in_color");
        });

        $(".rtwvsmlw_tab_bar_wrapper_for_color_in_color .mdc-tab").on("click",function(){
            tabsbtn($(this),".rtwvsmlw_display_type_color_tab_in_color");
        });

        $(".rtwvsmlw_tab_bar_wrapper_for_image_in_size .mdc-tab").on("click",function(){
            tabsbtn($(this),".rtwvsmlw_display_type_img_tab_in_size");
        });

        $(".rtwvsmlw_tab_bar_wrapper_for_color_in_size .mdc-tab").on("click",function(){
            tabsbtn($(this),".rtwvsmlw_display_type_color_tab_in_size");
        });


        $(".rtwvsmlw_tab_bar_wrapper_for_color_in_color .mdc-tab").on("click",function(){
            $(".rtwvsmlw_color_tab_content").hide();
            var rtwvsmlw_tabid = $(this).attr('data-tab');
            $(rtwvsmlw_tabid).show();
        });
        $(".rtwvsmlw_display_type_img_tab_in_color .mdc-tab").on("click",function(){
            $(".rtwvsmlw_img_tab_content_in_color").hide();
            var rtwvsmlw_tabidimg = $(this).attr('data-tab');
            $(rtwvsmlw_tabidimg).show();
        });

    });
})( jQuery );