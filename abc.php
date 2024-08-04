
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TIMETABLE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="https://timetable.sruniv.com/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://timetable.sruniv.com/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://timetable.sruniv.com/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="https://timetable.sruniv.com/assets/css/style.css" rel="stylesheet">


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://timetable.sruniv.com/assets/lib/chart/chart.min.js"></script>
    <script src="https://timetable.sruniv.com/assets/lib/easing/easing.min.js"></script>
    <script src="https://timetable.sruniv.com/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="https://timetable.sruniv.com/assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://timetable.sruniv.com/assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="https://timetable.sruniv.com/assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="https://timetable.sruniv.com/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="https://timetable.sruniv.com/assets/js/main.js"></script>
       <!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<!-- DataTables Buttons CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<!-- DataTables Buttons JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

</head>

<body style="background-image: url('https://sruniv.com/assets/img/sru_gate_opt.jpg');">
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div class="container-fluid pt-4 px-4" style="background:#5a5adf;">
                <div class="row g-4">
                    <img src="https://sruniv.com/assets/img/sru_logo_new.png" alt="SRU LOGO" style="height:150px;" class="text-center home-logo">
                    <form id="searchBatchReport">
                    <input type="hidden" name="_token" value="TjAdFyjm5Phut1QEOIPK85unmKeiSPaQ9kdRvagF">                        <div class="row m-0">
                            
                            <div class="col-4 col-md-4 col-lg-3 mb-0 ps-0 text-left">
                                <label for="degree">Degree <span style="color:red;">*</span></label>
                                <select class="form-select text-xs text-primary" id="degree" name="degree">
                                    <option value="">Select Degree</option>
                                                                            <option value="BBA-BM">BBA-BM</option>
                                                                            <option value="BSc-AGRI">BSc-AGRI</option>
                                                                            <option value="BTECH-CE">BTECH-CE</option>
                                                                            <option value="BTECH-CSE">BTECH-CSE</option>
                                                                            <option value="BTECH-ECE">BTECH-ECE</option>
                                                                            <option value="BTECH-EEE">BTECH-EEE</option>
                                                                            <option value="BTECH-IEP-CSE">BTECH-IEP-CSE</option>
                                                                            <option value="BTECH-ME">BTECH-ME</option>
                                                                            <option value="IMBA-BM">IMBA-BM</option>
                                                                            <option value="MBA-BM">MBA-BM</option>
                                                                    </select>
                            </div>

                            <div class="col-4 col-md-2 col-lg-2 mb-0 ps-0 text-left">
                                <label for="year">Year <span style="color:red;">*</span></label>
                                <select class="form-select text-xs text-primary" id="year" name="year">
                                    <option value="">Select Year</option>
                                </select>
                            </div>

                            <div class="col-4 col-md-2 col-lg-2 mb-0 ps-0 text-left">
                                <label for="batch">Batch <span style="color:red;">*</span></label>
                                <select class="form-select text-xs text-primary" id="batch" name="batch">
                                    <option value="">Select Batch</option>
                                </select>
                            </div>
                            
                            <div class="col-12 col-md-2 col-lg-2">
                                <br>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                            
                        </div>
                    </form>
                    
                                        <div class="card-body pb-2">
                        <div class="table-responsive p-0 search-results" id="divbody" style="background:#fff;"></div>
                    </div>
                    <div class="card-body pb-2">
                        <div class="table-responsive p-0 search-results" id="divbody2" style="background:#fff;"></div>
                    </div>
                </div>
            </div>
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

    </div>

</body>
<script>
$(document).ready(function () {
    $('#degree').change(function () {
        var degree = $(this).val();
        if (degree) {
            $.ajax({
                url: '/get-yearbpublic',
                type: 'GET',
                data: {degree: degree},
                dataType: 'json',
                success: function (data) {
                    $('#year').empty();
                    $('#year').append('<option value="">Select Year</option>');
                    $.each(data.yearList, function (key, value) {
                        $('#year').append('<option value="' + value.year + '">' + value.year + '</option>');
                    });
                }
            });
        } else {
            $('#year').empty();
            $('#year').append('<option value="">Select Year</option>');
        }
    });

    $('#year').change(function () {
        var year = $(this).val();
        var degree = $('#degree').val();
        if (year && degree) {
            $.ajax({
                url: '/get-batchbpublic',
                type: 'GET',
                data: {year: year, degree: degree},
                dataType: 'json',
                success: function (data) {
                    $('#batch').empty();
                    $('#batch').append('<option value="">Select Batch</option>');
                    $.each(data.batchList, function (key, value) {
                        $('#batch').append('<option value="' + value.batch + '">' + value.batch + '</option>');
                    });
                }
            });
        } else {
            $('#batch').empty();
            $('#batch').append('<option value="">Select Batch</option>');
        }
    });
});

</script>           
<script>
$(document).ready(function () {
    $('#searchBatchReport').submit(function (e) {
        e.preventDefault();

        // Disable search button and other elements (if needed)
        $('#getReportbtn').attr('disabled', true);

        // Show loading icon
        $('#divbody').addClass('loading');
        $('#divbody2').addClass('loading');

        // Extract values of batch and year input fields
        var batch = $('#batch').val();
        var year = $('#year').val();

        var formData = {
            _token: "TjAdFyjm5Phut1QEOIPK85unmKeiSPaQ9kdRvagF", // Include CSRF token
            batch: batch,
            year: year
        };

        // AJAX request to fetch data from server
        $.ajax({
            url: "https://timetable.sruniv.com/searchBatchReportPublic", // Laravel route to handle AJAX request
            type: "POST",
            data: formData,
            success: function (data) {
                console.log(data); // Log the response to the console
                $('#getReportbtn').attr('disabled', false);
                $('#divbody').removeClass('loading');
                
                if (data.success) {
                    var html = '';

                    // Generate table structure with dynamic data
                    html += `
                        <div class="table-responsive" style="font-size:9px;">
                            <table class="cell-border compact stripe" id="account11">
                                <thead>
                                    <tr>
                                        <th style="border: 1px solid black;width:10%;font-weight:700;">Time</th>
                                        <th style="border: 1px solid black;width:18%;font-weight:700;">Monday</th>
                                        <th style="border: 1px solid black;width:18%;font-weight:700;">Tuesday</th>
                                        <th style="border: 1px solid black;width:18%;font-weight:700;">Wednesday</th>
                                        <th style="border: 1px solid black;width:18%;font-weight:700;">Thursday</th>
                                        <th style="border: 1px solid black;width:18%;font-weight:700;">Friday</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                    // Loop through each time slot and generate rows for each day
                    var times = ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'];
                    var days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

                    times.forEach(function (time) {
                        html += `<tr><td style="border: 1px solid black; font-weight:700;">${time}</td>`;
                        days.forEach(function (day) {
                            var schedules = data.data[day][time];
                            if (schedules && schedules.length > 0) {
                                html += `<td style="border: 1px solid black;">`;
                                schedules.forEach(function (schedule) {
                                    // Determine the LTP value
                                    let ltpValue = '';
                                    if (schedule.ltp.trim() === 'Lecture') {
                                        ltpValue = 'L';
                                    } else if (schedule.ltp.trim() === 'Lab') {
                                        ltpValue = 'P';
                                    } else {
                                        ltpValue = schedule.ltp.trim(); // Keep original if not Lecture or Lab
                                    }

                                    // Format the data
                                   const formattedData = `
                                        ${schedule.subject.trim()} (${ltpValue}): (${schedule.room_name.trim()})
                                        ${schedule.facultyName.trim()}: (${schedule.batch.trim()})
                                    `;

                                    html += `<p class="text-start">${formattedData}</p>`;
                                });
                                html += `<br></td>`;
                            } else {
                                html += `<td style="border: 1px solid black;"></td>`;
                            }
                        });
                        html += `</tr>`;
                    });

                    function formatData(data) {
                        return data.replace(/\s+/g, '').replace(/,/g, ', <br>');
                    }

                    // Close table body and set table content
                    html += `</tbody></table></div>`;

                    // Set table content to the container
                    $('#divbody').html(html);

                    // Initialize DataTable with export buttons
                    var table = new DataTable('#account11', {
                        dom: 'Bfrtip',
                        buttons: [
                            // {
                            //     extend: 'copy',
                            //     title: function() {
                            //         return batch;
                            //     },
                            //     customize: function (doc) {
                            //         $(doc).find('table').css('font-size', '10px');
                            //     }
                            // },
                            // {
                            //     extend: 'csv',
                            //     title: function() {
                            //         return batch;
                            //     },
                            //     customize: function (csv) {
                            //         return "sep=,\n" + csv;
                            //     },
                            //     exportOptions: {
                            //         format: {
                            //             body: function (data) {
                            //                 return data;
                            //             }
                            //         }
                            //     }
                            // },
                            // {
                            //     extend: 'excel',
                            //     title: function() {
                            //         return batch;
                            //     },
                            //     customize: function (xlsx) {
                            //         var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            //         $('row c', sheet).each(function () {
                            //             $(this).attr('s', '25');
                            //         });
                            //         $(sheet).find('row c').css('font-size', '10px');
                            //     }
                            // },
                            {
                                extend: 'pdf',
                                title: function() {
                                    return batch;
                                },
                                customize: function (doc) {
                                    doc.styles.tableHeader = {
                                        fillColor: 'gray',
                                        color: 'white',
                                        alignment: 'center',
                                        border: '1px solid black',
                                        fontSize: 10
                                    };
                                    doc.styles.tableBodyEven = {
                                        fillColor: 'white',
                                        border: '1px solid black',
                                        fontSize: 10
                                    };
                                    doc.styles.tableBodyOdd = {
                                        fillColor: 'gray',
                                        border: '1px solid black',
                                        fontSize: 10
                                    };
                                }
                            },
                            {
                                extend: 'print',
                                title: function() {
                                    return batch;
                                },
                                customize: function (win) {
                                    // Add custom print styles
                                    var style = "<style>";
                                    style += "@media  print {";
                                    style += "body { font-size: 10px; }"; // Set the desired font size here
                                    style += "table { font-size: 10px; }"; // Ensure table fonts are also set
                                    style += "td, th { font-size: 10px; }"; // Set font size for table cells
                                    style += "}";
                                    style += "</style>";
                                    $(win.document.head).append(style);
                                }
                            },
                            {
                                extend: 'excel',
                                title: function() {
                                    return batch;
                                },
                                
                            }
                        ]
                    });

                } else {
                    alert(data.error); // Display error message if any
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr, status, error);
                $('#getReportbtn').attr('disabled', false);
                $('#divbody').removeClass('loading');
                alert('An error occurred while fetching the report. Please try again later.');
            }
        });

        // Second AJAX request to fetch the second report
        $.ajax({
            url: "https://timetable.sruniv.com/searchBatchReport2Public",
            type: "POST",
            data: formData,
            success: function (data) {
                console.log(data);
                $('#divbody2').removeClass('loading');

                if (data.success) {
                    var html = '';
                    var roomName = `${data.degree},${data.secondPart},${data.year}`;

                    // Generate table structure with dynamic data
                    html += `
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="account21">
                                <thead>
                                    <tr>
                                        <th scope="col">S No.</th>
                                        <th scope="col">Faculty</th>
                                        <th scope="col">Day</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Room</th>
                                        <th scope="col">Batch</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">LTP</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                    // Check if data.data is an object with the expected structure
                    if (typeof data.data === 'object' && !Array.isArray(data.data)) {
                        let index = 1;
                        $.each(data.data, function (day, timeSlots) {
                            $.each(timeSlots, function (time, schedules) {
                                if (Array.isArray(schedules)) {
                                    schedules.forEach(function (schedule) {
                                        html += `
                                            <tr>
                                                <td>${index++}</td>
                                                <td>${schedule.facultyName}</td>
                                                <td>${day}</td>
                                                <td>${time}</td>
                                                <td>${schedule.room_name}</td>
                                                <td>${schedule.batch}</td>
                                                <td>${schedule.semester}</td>
                                                <td>${schedule.subject}</td>
                                                <td>${schedule.ltp}</td>
                                            </tr>`;
                                    });
                                }
                            });
                        });
                    } else {
                        console.error("data.data is not an object or has unexpected structure:", data.data);
                        html += `<tr><td colspan="9">No data available</td></tr>`;
                    }

                    // Close table body and set table content
                    html += `</tbody></table></div>`;

                    // Set table content to the container
                    $('#divbody2').html(html);

                    // Initialize DataTable with export buttons for second report
                    var table2 = new DataTable('#account21', {
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'copy',
                                title: function() {
                                    return batch;
                                },
                                customize: function (doc) {
                                    $(doc).find('table').css('font-size', '10px');
                                }
                            },
                            {
                                extend: 'csv',
                                title: function() {
                                    return batch;
                                },
                                customize: function (csv) {
                                    return "sep=,\n" + csv;
                                },
                                exportOptions: {
                                    format: {
                                        body: function (data) {
                                            return data;
                                        }
                                    }
                                }
                            },
                            {
                                extend: 'excel',
                                title: function() {
                                    return batch;
                                },
                                customize: function (xlsx) {
                                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                                    $('row c', sheet).each(function () {
                                        $(this).attr('s', '25');
                                    });
                                    $(sheet).find('row c').css('font-size', '10px');
                                }
                            },
                            {
                                extend: 'pdf',
                                title: function() {
                                    return batch;
                                },
                                customize: function (doc) {
                                    doc.styles.tableHeader = {
                                        fillColor: 'gray',
                                        color: 'white',
                                        alignment: 'center',
                                        border: '1px solid black',
                                        fontSize: 10
                                    };
                                    doc.styles.tableBodyEven = {
                                        fillColor: 'white',
                                        border: '1px solid black',
                                        fontSize: 10
                                    };
                                    doc.styles.tableBodyOdd = {
                                        fillColor: 'gray',
                                        border: '1px solid black',
                                        fontSize: 10
                                    };
                                }
                            },
                            {
                                extend: 'print',
                                title: function() {
                                    return batch;
                                },
                                customize: function (win) {
                                    // Add custom print styles
                                    var style = "<style>";
                                    style += "@media  print {";
                                    style += "body { font-size: 10px; }"; // Set the desired font size here
                                    style += "table { font-size: 10px; }"; // Ensure table fonts are also set
                                    style += "td, th { font-size: 10px; }"; // Set font size for table cells
                                    style += "}";
                                    style += "</style>";
                                    $(win.document.head).append(style);
                                }
                            }
                        ]
                    });

                } else {
                    alert(data.error);
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr, status, error);
                $('#divbody2').removeClass('loading');
                alert('An error occurred while fetching the second report. Please try again later.');
            }
        });
    });
});

</script>

<style>
    label{
        color: white;
    }
</style>
</html>

