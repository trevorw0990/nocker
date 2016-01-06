$(document).ready(function() {
    //toggle `popup` / `inline` mode
    $.fn.editable.defaults.mode = 'popup';     
    
    $('#servername').editable();
    $('#mws_name').editable();    
    $('#os').editable();    
    $('#os_version').editable();    
    $('#cpu_arch').editable();    
    $('#cpu_count').editable();    
    $('#memory').editable();    
    $('#environment').editable();    
});
