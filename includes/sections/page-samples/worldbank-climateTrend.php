<div>
    <h2 class="text-2xl font-semibold mb-4">CO₂ Emissions — Southeast Asia (2000–2023)</h2>
    <canvas id="worldbank-chart" width="600" height="400"></canvas>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", async () => {
  const countries = "BN;KH;ID;LA;MY;MM;PH;SG;TH;TL;VN";
  const indicator = "EN.ATM.CO2E.KT"; // Total CO₂ emissions (kt)
  const url = `https://api.worldbank.org/v2/country/${countries}/indicator/${indicator}?format=json&date=2000:2023&per_page=1000`;

  try {
    const res = await fetch(url);
    const data = await res.json();

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
      const value = item.value ? item.value / 1_000 : null; // Convert kt to million tons

      if (!grouped[country]) grouped[country] = {};
      grouped[country][year] = value;
    });

    const years = [...new Set(records.map(r => r.date))].sort();

    const datasets = Object.entries(grouped).map(([country, values]) => ({
      label: country,
      data: years.map(y => values[y] ?? null),
      borderWidth: 2,
      fill: false,
      tension: 0.3
    }));

    const ctx = document.getElementById("worldbank-chart").getContext("2d");
    new Chart(ctx, {
      type: "line",
      data: { labels: years, datasets },
      options: {
        responsive: true,
        interaction: { mode: "index", intersect: false },
        plugins: {
          title: {
            display: true,
            text: "CO₂ Emissions (in million tons)"
          },
          legend: { position: "bottom" }
        },
        scales: {
          y: {
            beginAtZero: false,
            title: {
              display: true,
              text: "CO₂ Emissions (Million tons)"
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
