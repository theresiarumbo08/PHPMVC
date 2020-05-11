$(function(){

    $('.tombolTambahData').on('click', function(){
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit').html('Tambah Data');
    });

    //event ketika tombol edit diklik
    $('.tampilModalUbah').on('click', function(){
        
    $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
   
        const id = $(this).data('id');
        
        
        $.ajax({
            url: 'http://localhost:8080/phpmvc/public/mahasiswa/getUbah',
            data: {id : id},
            method: 'post',
            success: function(data){
                console.log(data);
            }
        });
    });


});