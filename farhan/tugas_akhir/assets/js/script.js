$(document).ready(function(){
    'use strict'
    const tableElement = document.querySelector('.table-datatables');
    const formBarang = document.querySelector('#form-barang');

    if(tableElement){
        $(tableElement).DataTable();
    }
    if(formBarang){
        $(formBarang).validate({
            rules:{
                suplier_id:{
                    required:true,
                },
                nama:{
                    required:true,
                },
                deskripsi:{
                    required:true,
                },
                satuan:{
                    required:true,
                },
                stock:{
                    required:true,
                },
            },
            messages:{
                suplier_id:{
                    required:'Suplier harus dipilih',
                },
                nama:{
                    required:'Barang harus diisi',
                },
                deskripsi:{
                    required:'Deskripsi harus diisi',
                },
                satuan:{
                    required:'Satuan harus diisi',
                },
                stock:{
                    required:'Stock harus diisi',
                },
            },
            errorClass: 'invalid-feedback',
            errorElement: 'div',
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass('is-valid').removeClass('is-invalid');
            },
            submitHandler: function(form) {
                form.submit(); // Kirim form jika valid
            }
        })
    }
})