// Bootstrap Datepicker
$(function(){
    $('.datepicker').datepicker({
        format : 'yyyy-mm-dd',
        weekStart : 6,
        autoclose: true,
        todayBtn: 'linked'
    });
});