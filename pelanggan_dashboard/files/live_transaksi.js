$(document).ready(function()
{
    $('#search').hide();
    $('#keywords').on('keyup',function()
    {
        $('#tabel').load('search_transaksi.php?keywords='+$('#keywords').val());
    });
});