$(document).ready(function()
{
    $('#search').hide();
    $('#keywords').on('keyup',function()
    {
        $('#tabel').load('../print/search_print.php?keywords='+$('#keywords').val());
    });
});