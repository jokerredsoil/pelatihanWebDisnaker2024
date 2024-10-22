$(document).ready(function(){
    'use strict'
    const tableElement = document.querySelector('.table-datatables');

    if(tableElement){
        $(tableElement).DataTable();
    }
})