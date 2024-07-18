<x-admin-layout>
    <x-slot:title>
        Quản lí phòng
    </x-slot:title>
    <div class="container">
        <div class="title">Biểu đồ thống kê</div>
        <canvas id="studentChart" style="width: 80%; height: 300px;"></canvas>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            var maleStudents = <?php echo $maleStudents ?>;
            var femaleStudents = <?php echo $femaleStudents ?>;
            
            var ctx = document.getElementById('studentChart').getContext('2d');
            var studentChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Nam', 'Nữ'],
                    datasets: [{
                        label: 'Số lượng sinh viên',
                        data: [maleStudents, femaleStudents],
                        backgroundColor: ['#3498db', '#e74c3c'],
                        borderColor: ['#2980b9', '#c0392b'],
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
        });
    </script>
</x-admin-layout>
