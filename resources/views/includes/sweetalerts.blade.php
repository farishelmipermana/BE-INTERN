@if (Session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"
        integrity="sha256-HutwTOHexZPk7phZTEa350wtMYt10g21BKrAlsStcvw=" crossorigin="anonymous"></script>
    <script>
        Swal.fire(
            'Berhasil!',
            '{{ Session('success') }}',
            'success'
        )

    </script>
@endif

@if (Session('warning'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"
        integrity="sha256-HutwTOHexZPk7phZTEa350wtMYt10g21BKrAlsStcvw=" crossorigin="anonymous"></script>
    <script>
        Swal.fire(
            'Berhasil!',
            '{{ Session('warning') }}',
            'warning'
        )

    </script>
@endif

@if (Session('danger'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"
        integrity="sha256-HutwTOHexZPk7phZTEa350wtMYt10g21BKrAlsStcvw=" crossorigin="anonymous"></script>
    <script>
        Swal.fire(
            'Berhasil!',
            '{{ Session('danger') }}',
            'error'
        )

    </script>
@endif

@if (Session('info'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"
        integrity="sha256-HutwTOHexZPk7phZTEa350wtMYt10g21BKrAlsStcvw=" crossorigin="anonymous"></script>
    <script>
        Swal.fire(
            'Berhasil!',
            '{{ Session('info') }}',
            'info'
        )

    </script>
@endif
