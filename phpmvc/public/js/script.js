$(function(){

    $('.tombolTambahData').on('click', function(){
        $('#forModalLabel').html('Tambah Data Mahasiswa')
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama').val('');
        $('#nrp').val('');
        $('#email').val('');
        $('#jurusan').val('');
        $('#id').val('');
    });

    $('.tampilModalUbah').on('click', function(){
        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvcpublic/mahasiswa/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#Nama').val(data.Nama);
                $('#NRP').val(data.NRP);
                $('#Email').val(data.Email);
                $('#id').val(data.id);
            }
        });

    });

})