<?php 
get_header();

while ( have_posts() ) {
  the_post();
?>

<div class="py-[150px]">
    <div class="w-[80%] sm:w-[640px] md:w-[768px] lg:w-[1024px] xl:w-[1280px] mx-auto">
        <h2>GDP (Current US$) — Southeast Asia</h2>
        <canvas id="worldbank-chart" width="600" height="400"></canvas>
    </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", async () => {
  const countries = "BN;KH;ID;LA;MY;MM;PH;SG;TH;TL;VN";
  const indicator = "NY.GDP.MKTP.CD"; // GDP (current US$)
  const url = `https://api.worldbank.org/v2/country/${countries}/indicator/${indicator}?format=json&date=2015:2023&per_page=1000`;

  try {
    const res = await fetch(url);
    const data = await res.json();

    consle.log("data", data)

    if (!Array.isArray(data) || !data[1]) {
      alert("No data found.");
      return;
    }

    const records = data[1];
    const grouped = {};

    // Group data by country
    records.forEach(item => {
      const country = item.country.value;
      const year = item.date;
      const value = item.value ? item.value / 1_000_000_000 : null; // Convert to billions

      if (!grouped[country]) grouped[country] = {};
      grouped[country][year] = value;
    });

    // Extract years dynamically (sorted ascending)
    const years = [...new Set(records.map(r => r.date))].sort();

    // Prepare Chart.js datasets
    const datasets = Object.entries(grouped).map(([country, values]) => ({
      label: country,
      data: years.map(y => values[y] ?? null),
      borderWidth: 2,
      fill: false,
      tension: 0.3
    }));

    // Create Chart
    const ctx = document.getElementById("worldbank-chart").getContext("2d");
    new Chart(ctx, {
      type: "line",
      data: {
        labels: years,
        datasets: datasets
      },
      options: {
        responsive: true,
        interaction: {
          mode: "index",
          intersect: false
        },
        plugins: {
          title: {
            display: true,
            text: "GDP (in billions of US$)"
          },
          legend: {
            position: "bottom"
          }
        },
        scales: {
          y: {
            beginAtZero: false,
            title: {
              display: true,
              text: "GDP (Billions USD)"
            }
          }
        }
      }
    });
  } catch (err) {
    console.error("Fetch error:", err);
  }
});
</script>

<?php
} // end while
get_footer();
?>
