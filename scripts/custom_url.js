$(document).ready(function() {
    var check_url = function() {
      var check_custom_url = custom_url.value;
      var request_url = window.check_custom_url_url;
      var $curl_span = $('span.custom_url');
      $.ajax({
        url: request_url,
        data: { url: check_custom_url },
        success: function(data, status, xhr) {
          if(data.survey_found) {
            $curl_span.html('<i class="fa fa-times-circle-o warning"></i> Already taken');
          } else {
            $curl_span.html('<i class="fa fa-check-circle-o success"></i> Available');
          }
        },
        dataType: 'json'
      })
      .fail(function(data, status, xhr) {
        console.log('error', status, data);
      });

      $("#custom_url_placeholder").append(status);
    }
    
    var check_url_timer = null;
    $("#custom_url").on('keyup', function(event) {
      var value = this.value;
      value = value.toLowerCase().replace(' ','_');
      
      this.value = value;

      if(value.length > 4) {
        $('.custom_url_help_text').html('Your Form URL would be: ' + window.formsgen_base_url + '/index.php/<span id="custom_url_placeholder"></span>');
        $("#custom_url_placeholder").html(value);
        $('span.custom_url').html('<i class="fa fa-refresh fa-spin"></i> Checking');
        clearTimeout(check_url_timer);
        check_url_timer = setTimeout(check_url, 1000);
      } else {
        clearTimeout(check_url_timer);
        $('span.custom_url').html('At least 5 alpha-numeric characters.');
        $('.custom_url_help_text').html("Your form's URL will be generated upon creation.");
      }
    })
  });