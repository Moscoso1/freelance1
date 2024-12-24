
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="your-custom-script.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script>
    $(function() {  // shorthand for $(document).ready()
        $('#select').selectize({
            sortField: 'text',  // Sorting options alphabetically by text
            placeholder: 'Select an option...'  // Placeholder text
        });
    });
</script>

 <script>
        // Set the zoom level to 90% using JavaScript
        document.body.style.zoom = "110%";

        // Prevent zooming with the mouse wheel when the CTRL key or META key is pressed
        window.addEventListener('wheel', function(event) {
            // Prevent zooming when the Ctrl or Meta key is pressed (zooming in most browsers)
            if (event.ctrlKey || event.metaKey) {
                event.preventDefault(); // This will prevent zooming while scrolling with mouse wheel + Ctrl/Meta key
            }
        }, { passive: false });
    </script>

<script type="text/javascript">
        // Get the sidebar, buttons, and overlay
        const sidebar = document.getElementById('sidebar');
        const openBtn = document.getElementById('openBtn');
        const closeBtn = document.getElementById('closeBtn');
        const overlay = document.getElementById('overlay');

        // Open or close the sidebar
        openBtn.addEventListener('click', () => {
            sidebar.classList.toggle('open');  // Toggle the open class
            overlay.style.display = sidebar.classList.contains('open') ? 'block' : 'none';
        });

        // Close the sidebar
        closeBtn.addEventListener('click', () => {
            sidebar.classList.remove('open');
            overlay.style.display = 'none';
        });

        // Close sidebar if overlay is clicked
        overlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            overlay.style.display = 'none';
        });
    </script>


<script>
// Format the price value on page load
document.addEventListener('DOMContentLoaded', function () {
  let priceField = document.getElementById('price');
  if (priceField.value) {
    // Strip non-numeric characters and format the value
    priceField.value = formatPrice(priceField.value.replace(/[^0-9.]/g, ''));
  }
});

// Formatting function for price
function formatPrice(value) {
  let [whole, decimal] = value.split('.');
  if (!decimal) {
    decimal = '00'; // Default to '00' if no decimal part is entered
  } else {
    decimal = decimal.padEnd(2, '0').slice(0, 2); // Keep only two decimal places
  }

  // No commas, just return whole part with decimals
  return whole + '.' + decimal;
}

// On form submission or when you need to process the data
function getNumericValue() {
  let priceField = document.getElementById('price');
  let formattedValue = priceField.value.replace(/[^0-9.]/g, ''); // Remove non-numeric characters
  
  let numericValue = parseFloat(formattedValue) || 0; // Convert to numeric value
  console.log(numericValue); // You can process this value as needed
  return numericValue;
}


</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let rowsPerPage = parseInt(document.getElementById('rowsPerPage').value); 
    let currentPage = 1;
    const tableRows = document.querySelectorAll('#productTable .tableRow');
    const totalRows = tableRows.length;
    const totalPages = Math.ceil(totalRows / rowsPerPage);

    function showPage(page) {
        if (page < 1 || page > totalPages) return;

        currentPage = page;
        document.getElementById('pageNumber').innerText = `Page ${currentPage}`;

        tableRows.forEach(row => row.style.display = 'none');

        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;

        for (let i = start; i < end; i++) {
            if (tableRows[i]) {
                tableRows[i].style.display = '';
            }
        }

        document.getElementById('prevPage').disabled = currentPage === 1;
        document.getElementById('nextPage').disabled = currentPage === totalPages;
    }

    document.getElementById('prevPage').addEventListener('click', function () {
        showPage(currentPage - 1);
    });

    document.getElementById('nextPage').addEventListener('click', function () {
        showPage(currentPage + 1);
    });

    document.getElementById('rowsPerPage').addEventListener('change', function () {
        rowsPerPage = parseInt(this.value);
        const totalPages = Math.ceil(totalRows / rowsPerPage);
        currentPage = 1;
        showPage(currentPage);
    });

    showPage(currentPage);
});
</script>

<script>

    // auto search table script
  function searchTable() {
   
    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    

    const table = document.getElementById('productTable');
    const rows = table.getElementsByTagName('tr');
    
    const headerCells = rows[0].getElementsByTagName('th');
    let productNameColumnIndex = -1;
 
    for (let i = 0; i < headerCells.length; i++) {
        if (headerCells[i].id === 'item') {
            productNameColumnIndex = i;
            break;
        }
    }
    
    if (productNameColumnIndex === -1) {
        console.error('Product name column (id="item") not found');
        return;
    }
    
    for (let i = 1; i < rows.length; i++) { 
        rows[i].style.display = 'none';
    }
    
    if (filter === '') {
    
        for (let i = 1; i <= 5 && i < rows.length; i++) {
            rows[i].style.display = '';  
        }
    } else {
       
        for (let i = 1; i < rows.length; i++) { 
            const cells = rows[i].getElementsByTagName('td');
            const productNameCell = cells[productNameColumnIndex];  
            
            if (productNameCell && productNameCell.textContent.toLowerCase().indexOf(filter) > -1) {
                rows[i].style.display = '';  
            }
        }
    }
}

 
 @if(Session::has('success'))
        console.log("Session success: {{ session('success') }}"); 
        sessionStorage.setItem('successMessage', "{{ session('success') }}");
    @endif

   
    $(document).ready(function() {
        let message = sessionStorage.getItem('successMessage');
        if (message) {
            console.log("Message from sessionStorage:", message);
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "timeOut": "5000",
                "extendedTimeOut": "1000"
            };
            toastr.success(message);
            sessionStorage.removeItem('successMessage'); 
        }
    });

</script>

<script>

    // delete item script

$(document).ready(function() {
    $('.item-delete').on('click', function() {
        var medicineId = $(this).data('id');  
        var row = $('#tr-' + medicineId);    

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var url = '{{ route("itemDelete", ":id") }}'.replace(':id', medicineId);

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  
                    },
                    success: function(response) {
                        if (response.status == 200) {
                         
                            row.fadeOut(500, function() {
                                $(this).remove();
                            });

                            Swal.fire({
                                title: 'Deleted!',
                                text: 'The record has been deleted.',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response.message || 'Something went wrong.',
                                icon: 'error'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred. Please try again.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });
});
</script>

<script>
// Function to generate a random dark color (for left side of the gradient)
function getRandomDarkColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    // Generate a dark color by restricting the RGB values to darker shades
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 4)]; // Use values from 0-3 for darker tones
    }
    return color;
}

// Function to generate a random bright, modern color (for right side of the gradient)
function getRandomBrightColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    // Generate a bright color by using higher values for RGB components (e.g., 8-F)
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 8) + 8]; // Use values from 8-F for brighter shades
    }
    return color;
}

// Function to generate a random linear gradient from dark to bright colorful colors
function getRandomColorfulGradient() {
    const color1 = getRandomDarkColor(); // Dark color on the left
    const color2 = getRandomBrightColor(); // Bright color on the right
    return `linear-gradient(to right, ${color1}, ${color2})`; // Left (dark) to right (bright)
}

// Get the div by its ID and set its background to a colorful gradient
document.getElementById('myDiv').style.background = getRandomColorfulGradient();


    </script>
<script>
  window.addEventListener('load', function() {
    document.querySelector('.containerbar').classList.add('loaded');
  });
</script>


