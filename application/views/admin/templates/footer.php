</div><!-- /.content-wrap -->
</div><!-- /.main-wrapper -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs5.min.js"></script>

<script>
    // Sidebar toggle
    let sidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
    function applyCollapse() {
        const s = document.getElementById('sidebar');
        const w = document.getElementById('mainWrapper');
        if (sidebarCollapsed) { s.classList.add('collapsed'); w.classList.add('expanded'); }
        else { s.classList.remove('collapsed'); w.classList.remove('expanded'); }
    }
    applyCollapse();

    function toggleSidebar() {
        if (window.innerWidth <= 991) {
            const s = document.getElementById('sidebar');
            s.classList.toggle('mobile-open');
            document.getElementById('sidebarOverlay').style.display = s.classList.contains('mobile-open') ? 'block' : 'none';
        } else {
            sidebarCollapsed = !sidebarCollapsed;
            localStorage.setItem('sidebarCollapsed', sidebarCollapsed);
            applyCollapse();
        }
    }
    function closeSidebar() {
        document.getElementById('sidebar').classList.remove('mobile-open');
        document.getElementById('sidebarOverlay').style.display = 'none';
    }

    // DataTables init
    $(document).ready(function () {
        if ($.fn.DataTable) {
            $('.datatable').DataTable({
                pageLength: 15,
                responsive: true,
                language: { search: '', searchPlaceholder: 'Search...' }
            });
        }
        // Summernote
        if ($.fn.summernote) {
            $('.summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        }

        // Image preview
        $('input[type="file"]').on('change', function () {
            const preview = $(this).siblings('.img-preview-wrap').find('img');
            if (preview.length && this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = e => preview.attr('src', e.target.result).show();
                reader.readAsDataURL(this.files[0]);
            }
        });

        // Delete confirm
        $(document).on('click', '.confirm-delete', function (e) {
            if (!confirm('Are you sure you want to delete this item? This action cannot be undone.')) {
                e.preventDefault();
            }
        });
    });
</script>
</body>

</html>
