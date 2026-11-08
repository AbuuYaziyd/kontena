<?= $this->section('styles') ?>
<link rel="stylesheet" href="//cdn.datatables.net/2.3.7/css/dataTables.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/4.1.3/css/buttons.dataTables.min.css">
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="//cdn.datatables.net/2.3.7/js/dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.3.11/build/vfs_fonts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.3.11/build/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/4.1.3/js/buttons.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/4.1.3/js/dataTables.buttons.min.js"></script>

<script>
  let table = new DataTable('.dtTable', {
    "language": {
      "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/<?= session('lang') ?>.json"
    },
    dom: 'Bfrtip',
    buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    responsive: false,
    searching: true,
    lengthChange: true,
    autoWidth: true,
  });
</script>
<?= $this->endSection() ?>