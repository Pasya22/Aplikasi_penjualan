</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/a351b990a2.js" crossorigin="anonymous"></script>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(".delete").click(function() {

    var hapus = false;
    if (!hapus) {
        hapus = true;
        $.post('<?= site_url('Welcome/DeleteDataBrg'); ?>', {
            id: $(this).attr('data-id')

        });
        hapus = false;
    }

});
</script>
<script>
function hanyaAngka(event) {
    var harga_beli = (event.which) ? event.which : event.keyCode
    var harga_jual = (event.which) ? event.which : event.keyCode
    var stok = (event.which) ? event.which : event.keyCode
    if (harga_beli != 46 && harga_beli > 31 && (harga_beli < 48 || harga_beli > 57))
        if (harga_jual != 46 && harga_jual > 31 && (harga_jual < 48 || harga_jual > 57))
            if (stok != 46 && stok > 31 && (stok < 48 || stok > 57))
                return false;
    return true;
}
</script>