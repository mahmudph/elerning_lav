<script>


/* default url  */
let defaultUrl = "{{ route('admin.siswa.data')}}";


/* default column  */
let defaultColumn =[
	{ data: 'DT_RowIndex', orderable: false, searchable: false},
	{ data: 'nama_siswa', name:'nama_siswa'},
	{ data: 'nis', name:'nis'},
	{ data: 'gender', name:'gender'},
	{ data: 'nomer_hp', name:"nomer_hp"},
	{ data: 'tgl_lahir', name:"tgl_lahir"},
	{ data: 'tempat_lahir', name:'tempat_lahir'},
	{ data: 'alamat', name: 'alamat'},
	{ data: 'action', orderable: false, searchable: false}
];


/* for tabael pengajaran */
let advancedColumn =[
	{ data: 'DT_RowIndex', orderable: false, searchable: false},
	{ data: 'nama_siswa', name:'nama_siswa'},
	{ data: 'nis', name:'nis'},
	{ data: 'gender', name:'gender'},
	{ data: 'nomer_hp', name:"nomer_hp"},
];

function getDataTablesSiswa(url = defaultUrl) {
		$('#datatable').DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			ajax: url,
			columns: url == defaultUrl ? defaultColumn : advancedColumn,
		});
}
</script>
