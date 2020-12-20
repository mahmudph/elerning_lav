<script>


/* for tabael pengajaran */
let advancedColumn =[
	{ data: 'DT_RowIndex', orderable: false, searchable: false},
	{ data: 'nama_siswa', name:'nama_siswa',searchable: false},
	{ data: 'nis', name:'nis',searchable: false },
	{ data: 'gender', name:'gender',searchable: false},
	{ data: 'nomer_hp', name:"nomer_hp",searchable: false},
];

function getDataTablesSiswa(url = defaultUrl) {
    $('#datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: url,
        columns: advancedColumn,
    });
}
</script>
