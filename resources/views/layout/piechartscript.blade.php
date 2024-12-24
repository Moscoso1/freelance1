<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('pieChart').getContext('2d');
        
        // Data from the backend
        var { labels, counts } = @json($categoryCounts).reduce((acc, { category, count }) => {
            acc.labels.push(category); acc.counts.push(count); return acc;
        }, { labels: [], counts: [] });

        // Function to generate a modern, vibrant color based on the label
        function generateColor(label) {
            var hash = 0;
            for (var i = 0; i < label.length; i++) {
                hash = (hash << 5) - hash + label.charCodeAt(i);
            }

            // Convert hash to a hue value between 0 and 360
            var hue = Math.abs(hash % 360);
            // Increase saturation and lightness to make the colors brighter
            var saturation = 70 + (hash % 30);  // Range between 70% and 100% saturation
            var lightness = 60 + (hash % 20);   // Range between 60% and 80% lightness

            // Return the color in HSL format
            return `hsl(${hue}, ${saturation}%, ${lightness}%)`;
        }

        // Generate unique, modern colors based on labels
        var colors = labels.map(generateColor);

        // Create the pie chart
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels,
                datasets: [{
                    data: counts,
                    backgroundColor: colors,
                    hoverBackgroundColor: colors.map(c => c.replace('70%', '50%')) // Lighten hover colors
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: ({ label, raw }) => `${label}: ${raw} items`
                        }
                    },
                    legend: { display: false }
                }
            }
        });

        // Custom Legend
        var legendContainer = document.getElementById('legend');
        labels.forEach((label, i) => {
            var item = document.createElement('div');
            item.className = 'legend-item';
            item.innerHTML = `
                <div class="legend-color" style="background-color:${colors[i]}"></div>
                <span class="legend-label">${label}: ${counts[i]} </span>
            `;
            item.addEventListener('click', () => {
                var segment = chart.getDatasetMeta(0).data[i];
                segment.hidden = !segment.hidden;
                chart.update();
                item.style.textDecoration = segment.hidden ? 'line-through' : 'none';
            });
            legendContainer.appendChild(item);
        });
    });
</script>



<style>
    /* Custom styles for the legend */
    #legend {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        margin-right: 20px;
    }
    .legend-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        cursor: pointer; /* Make legend items clickable */
    }
    .legend-color {
        width: 20px;
        height: 20px;
        margin-right: 10px;
    }
    .legend-label {
        font-size: 14px;
    }
    .legend-item:hover {
        opacity: 0.7; /* Optional hover effect */
    }
</style>