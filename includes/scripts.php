<script src="../../assets/js/jquery.dataTables.min.js"></script>
<script src="../../assets/js/plugins/dataTables.responsive.min.js"> </script>
<script src="../../assets/js/core/popper.min.js"></script>
<script src="../../assets/js/core/bootstrap.min.js"></script>
<script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="../../assets/js/plugins/chartjs.min.js"></script>
<script src="../../assets/js/plugins/choices.min.js"></script>
<script src="../../assets/js/plugins/multistep-form.js"></script>
<script src="../../assets/js/plugins/dropzone.min.js"></script>
<script src="../../assets/js/plugins/dragula/dragula.min.js"></script>
<script src="../../assets/js/plugins/jkanban/jkanban.js"></script>
<script src="../../assets/js/plugins/imask.js"></script>
<script src="../../assets/js/plugins/countup.min.js"></script>
<script>
// Notification
// Function for fetching data | dir -> includes/fetch.php
$(document).ready(function() {
    function load_unseen_notification(view = '') {
        $.ajax({
            url: "../../includes/fetch.php",
            method: "POST",
            data: {
                view: view
            },
            dataType: "json",
            success: function(data) {
                // to Display the fetched data
                $('.notif').html(data.notification);
                if (data.unseen_notification > 0) {
                    $('.count').html(data.unseen_notification);
                } else {
                    $('.count').html("");
                }
            }
        })
    }
    load_unseen_notification();


    // it update the seen notif | from includes/fetch.php
    $(document).on('click', '.drop-toggle', function() {
        $('.count').html('');
        load_unseen_notification('yes');
    })

    // for realtime function | it set to 1 sec
    setInterval(function() {
        load_unseen_notification();
    }, 1000);
})
</script>
<script>
// count | DASHBOARD
var numState = 1;
var totalWidget = 17;
while (numState <= totalWidget) {
    if (document.getElementById('state' + numState)) {
        const countUp = new CountUp('state' + numState, document.getElementById("state" + numState).getAttribute(
            "countTo"));
        if (!countUp.error) {
            countUp.start();
        } else {
            console.error(countUp.error);
        }
    }
    numState++;
}
</script>
<!-- unset cookie | Schedule Subjects -->
<script>
document.cookie = "instructor= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
document.cookie = "subj_id= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
document.cookie = "inst= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
</script>
<!-- Cookies for Modal Select | Schedule Subject -->
<script>
var num = 1;
while (num <= <?php echo $m; ?>) {
    document.querySelector('#multi_instr' + num).addEventListener('change', function() {
        var instructor_id = this.value;
        document.cookie = "instructor=" + instructor_id;
    });

    num++;
}
document.querySelector('.multi_sub').addEventListener('change', function() {
    var subID = this.value;
    document.cookie = "subj_id=" + subID;
});

document.querySelector('.multi_inst').addEventListener('change', function() {
    var instID = this.value;
    document.cookie = "inst=" + instID;
});
</script>
<script>
var inputElements = document.querySelectorAll("input[data-format]");
inputElements.forEach(input => {
    let m = new IMask(input, {
        mask: input.getAttribute("data-format")
    });
});
</script>
<script>
$(document).ready(function() {
    $('#datatable-basic').DataTable({
        "paging": true,
        "ordering": false,
        "info": true,
        language: {
            paginate: {
                previous: '‹',
                next: '›'
            },
            aria: {
                paginate: {
                    previous: 'Previous',
                    next: 'Next'
                }
            },
            search: "_INPUT_",
            searchPlaceholder: "Search..."
        },

    });
});

$(document).ready(function() {
    $('#datatable-simple').DataTable({
        "searching": false,
        "paging": false,
        "ordering": false,
        "info": false,
        language: {
            paginate: {
                previous: '‹',
                next: '›'
            },
            aria: {
                paginate: {
                    previous: 'Previous',
                    next: 'Next'
                }
            },
            search: "_INPUT_",
            searchPlaceholder: "Search..."
        },
    });
});

$(document).ready(function() {
    $('#datatable-info').DataTable({
        "searching": false,
        "paging": false,
        "ordering": false,
        "info": true,
        "pageLength": 50,
        language: {
            paginate: {
                previous: '‹',
                next: '›'
            },
            aria: {
                paginate: {
                    previous: 'Previous',
                    next: 'Next'
                }
            },
            search: "_INPUT_",
            searchPlaceholder: "Search..."
        },
    });
});

$(document).ready(function() {
    $('#datatable-modal').DataTable({
        "searching": true,
        "paging": false,
        "ordering": false,
        "info": false,
        "pageLength": 50,
        language: {
            paginate: {
                previous: '‹',
                next: '›'
            },
            aria: {
                paginate: {
                    previous: 'Previous',
                    next: 'Next'
                }
            },
            search: "_INPUT_",
            searchPlaceholder: "Search..."
        },
    });
});
</script>
<script>
// single Select by ID
if (document.getElementById('year_lvl')) {
    var element = document.getElementById('year_lvl');
    const example = new Choices(element, {
        searchPlaceholderValue: "Search...",
    });
}
if (document.getElementById('courses')) {
    var element = document.getElementById('courses');
    const example = new Choices(element, {
        searchPlaceholderValue: "Search...",
    });
}
if (document.getElementById('curri')) {
    var element = document.getElementById('curri');
    const example = new Choices(element, {
        searchPlaceholderValue: "Search...",
    });
}
if (document.getElementById('gender')) {
    var element = document.getElementById('gender');
    const example = new Choices(element, {
        searchPlaceholderValue: "Search...",
    });
}
if (document.getElementById('academic_year')) {
    var element = document.getElementById('academic_year');
    const example = new Choices(element, {
        searchPlaceholderValue: "Search...",
        shouldSort: false,
    });
}
if (document.getElementById('semester')) {
    var element = document.getElementById('semester');
    const example = new Choices(element, {
        searchPlaceholderValue: "Search...",
    });
};
if (document.getElementById('department')) {
    var element = document.getElementById('department');
    const example = new Choices(element, {
        searchPlaceholderValue: "Search...",
        shouldSort: false,
    });
};
if (document.getElementById('dep')) {
    var element = document.getElementById('dep');
    const example = new Choices(element, {
        searchPlaceholderValue: "Search...",
    });
};
if (document.getElementById('status')) {
    var element = document.getElementById('status');
    const example = new Choices(element, {
        searchPlaceholderValue: "Search...",
    });
};
</script>
<script>
// Multi Select by Class
var n = 0;
while (n <= <?php echo $m; ?>) {
    // if (document.getElementById(`multi${n}`)) {
    //     var element = document.getElementById(`multi${n}`);
    //     const example = new Choices(element, {
    //         searchPlaceholderValue: "Search..."
    //     });
    // };
    if (document.querySelector('.multi')) {
        const element = document.querySelector('.multi');
        const example = new Choices($('.multi')[n], {
            searchPlaceholderValue: "Search...",
        });
    };
    n++;
}
</script>
<script>
window.onload = function() {
    document.getElementById('autoClickBtn').click();
}
</script>

<script>
var ctx = document.getElementById("chart-bars").getContext("2d");

new Chart(ctx, {
    type: "bar",
    data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "#fff",
            data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
            maxBarThickness: 6
        }, ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                },
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 500,
                    beginAtZero: true,
                    padding: 15,
                    font: {
                        size: 14,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                    },
                    color: "#fff"
                },
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false
                },
                ticks: {
                    display: false
                },
            },
        },
    },
});


var ctx2 = document.getElementById("chart-line").getContext("2d");

var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

new Chart(ctx2, {
    type: "line",
    data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
                label: "Mobile apps",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#cb0c9f",
                borderWidth: 3,
                backgroundColor: gradientStroke1,
                fill: true,
                data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                maxBarThickness: 6

            },
            {
                label: "Websites",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#3A416F",
                borderWidth: 3,
                backgroundColor: gradientStroke2,
                fill: true,
                data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                maxBarThickness: 6
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5]
                },
                ticks: {
                    display: true,
                    padding: 10,
                    color: '#b2b9bf',
                    font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [5, 5]
                },
                ticks: {
                    display: true,
                    color: '#b2b9bf',
                    padding: 20,
                    font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
        },
    },
});
</script>
<script>
if (document.getElementById('choices-gender')) {
    var gender = document.getElementById('choices-gender');
    const example = new Choices(gender);
}

if (document.getElementById('choices-language')) {
    var language = document.getElementById('choices-language');
    const example = new Choices(language);
}

if (document.getElementById('choices-skills')) {
    var skills = document.getElementById('choices-skills');
    const example = new Choices(skills, {
        delimiter: ',',
        editItems: true,
        maxItemCount: 5,
        removeItemButton: true,
        addItems: true
    });
}

if (document.getElementById('choices-year')) {
    var year = document.getElementById('choices-year');
    setTimeout(function() {
        const example = new Choices(year);
    }, 1);

    for (y = 1900; y <= 2020; y++) {
        var optn = document.createElement("OPTION");
        optn.text = y;
        optn.value = y;

        if (y == 2020) {
            optn.selected = true;
        }

        year.options.add(optn);
    }
}

if (document.getElementById('choices-day')) {
    var day = document.getElementById('choices-day');
    setTimeout(function() {
        const example = new Choices(day);
    }, 1);


    for (y = 1; y <= 31; y++) {
        var optn = document.createElement("OPTION");
        optn.text = y;
        optn.value = y;

        if (y == 1) {
            optn.selected = true;
        }

        day.options.add(optn);
    }

}

if (document.getElementById('choices-month')) {
    var month = document.getElementById('choices-month');
    setTimeout(function() {
        const example = new Choices(month);
    }, 1);

    var d = new Date();
    var monthArray = new Array();
    monthArray[0] = "January";
    monthArray[1] = "February";
    monthArray[2] = "March";
    monthArray[3] = "April";
    monthArray[4] = "May";
    monthArray[5] = "June";
    monthArray[6] = "July";
    monthArray[7] = "August";
    monthArray[8] = "September";
    monthArray[9] = "October";
    monthArray[10] = "November";
    monthArray[11] = "December";
    for (m = 0; m <= 11; m++) {
        var optn = document.createElement("OPTION");
        optn.text = monthArray[m];
        // server side month start from one
        optn.value = (m + 1);
        // if june selected
        if (m == 1) {
            optn.selected = true;
        }
        month.options.add(optn);
    }
}

function visible() {
    var elem = document.getElementById('profileVisibility');
    if (elem) {
        if (elem.innerHTML == "Switch to visible") {
            elem.innerHTML = "Switch to invisible"
        } else {
            elem.innerHTML = "Switch to visible"
        }
    }
}

var openFile = function(event) {
    var input = event.target;

    // Instantiate FileReader
    var reader = new FileReader();
    reader.onload = function() {
        imageFile = reader.result;

        document.getElementById("imageChange").innerHTML = '<img width="200" src="' + imageFile +
            '" class="rounded-circle w-100 shadow" />';
    };
    reader.readAsDataURL(input.files[0]);
};
</script>
<script>
var win = navigator.platform.indexOf('Win') > -1;
if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
        damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
}
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
<!-- PERVERSE -->