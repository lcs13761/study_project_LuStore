// Call the dataTables jQuery plugin
$(window).on("load", function(){
  $('#dataTable').DataTable({
    dom: '<"dtflex"fB>rtip',
    responsive: true,
    language: {"url": 'http://localhost/themes/admin/assets/datatables/translator.json'},
    order: []
  });
});
