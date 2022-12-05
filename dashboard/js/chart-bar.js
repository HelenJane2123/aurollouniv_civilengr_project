// $(document).ready(function () {
//     showGraph();
// });


// function showGraph()
// {
//     {
//         $.post("admin/data.php",
//         function (data)
//         {
//             console.log(data);
//                 var exam_score = [];
//                 var exam_status = [];

//             for (var i in data) {
//                 exam_score.push(data[i].exam_score);
//                 exam_status.push(data[i].exam_status);
//             }

//             var chartdata = {
//                 labels: exam_status,
//                 datasets: [
//                     {
//                         label: 'Student Marks',
//                         backgroundColor: '#49e2ff',
//                         borderColor: '#46d5f1',
//                         hoverBackgroundColor: '#CCCCCC',
//                         hoverBorderColor: '#666666',
//                         data: exam_score
//                     }
//                 ]
//             };

//             var graphTarget = $("#graphCanvas");

//             var barGraph = new Chart(graphTarget, {
//                 type: 'bar',
//                 data: chartdata
//             });
//         });
//     }
// }

$(document).ready(function(){
    $.ajax({
      url: "admin/data.php",
      method: "GET",
      success: function(data) {
        console.log("test",data);
        var exam_score = [];
        var score_status = [];
  
        for(var i in data) {
            exam_score.push(data[i].exam_score);
            score_status.push(data[i].score_status);
        }
  
        var chartdata = {
          labels: exam_score,
          datasets : [
            {
              label: 'Student Marks',
              backgroundColor: 'rgba(200, 200, 200, 0.75)',
              borderColor: 'rgba(200, 200, 200, 0.75)',
              hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
              hoverBorderColor: 'rgba(200, 200, 200, 1)',
              data: exam_status
            }
          ]
        };
        
        console.log(chartdata);
        var ctx = $("#mycanvas");
  
        var barGraph = new Chart(ctx, {
          type: 'bar',
          data: chartdata
        });
      },
      error: function(data) {
        console.log(data);
      }
    });
  });