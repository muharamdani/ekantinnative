$(document).ready(function()
{
    $('#search').hide();
    $('#keywords').on('keyup',function()
    {
        $('#tabel').load('../tarik_saldo/search_pelanggan.php?keywords='+$('#keywords').val());
    });
});