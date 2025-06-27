@extends('layouts.admin.main')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Log Ticket
                </h2>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="chart">
            <div class="row row-cards">

                <!-- Total Tickets -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-blue text-white avatar">
                                        <!-- Mail Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                            <path d="M3 7l9 6l9 -6" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">{{ number_format($totalJournals) }}</div>
                                    <div class="text-muted">Total Tiket</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Success Rate -->
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-green text-white avatar">
                                        <!-- Check Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l5 5l10 -10" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">{{ $successRate }}%</div>
                                    <div class="text-muted">Keberhasilan Tiket</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col">
                            <a href="{{ route('journals.create') }}" class="btn btn-success float-end">Add Log Ticket</a>
                        </div>
                    </div>
                    <div class="card-body border-bottom py-3">
                        <div class="d-flex position-relative">
                            <div class="text-muted">
                                Show
                                <div class="mx-2 d-inline-block">
                                    <input type="text" class="form-control form-control-sm input-page" value="10"
                                        size="3" aria-label="Invoices count">
                                </div>
                                entries
                            </div>
                            <div class="position-absolute top-50 start-50" id="load-icon" style="display: none">
                                <div class="dots"></div>
                            </div>
                            <div class="ms-auto text-muted">
                                Search:
                                <div class="ms-2 d-inline-block">
                                    <input type="text" class="form-control form-control-sm search-journal"
                                        aria-label="Search invoice">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="content-journal">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modal-journal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var url = "{{ route('journals.index') }}";
    var show = $('.input-page').val();

    getJournals(url)

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.input-page').keyup(function (e) {
        e.preventDefault()
        show = $(this).val();
        getJournals(url)
    });

    $('.search-journal').keyup(function (e) {
        e.preventDefault()
        var search = $(this).val();
        getJournals(url + '?search=' + search)
    });

    function getJournals(url) {
        $.ajax({
            type: "GET",
            url: url,
            data: {
                show
            },
            cache: false,
            beforeSend: function () {
                $('#load-icon').show()
            },
            success: function (response) {
                $('#load-icon').hide()
                $('#content-journal').html(response)
                $('ul.pagination a').click(function (e) {
                    e.preventDefault();
                    var url_href = $(this).attr('href');
                    getJournals(url_href)
                });
            },
            error: function (response, params) {
                console.log(response);
            }
        });
    }

    function deleteJournal(e, id) {
        e.preventDefault()
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success m-2',
                cancelButton: 'btn btn-danger m-2'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: `{{ url('journals/${id}') }}`,
                    cache: false,
                    success: function (response) {
                        if (response.status == true) {
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            getJournals(url)
                        } else {
                            swalWithBootstrapButtons.fire(
                                'Failed!',
                                response.message,
                                'error'
                            )
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("Error: " + errorThrown);
                    }
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    }
</script>
@endsection
@section('styles')
  <style>
    .fixed-card-size {
        display: flex;
        flex-direction: column;
        height: 380px; /* Ukuran tetap */
        transition: all 0.3s ease;
    }

    .fixed-card-size:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .card-text-truncate {
        flex-grow: 1;
        min-height: 120px;
        max-height: 120px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        word-wrap: break-word;
    }

    .card-date {
        font-size: 0.9rem;
        color: #666;
    }

    .card-footer {
        background-color: #f8f9fa;
        padding: 0.75rem;
    }
</style>
@endsection