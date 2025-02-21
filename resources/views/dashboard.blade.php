@extends('layouts.app')

@section('content')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Dashboard container -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Stats card for posts -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Total Posts</h3>
                    <p class="mt-2 text-2xl text-gray-900 dark:text-gray-100">123</p> <!-- Placeholder for post count -->
                    <a href="{{ route('posts.index') }}" class="text-blue-500 hover:text-blue-700 mt-4 inline-block">View All Posts</a>
                </div>

                <!-- Stats card for traffic -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Website Traffic</h3>
                    <p class="mt-2 text-2xl text-gray-900 dark:text-gray-100" id="traffic-stats">678 Visitors Today</p> <!-- Placeholder for traffic stats -->
                </div>
                
            </div>

            <!-- Graph and Chart Section -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Bar Graph for Views -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Views (Bar Graph)</h3>
                    <canvas id="viewsBarChart"></canvas>
                </div>

                <!-- Pie Chart for People -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">People (Pie Chart)</h3>
                    <canvas id="peoplePieChart"></canvas>
                </div>
            </div>

            <!-- Fake Reviews Section -->
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Viewer Reviews</h3>
                    <div class="mt-4">
                        <ul class="space-y-4">
                            <!-- Fake Review 1 -->
                            <li class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <span class="text-lg text-gray-900 dark:text-gray-100">Great site, very useful!</span>
                                    <div class="flex items-center">
                                        <!-- 4 Star Rating -->
                                        <span class="text-yellow-400">★★★★☆</span>
                                    </div>
                                </div>
                                <span class="text-sm text-gray-500 dark:text-gray-400">Feb 19, 2025</span>
                            </li>

                            <!-- Fake Review 2 -->
                            <li class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <span class="text-lg text-gray-900 dark:text-gray-100">The design is beautiful!</span>
                                    <div class="flex items-center">
                                        <!-- 4 Star Rating -->
                                        <span class="text-yellow-400">★★★★☆</span>
                                    </div>
                                </div>
                                <span class="text-sm text-gray-500 dark:text-gray-400">Feb 18, 2025</span>
                            </li>

                            <!-- Fake Review 3 -->
                            <li class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <span class="text-lg text-gray-900 dark:text-gray-100">Amazing experience, will visit again!</span>
                                    <div class="flex items-center">
                                        <!-- 5 Star Rating -->
                                        <span class="text-yellow-400">★★★★★</span>
                                    </div>
                                </div>
                                <span class="text-sm text-gray-500 dark:text-gray-400">Feb 17, 2025</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Recent Posts Section -->
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Recent Posts</h3>
                    <div class="mt-4">
                        <ul class="space-y-4">
                            <!-- Example Recent Post List Item -->
                            <li class="flex justify-between items-center">
                                <span class="text-lg text-gray-900 dark:text-gray-100">Be Tech Savvy</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400">Feb 19, 2025</span>
                            </li>
                            <li class="flex justify-between items-center">
                                <span class="text-lg text-gray-900 dark:text-gray-100">Great City News</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400">Feb 18, 2025</span>
                            </li>
                            <li class="flex justify-between items-center">
                                <span class="text-lg text-gray-900 dark:text-gray-100">Is 4IR taking over?</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400">Feb 17, 2025</span>
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('posts.index') }}" class="text-blue-500 hover:text-blue-700 mt-4 inline-block">View All Posts</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initial simulated data
            let viewsData = [100, 200, 300, 400, 500]; // Example data for views
            let peopleData = [20, 50, 30]; // Example data for people
            
            // Function to update stats and graphs
            function updateDashboardData() {
                // Simulate dynamic data update (every 5 minutes)
                viewsData = viewsData.map(val => val + Math.floor(Math.random() * 50)); // Random increase in views
                peopleData = peopleData.map(val => val + Math.floor(Math.random() * 10)); // Random increase in people count

                // Update traffic
                document.getElementById('traffic-stats').innerText = `${Math.floor(Math.random() * 1000)} Visitors Today`;

                // Update Bar Graph (Views)
                barChart.update();

                // Update Pie Chart (People)
                pieChart.update();
            }

            // Bar Chart (Views)
            const ctxBar = document.getElementById('viewsBarChart').getContext('2d');
            const barChart = new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                    datasets: [{
                        label: 'Monthly Views',
                        data: viewsData,
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Pie Chart (People)
            const ctxPie = document.getElementById('peoplePieChart').getContext('2d');
            const pieChart = new Chart(ctxPie, {
                type: 'pie',
                data: {
                    labels: ['Male', 'Female', 'Other'],
                    datasets: [{
                        label: 'User Demographics',
                        data: peopleData,
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                        hoverOffset: 4
                    }]
                }
            });

            // Update the data every 5 minutes
            setInterval(updateDashboardData, 5 * 60 * 1000); // 5 minutes in milliseconds
        });
    </script>
@endsection