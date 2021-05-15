$(document).ready(function(){
  // Get Report passenger
  $(document).on('click', '#user_log', function(){
    
    var date_sel_start = $('#date_sel_start').val();
    var date_sel_end = $('#date_sel_end').val();
    var time_sel = $(".time_sel:checked").val();
    var time_sel_start = $('#time_sel_start').val();
    var time_sel_end = $('#time_sel_end').val();
    var fing_sel = $('#fing_sel option:selected').val();
    var dev_id = $('#dev_sel option:selected').val();
    
    $.ajax({
      url: 'user_log_up.php',
      type: 'POST',
      data: {
        'log_date': 1,
        'date_sel_start': date_sel_start,
        'date_sel_end': date_sel_end,
        'time_sel': time_sel,
        'time_sel_start': time_sel_start,
        'time_sel_end': time_sel_end,
        'fing_sel': fing_sel,
        'dev_id': dev_id,
      },
      success: function(response){

        $('.up_info2').fadeIn(500);
        $('.up_info2').text("The Filter has been selected!");

        $('#Filter-export').modal('hide');
        setTimeout(function () {
            $('.up_info2').fadeOut(500);
        }, 5000);

        $.ajax({
          url: "user_log_up.php",
          type: 'POST',
          data: {
            'log_date': 1,
            'date_sel_start': date_sel_start,
            'date_sel_end': date_sel_end,
            'time_sel': time_sel,
            'time_sel_start': time_sel_start,
            'time_sel_end': time_sel_end,
            'dev_id': dev_id,
            'fing_sel': fing_sel,
            'select_date': 0,
          }
          }).done(function(data) {
          $('#userslog').html(data);
        });
      }
    });
  });
  // Submit Vote
  $(document).on('click', '.vote', function(){

    var fingerid = $(this).attr("id");
    
    $.ajax({
      url: 'manage_users_conf.php',
      type: 'POST',
      data: {
        'vote': 1,
        'fingerid': fingerid,
      },
      success: function(response){
        if (response == "1") {
          // $('.up_info2').fadeIn(500);
          // $('.up_info2').text("You have successfully voted");

          $.ajax({
            url: "user_log_up.php",
            type: 'POST',
            data: {
                'select_date': 0,
            }
            }).done(function(data) {
              $('#userslog').html(data);
          });
          setTimeout(function () {
              window.location.href = "http://localhost:3000/Votingpage.html";
          }, 100);
        }
        else{
          $('.up_info2').fadeIn(500);
          $('.up_info2').text(response);
        }

        setTimeout(function () {
            $('.up_info2').fadeOut(500);
        }, 6000);
      }
    });
  });
});