notify = (color, message) => {
    $.notify({
      icon: "nc-icon nc-bell-55",
      message: message

    }, {
      type: color,
      timer: 8000,
      placement: {
        from: 'top',
        align: 'right'
      }
    });
  }


$(document).ready( function () {
    $('#usersTable').DataTable();
} );