$(document).ready(function(){
    'use strict'
    const tableElement = document.querySelector('.table-datatables');
    const formBarang = document.querySelector('#form-barang');
    const formSuplier = document.querySelector('#form-suplier');
    const formBarangMasuk = document.querySelector('#form-barang-masuk');
    const formBarangKeluar = document.querySelector('#form-barang-keluar');
    const formUser = document.querySelector('#form-user');

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

    if(formSuplier){
        $(formSuplier).validate({
            rules:{
                nama:{
                    required:true,
                },
                kontak:{
                    required:true,
                },
                alamat:{
                    required:true,
                },
            },
            messages:{
                nama:{
                    required:'Nama Suplier harus diisi',
                },
                kontak:{
                    required:'Kontak Suplier harus diisi',
                },
                alamat:{
                    required:'Alamat Suplier harus diisi',
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

    if(formBarangMasuk){
        $(formBarangMasuk).validate({
            rules:{
                barang_id:{
                    required:true,
                },
                penerima:{
                    required:true,
                },
                stock:{
                    required:true,
                },
            },
            messages:{
                barang_id:{
                    required:'Barang harus dipilih',
                },
                penerima:{
                    required:'Penerima harus diisi',
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

    if(formBarangKeluar){
        $(formBarangKeluar).validate({
            rules:{
                barang_id:{
                    required:true,
                },
                pengambil:{
                    required:true,
                },
                stock:{
                    required:true,
                },
            },
            messages:{
                barang_id:{
                    required:'Barang harus dipilih',
                },
                pengambil:{
                    required:'Pengambil harus diisi',
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

    if(formUser){
        $(formUser).validate({
            rules:{
                nama:{
                    required:true,
                },
                username:{
                    required:true,
                },
                email:{
                    required:true,
                },
                password:{
                    required:true,
                },
                role:{
                    required:true,
                },
            },
            messages:{
                nama:{
                    required:'Nama harus diisi',
                },
                username:{
                    required:'Username harus diisi',
                },
                email:{
                    required:'Email harus diisi',
                },
                password:{
                    required:'Password harus diisi',
                },
                role:{
                    required:'Role harus diisi',
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