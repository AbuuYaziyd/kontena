<?= $this->section('styles') ?>
<link rel="stylesheet" href="//cdn.datatables.net/2.3.7/css/dataTables.dataTables.min.css">
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="//cdn.datatables.net/2.3.7/js/dataTables.min.js"></script>

<script>
  let table = new DataTable('.dtTable', {
    "language": {
      "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/sw.json"
    },
    responsive: false,
    searching: true,
    lengthChange: true,
    autoWidth: true,
  });
</script>
<?= $this->endSection() ?>