<script>
$(document).ready(function() {
  $('#datatable').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: "{{ route('admin.users.data') }}",
		columns: [
			{ data: 'DT_RowIndex', orderable: false, searchable: false},
			{ data: 'name', name:'name'},
			{ data: 'email', name:'email'},
      { data: 'password', name:'password'},
			{ data: 'role', name:'role'},
      { data: 'action', orderable: false, searchable: false}
		],
	});
});
</script>