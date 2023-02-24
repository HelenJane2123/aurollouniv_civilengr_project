$(document).ready(function() {
  $('.rpt_enrolled_students').DataTable( {
      dom: 'lBfrtip',
      lengthMenu: [ 10, 25, 50, 75, "All" ],
      buttons: [
          'copy',
          {
            extend: 'print',
            title: 'List of Students'
          }
      ],
  } );

  $('.rpt_programs').DataTable( {
    dom: 'lBfrtip',
    lengthMenu: [ 10, 25, 50, 75, "All" ],
    buttons: [
        'copy',
        {
          extend: 'print',
          title: 'List of Programs'
        }
    ],
  });

  $('.rpt_failed_students').DataTable( {
    dom: 'lBfrtip',
    lengthMenu: [ 10, 25, 50, 75, "All" ],
    buttons: [
        'copy',
        {
          extend: 'print',
          title: 'List of Failed Students'
        }
    ],
  });

  $('.rpt_passed_students').DataTable( {
    dom: 'lBfrtip',
    lengthMenu: [ 10, 25, 50, 75, "All" ],
    buttons: [
        'copy',
        {
          extend: 'print',
          title: 'List of Passed Students'
        }
    ],
  });
} );