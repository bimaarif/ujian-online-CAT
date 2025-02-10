</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<script type="importmap">
    {
                "imports": {
                    "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.3.0/ckeditor5.js",
                    "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.0/"
                }
            }
        </script>

<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph,
        List
    } from 'ckeditor5';

    ClassicEditor
        .create(document.querySelector('#editor'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, List],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|', 'numberedList', 'bulletedList'
            ]
        })
        .then( /* ... */ )
        .catch( /* ... */ );
</script>

<!-- plugins:js -->
<script src="<?= $main_url; ?>vendors/base/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="<?= $main_url; ?>vendors/chart.js/Chart.min.js"></script>
<script src="<?= $main_url; ?>js/jquery.cookie.js" type="text/javascript"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?= $main_url; ?>js/off-canvas.js"></script>
<script src="<?= $main_url; ?>js/hoverable-collapse.js"></script>
<script src="<?= $main_url; ?>s/template.js"></script>
<script src="<?= $main_url; ?>js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?= $main_url; ?>js/dashboard.js"></script>
<!-- End custom js for this page-->
<!-- chart js -->
<script src="<?= $main_url; ?>js/chart.js"></script>
<!-- datatable -->
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
    let table = new DataTable('#mytable');
</script>
</body>

</html>