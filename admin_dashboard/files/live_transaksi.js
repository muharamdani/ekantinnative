$(document).ready(function()
{
    $('#search').hide();
    $('#keywords').on('keyup',function()
    {
        $('#tabel').load('../riwayat/search_transaksi.php?keywords='+$('#keywords').val());
    });
});