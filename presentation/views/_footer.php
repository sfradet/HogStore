<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.4/jquery.simplePagination.min.js"
        integrity="sha512-J4OD+6Nca5l8HwpKlxiZZ5iF79e9sgRGSf0GxLsL1W55HHdg48AEiKCXqvQCNtA1NOMOVrw15DXnVuPpBm2mPg=="
        crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>


<script>
    let items = $('.row .testcol');
    let numItems = items.length;
    let perPage = 12;

    items.slice(perPage).hide();

    $("#pagination-container").pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "<",
        nextText: ">",
        onPageClick: function (pageNumber) {
            let showFrom = perPage * (pageNumber - 1);
            let showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
        }
    });

    $(document).ready(function () {
        $('#table_id').DataTable();
    });
</script>

</body>
