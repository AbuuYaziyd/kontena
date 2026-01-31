<?= $this->section('styles') ?>
<link rel="stylesheet" href="//cdn.datatables.net/2.3.6/css/dataTables.dataTables.min.css">
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="//cdn.datatables.net/2.3.6/js/dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.3.6/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.6/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.6/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.6/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script>
  let table = new DataTable('.dtTable', {
    "language": {
      "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/sw.json"
    },
    responsive: false,
    searching: true,
    lengthChange: false,
    autoWidth: true,
  });
  // $(function() {
  //   $(".dtTable").DataTable({
  //     dom: '<"container-fluid"<"row"<"col"B><"col"l><"col"f>>>rt<"row"<"col"i><"col"p>>',
  //     buttons: [
  //       'colvis',
  //       {
  //         extend: 'print',
  //         exportOptions: {
  //           columns: ':visible'
  //         }
  //       },
  //     ],
  //     "language": {
  //       "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/sw.json"
  //     },
  //     columnDefs: [{
  //       "type": "html-num",
  //       "targets": 0
  //     }],
  //     responsive: false,
  //     searching: true,
  //     lengthChange: false,
  //     autoWidth: true,
  //   })
  // });
</script>
<?= $this->endSection() ?>