
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

<script>
   
    let cloneCounter = 0;

    document.addEventListener('DOMContentLoaded', function() {
        var originalSearchInput = document.getElementById('search-input');
        var originalSelect = document.getElementById('options-select');

        if (originalSearchInput && originalSelect) {
            originalSearchInput.addEventListener('input', function() {
                filterSelectOptions(originalSearchInput, originalSelect);
            });
        }
    });

    document.getElementById('doplicate').addEventListener('click', function() {
        var target = document.getElementById('maincon');
        var clone = target.cloneNode(true);
        var container = document.querySelector('.purchasecontainer');

        if (container) {
            container.appendChild(clone);

        
            cloneCounter++;
            document.getElementById('clone-count').textContent = 'Your Item: ' + cloneCounter;

            var clonedDoplicate = clone.querySelector('#doplicate');
            var subtract = clone.querySelector('#subtract');
            
       
            if (clonedDoplicate) {
                clonedDoplicate.style.display = 'none';
                subtract.style.display = '';
            }


            subtract.addEventListener('click', function() {
                clone.remove();
          
                cloneCounter--;
                document.getElementById('clone-count').textContent = 'Your Item: ' + cloneCounter;
            });

       
            var clonedSearchInput = clone.querySelector('#search-input');
            var clonedSelect = clone.querySelector('#options-select');
            
            if (clonedSearchInput && clonedSelect) {
              
                clonedSearchInput.value = '';
                
                clonedSearchInput.addEventListener('input', function() {
                    filterSelectOptions(clonedSearchInput, clonedSelect);
                });
            }
        }
    });
</script>

<script>
   function filterSelectOptions(inputElement, selectElement) {
      const input = inputElement.value.toLowerCase();
      const options = selectElement.getElementsByTagName('option');
      let optionFound = false;
      let noResultMessage = document.getElementById('no-result-message');

      for (let option of options) {
        const optionText = option.textContent.toLowerCase();
        if (optionText.includes(input) && input.trim() !== "none") {
          option.style.display = "";
          optionFound = true;
        } else {
          option.style.display = "none"; 
        }
      }

      if (!optionFound) {
        if (!noResultMessage) {
      
          noResultMessage = document.createElement('div');
          noResultMessage.id = 'no-result-message';
          noResultMessage.textContent = 'No options found';
          noResultMessage.style.color = 'red';
          selectElement.parentNode.appendChild(noResultMessage);
        }
      } else {
     
        if (noResultMessage) {
          noResultMessage.remove();
        }
      }

  
      if (!optionFound) {
        selectElement.value = "";
      } else {
      
        for (let option of options) {
          if (option.style.display !== "none") {
            selectElement.value = option.value;
            break;
          }
        }
      }
   }
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

    <style>
    /* General container and form layout */
    .purchasecontainer {
        border-radius: 10px;
        position: relative;
        top: 100px;
        width: 80%;
        max-width: 1200px;
        background: #fff;
        padding: 25px;
        box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
    }

    /* Layout of the form fields */
    .form-select, .form-control {
        border-radius: 8px;
     
        margin-bottom: 12px;
        font-size: 16px;
    }

    .form-control:focus, .form-select:focus {
        border-color: #007bff;
      
    }

    /* Row layout for inputs */
    .row {
        margin-bottom: 15px;
    }

    .addbtn, .removebtn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        font-size: 20px;
  
        position:relative;
        display: flex;
        justify-content: center;
        align-items: center;
      
        transition: all 0.3s ease;
    }

    .addbtn:hover, .removebtn:hover {
        transform: scale(1.1);
    }

    .addbtn {
        background-color: #28a745;
        color: white;
    }

    .removebtn {
        background-color: #dc3545;
        color: white;
    }

    .addbtn:focus, .removebtn:focus {
        outline: none;
    }

    .savetn {
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .savetn:hover {
        background-color: #218838;
    }

    /* Make sure the form is responsive */
    @media (max-width: 768px) {
        .purchasecontainer {
            padding: 15px;
        }

        .row {
            flex-direction: column;
            gap: 15px;
        }

        .col-md-5, .col-md-3, .col-md-1 {
            width: 100%;
        }
    }


    /* Style for the container around the input */
.search-container {
    position: relative;
    width: 100%;
}

select{
    width:100%;
}
.select2-container .select2-selection__placeholder {
    text-align: left !important;
  }
  
</style>