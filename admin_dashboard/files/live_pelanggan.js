$(document).ready(function()
{
    $('#search').hide();
    $('#keywords').on('keyup',function()
    {
        $('#tabel').load('../update_user/search_pelanggan.php?keywords='+$('#keywords').val());
    });
});