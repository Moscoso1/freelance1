

  <!-- Include jQuery (required by Select2) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Include the Select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Include the Select2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <select id="mySelect">
    <option value="apple">Apple</option>
    <option value="banana">Banana</option>
    <option value="cherry">Cherry</option>
    <option value="grape">Grape</option>
    <option value="orange">Orange</option>
    <option value="pear">Pear</option>
    <option value="pineapple">Pineapple</option>
  </select>

  <script>
    $(document).ready(function() {
      // Apply Select2 to the select element with ID "mySelect"
      $('#mySelect').select2({
        placeholder: "Select a fruit", // Placeholder text
        allowClear: true               // Allow clearing the selection
      });
    });
  </script>

