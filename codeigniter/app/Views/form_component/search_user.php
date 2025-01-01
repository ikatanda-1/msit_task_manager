<!DOCTYPE html><html lang="en"><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Autocomplete - Default functionality</title>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
  <script>
    $(function () {
        $("#user").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "<?= site_url('users/searchUser') ?>",
                    type: "GET",
                    data: { term: request.term },
                    success: function (data) {
                        response(data);
                    },
                    error: function () {
                        console.error("Failed to fetch client names.");
                    }
                });
            },
           
            minLength: 2 // Minimum characters before autocomplete triggers
        });
    });
  </script>
  
  <style>


  </style>
</style>
</head>
<body>
 
<div class="ui-widget">
  <label for="tags"> </label>
  <input type='text' id="user" placeholder='User'>
</div>
 </body>
 </html>