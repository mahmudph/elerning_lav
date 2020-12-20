<script>

	/* default url  */
let defaultUrl = "{{ route('admin.guru.data')}}";

/* default columns */
let defaultColumns = [
	{ data: 'DT_RowIndex', orderable: false, searchable: false},
	{ data: 'nama_guru', name:'nama_guru'},
	{ data: 'nip', name:'nip'},
	{ data: 'gender', name:'gender'},
	{ data: 'nomer_hp', name:"nomer_hp"},
	{ data: 'tgl_lahir', name:"tgl_lahir"},
	{ data: 'tempat_lahir', name:'tempat_lahir'},
	{ data: 'alamat', name: 'alamat'},
	{ data: 'lulusan', name:'lulusan'},
	{ data: 'action', orderable: false, searchable: false}
];

/* advanced columns  */
let advancedColumns = [
	{ data: 'DT_RowIndex', orderable: false, searchable: false},
	{ data: 'nama_guru', name:'nama_guru'},
	{ data: 'nip', name:'nip'},
	{ data: 'gender', name:'gender'},
	{ data: 'nomer_hp', name:"nomer_hp"},
	// { data: 'action', orderable: false, searchable: false}
]


function getDataTablesGuru(url = defaultUrl) {
		$('#datatable').DataTable({
			ajax: url,
			responsive: true,
			processing: true,
			serverSide: true,
			columns: (url == defaultUrl) ? defaultColumns : advancedColumns,
		});
}
</script>