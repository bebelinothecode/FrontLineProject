{{-- <!DOCTYPE html>
<html>
<head>
    <title>Fleet Management-Chart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
    
<body>
    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3">Laravel 11 ChartJS Chart Example - ItSolutionStuff.com</h3>
            <div class="card-body">
                <canvas id="myChart" height="120px"></canvas>
            </div>
        </div>
    </div>
</body>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [@foreach($data as $item) '{{ $item->name }}', @endforeach],
            datasets: [{
                label: 'Number of Occurrences',
                data: [@foreach($data as $item) {{ $item->count }}, @endforeach],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Registrations Chart</title>
</head>
<body>
    <h1>Monthly User Registrations</h1>
    <div style="width:75%;">
        {!! $chart->render() !!}
    </div>
</body>
</html>